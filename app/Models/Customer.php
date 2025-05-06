<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = array('name', 'email', 'phone', 'address', 'city', 'postal_code', 'membership_level');

    public $timestamps = true;
}
