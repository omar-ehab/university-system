<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAssistant extends Model
{
    protected $fillable = ['user_id', 'department_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher_assistant')->withPivot('term_id', 'course_classroom_id');
    }
}
