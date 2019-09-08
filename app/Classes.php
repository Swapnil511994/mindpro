<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $fillable = ["Name"];
    protected $primaryKey = 'TeacherId';
    protected $table = 'teachers';
}
