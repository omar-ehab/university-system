<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['course_id', 'term_id', 'name', 'path'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
