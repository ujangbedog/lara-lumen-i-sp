<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = array(
        'name',
        'description',
        'user_id',
        'start_date',
        'end_date',
        'status',
        'priority',
    );

    public $timestamps = true;
}
