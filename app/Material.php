<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
