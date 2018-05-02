<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'dept_no';
    public $incrementing = false;

    function employees() {
        return $this->belongsToMany(
            'App\Employee',
            'dept_emp',
            'dept_no',
            'emp_no'
        );
    }

    function dept_emp() {
        return $this->hasMany('App\Department_Employee', 'dept_no');
    }
}
