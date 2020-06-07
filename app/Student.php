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

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_students')->withPivot('term_id', 'passed', 'cgpa', 'isPaid');
    }

    public function term()
    {
        return $this->belongsToMany(Term::class);
    }

    public function alert()
    {
        return $this->hasMany(Alert::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course')->withPivot('term_id', 'passed', 'cgpa');
    }

    public function pending_courses()
    {
        return $this->hasMany(pending_courses::class);
    }

    public function course_student()
    {
        return $this->hasMany(course_student::class);
    }
}
