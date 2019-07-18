<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //

    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected $fillable = ['code', 'title', 'credit', 'lecturer', 'description'];
}
