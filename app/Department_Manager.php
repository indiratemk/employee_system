<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department_Manager extends Model
{
    protected $table = 'dept_manager';

    function department() {
        return $this->belongsTo('App\Department', 'dept_no');
    }
}
