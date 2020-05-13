<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('student')) {
            // here you should return student home
        } elseif (auth()->user()->hasRole('teacher')) {
            // here you should return teacher home
        }
        // .
        // .
        // .
        // and so on ...

        return view('dashboard.index');
    }
}
