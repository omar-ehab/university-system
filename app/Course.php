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
}
