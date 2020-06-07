<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pending_courses extends Model
{

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
