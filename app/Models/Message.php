<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array(
        'subject',
        'body',
        'recipient',
        'status',
        'is_read',
        'user_id'
    );

    public $timestamps = true;
}
