<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadFaculty extends Model
{
    protected $fillable = ['user_id', 'faculty_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
