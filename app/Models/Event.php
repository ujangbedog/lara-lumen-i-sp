<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = array(
        'title',
        'description',
        'status',
        'organizer',
        'event_date',
        'location',
        'user_id'
    );

    public $timestamps = true;
}
