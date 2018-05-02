<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\Title;
use App\Department_Employee;
use DB;

class EmployeeController extends Controller
{
    function index(Request $request){
        $departments = Department::all();
        $employees = Employee::paginate(8);
        if ($request->ajax()){
            return view('include.employees',
                ['employees' => $employees, 'departments' => $departments])->render();
        }
        return view('index', ['employees' => $employees,
                                    'departments' => $departments]);
    }

    function show($emp_no) {
        $employee = Employee::find($emp_no);
        $manager = $employee->dept_manager()->first();
        if (!empty($manager)) {
            $manager->dept_name = Department::find($manager->dept_no)->dept_name;
        }
        $departments = $employee->dept_emp()->get();
        $titles = $employee->titles()->get();
        $salaries = $employee->salaries()->get();
        $result = $this->employee($departments, $titles, $salaries);
        $departments = Department::all();
        return view('employee',['departments' => $departments,
                                      'salaries' => $result,
                                      'employee' => $employee,
                                      'manager' => $manager]);
    }

    function show_by_department(Request $request, $dept_no) {
        $employees = Department::find($dept_no)
                                 ->employees()
                                 ->paginate(8);
        $departments = Department::all();
        if ($request->ajax()){
            return view('include.employees',
                ['employees' => $employees, 'departments' => $departments])->render();
        }
        return view('index', ['employees' => $employees,
            'departments' => $departments]);
    }

    function search(Request $request) {
        $employees = Employee::where('first_name', 'LIKE', "%$request->name%")
                    ->orWhere('last_name', 'LIKE', "%$request->name%")
                    ->paginate(8);

//        $employees->setPath('/search?name='.$request->name);
        $departments = Department::all();
        if ($request->ajax()){
            return view('include.employees',
                ['employees' => $employees, 'departments' => $departments])->render();
        }
        return view('index', ['employees' => $employees,
            'departments' => $departments]);
    }

    function department_salary(){
        $departments = Department::orderBy('dept_no')->get();
//            $salaries = DB::table('dept_emp')
//                ->select(DB::raw('AVG(salary) as avg_sal'))
//                ->join('salaries', 'dept_emp.emp_no', '=', 'salaries.emp_no')
//                ->groupBy('dept_emp.dept_no')
//                ->get();

      return view('dept_salary', ['departments' => $departments]);

    }

    function highest_salary() {
        $departments = Department::all();
        $highest_sal = DB::table('titles')
                ->select(DB::raw('MAX(salary) as high_sal'))
                ->join('salaries', 'titles.emp_no', '=', 'salaries.emp_no')
                ->whereRaw('salaries.to_date = titles.to_date')
                ->groupBy('titles.title')->get();
        $titles = Title::distinct()->orderBy('title')->get(['title']);
        return view('highest_salary', ['titles' => $titles,
                                            'highest_salaries' => $highest_sal,
                                            'departments' => $departments]);
    }

    function show_fluidity() {
        $departments = Department::all();
        return view('fluidity', ['departments' => $departments,
                                        'fluidity' => [],
                                            'years' => []]);
    }

    function fluidity($dept_no) {
        $fluidity = [];
        $years = range(1997,2002);
        $department = Department::find($dept_no);
        $start_date = 19970101;
        $end_date = 19971231;
        while($start_date <= 20020101) {
            $unemployed = Department_Employee::where('dept_no', $department->dept_no)
                ->where('from_date', '<', (string)$start_date)
                ->whereBetween('to_date', [(string)$start_date, (string)$end_date])
                ->count();
            $start_date += 10000;
            $end_date += 10000;
            $emp_total_number = Department_Employee::where('dept_no', $department->dept_no)
                ->where('from_date', '<', (string)$start_date)
                ->where('to_date', '>=', (string)$start_date)
                ->count();
            array_push($fluidity, ($unemployed/$emp_total_number*100));

        }
        return view('include.graph', ['fluidity' => $fluidity,
                                            'years' => $years])->render();

    }


    public function employee($departments, $titles, $salaries) {
        $result = [];
        foreach ($departments as $dept) {
            $dept_name = Department::find($dept->dept_no);
            foreach ($titles as $title) {
                if ($title->from_date < $dept->to_date || $title->from_date == $dept->to_date) {
                    foreach ($salaries as $salary) {
                        if ($salary->from_date < $title->to_date || $salary->from_date == $title->to_date) {
                            array_push($result,['dept' => $dept_name->dept_name,
                                'title' => $title->title,
                                'salary' => $salary->salary,
                                'from_date' => $salary->from_date,
                                'to_date' => $salary->to_date]);
                        }
                    }
                }
            }
        }
        $result = json_decode(json_encode($result), FALSE);
        return $result;
    }

}
