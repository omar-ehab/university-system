<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['course_id', 'term_id', 'name', 'path', 'user_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
