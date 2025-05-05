<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = array('name', 'email');

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
