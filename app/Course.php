<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['department_id', 'name', 'code', 'credit_hours'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function prerequisites()
    {
        return $this->belongsToMany(Course::class, 'course_prerequisites', 'prerequisite_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course', 'student_id')->withPivot('passed', 'cgpa', 'term_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher')->withPivot('term_id');
    }

    public function teacherAssistants()
    {
        return $this->belongsToMany(TeacherAssistant::class, 'course_teacher_assistant')->withPivot('term_id', 'course_classroom_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'course_classroom')->withPivot('term_id', 'day_number', 'from', 'to');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot('term_id', 'passed', 'cgpa');
    }

    public function term()
    {
        return $this->belongsToMany(Term::class);
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function pending_courses()
    {
        return $this->hasMany(pending_courses::class);
    }

    public function course_student()
    {
        return $this->hasMany(course_student::class);
    }

    public function course_prerequisites()
    {
        return $this->hasMany(course_prerequisites::class);
    }
}
