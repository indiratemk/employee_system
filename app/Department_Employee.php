<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department_Employee extends Model
{
    protected $table = 'dept_emp';

//    protected $primaryKey = 'dept_no';
//    public $incrementing = false;
//    protected $primaryKey = 'emp_no';
    function dept_salary() {
        return $this->belongsToMany('App\Salary', 'App\Employee',
            'emp_no', 'emp_no', 'emp_no');
    }

    function salary() {
        return $this->hasMany('App\Salary', 'emp_no', 'emp_no');
    }

//    protected function setKeysForSaveQuery(Builder $query)
//    {
//        $query
//            ->where('dept_no', '=', $this->dept_no)
//            ->where('emp_no', '=', $this->emp_no);
//        return $query;
//    }
}
