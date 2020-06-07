<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['name', 'start', 'end', 'can_register'];

    public function course_student()
    {
        return $this->hasMany(course_student::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
