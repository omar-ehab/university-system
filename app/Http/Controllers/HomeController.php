<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //if(auth()->user()->hasRole('Student'))
       // {
          //  return view('dashboard.student-index');

     //   }
//else
       return view('home');
    }
}
