<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['faculty_id', 'code', 'capacity', 'floor'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
