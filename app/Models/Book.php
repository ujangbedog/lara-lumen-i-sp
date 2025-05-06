<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = array(
        'title',
        'author',
        'isbn',
        'published_year',
        'status',
        'pages'
    );

    public $timestamps = true;
}
