<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'emp_no';

    function departments() {
        return $this->belongsToMany(
          'App\Department',
          'dept_emp',
          'emp_no',
          'dept_no'
        );
    }

    function dept_emp() {
        return $this->hasMany('App\Department_Employee', 'emp_no');
    }

    function titles() {
        return $this->hasMany('App\Title', 'emp_no');
    }

    function salaries() {
        return $this->hasMany('App\Salary', 'emp_no');
    }

    function dept_manager() {
        return $this->hasOne('App\Department_Manager', 'emp_no');
    }
}
