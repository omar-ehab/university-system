<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicAdvisor extends Model
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
}
