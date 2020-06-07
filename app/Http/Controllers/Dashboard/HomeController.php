<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('student')) {
            // here you should return student home
            return view('dashboard.student.studentHome');
        } elseif (auth()->user()->hasRole('academicAdvisor')) {
            return view('dashboard.academicAdvisor.academicAdvisorHome');
        }elseif (auth()->user()->hasRole('headFaculty')) {
            return view('dashboard.headFaculty.headFacultyHome');
        }elseif (auth()->user()->hasRole('headUniversity')) {
            return view('dashboard.headUniversity.headUniversityHome');
        }

        // .
        // .
        // .
        // and so on ...
        else{
        return view('dashboard.index');
        }
    }
}
