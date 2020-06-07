<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'department_id', 'student_id', 'cgpa', 'graduated', 'academic_advisor_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function academic_advisor()
    {
        return $this->belongsTo(AcademicAdvisor::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course')->withPivot('term_id', 'passed', 'cgpa');
    }

}
