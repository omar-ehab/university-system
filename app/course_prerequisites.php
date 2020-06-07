<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_prerequisites extends Model
{
   

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    
}
