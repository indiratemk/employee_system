<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDepartmentsSetDeptAvgSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $avg_salaries = DB::table('dept_emp')
            ->select(DB::raw('dept_no, AVG(salary) as avg_sal'))
            ->join('salaries', 'dept_emp.emp_no', '=', 'salaries.emp_no')
            ->whereRaw('dept_emp.to_date >= salaries.to_date')
            ->groupBy('dept_emp.dept_no')
            ->get();

        foreach ($avg_salaries as $avg) {
            DB::table('departments')
                ->where('dept_no', $avg->dept_no)
                ->update(['dept_avg_salary' => $avg->avg_sal]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('departments')
            ->update(['dept_avg_salary' => 0]);
    }
}
