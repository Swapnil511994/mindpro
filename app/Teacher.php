<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = ["Name","Gender","Email","Contact","UserId"];
    protected $primaryKey = 'TeacherId';
    protected $table = 'teachers';
}
