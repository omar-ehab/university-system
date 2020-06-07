<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
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

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function department()
    {
        return $this->belongsToMany(Department::class);
    }

    public function course_prerequisites()
    {
        return $this->hasMany(course_prerequisites::class);
    }

    
}
