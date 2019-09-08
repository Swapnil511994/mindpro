<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherClassesRelation extends Model
{
    //
    protected $fillable = ["TeacherId","ClassId"];
    protected $primaryKey = 'id';
    protected $table = 'teacherclassesrelations';
}
