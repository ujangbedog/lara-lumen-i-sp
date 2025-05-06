<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = array(
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'user_id'
    );

    public $timestamps = true;
}
