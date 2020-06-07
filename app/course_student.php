<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_student extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
