<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = array(
        'title',
        'content',
        'priority',
        'is_archived',
        'user_id'
    );

    public $timestamps = true;
}
