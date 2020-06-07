<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'gender', 'nationality', 'birth_date', 'national_id', 'religion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function teacherAssistant()
    {
        return $this->hasOne(TeacherAssistant::class);
    }

    public function headDepartment()
    {
        return $this->hasOne(HeadDepartment::class);
    }

    public function headFaculty()
    {
        return $this->hasOne(HeadFaculty::class);
    }

    public function headUniversity()
    {
        return $this->hasOne(HeadUniversity::class);
    }

    public function academicAdvisor()
    {
        return $this->hasOne(AcademicAdvisor::class);
    }

}
