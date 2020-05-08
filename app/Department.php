<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['faculty_id', 'name', 'code', 'floor'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function head()
    {
        return $this->hasOne(HeadDepartment::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function teacherAssistants()
    {
        return $this->hasMany(TeacherAssistant::class);
    }

    public function academicAdvisors()
    {
        return $this->hasMany(AcademicAdvisor::class);
    }
}
