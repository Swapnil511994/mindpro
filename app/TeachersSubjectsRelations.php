<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachersSubjectsRelations extends Model
{
    //
    protected $fillable = ["TeacherId","subjectId"];
    protected $primaryKey = 'id';
    protected $table = 'teachersubjectsrelations';
}
