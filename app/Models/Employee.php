<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = array('name', 'email', 'phone', 'position', 'department', 'hire_date', 'salary');

    public $timestamps = true;
}
