<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //



    protected $fillable = ['code', 'title', 'credit', 'lecturer', 'description'];
}
