<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Department;

use App\HeadFaculty;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class HeadFaculty2Controller extends Controller
{

//OUR HEAD FACUILTY AREA 


public function index()
{
    
    return view('dashboard.headFaculty.headFacultyHome');
}
public function showAllDepartments()
{
    $facultyhead=Auth::user()->headFaculty;
    //$facultyhead=HeadFaculty::findOrFail($id);
    $faculty=$facultyhead->faculty;
    $departments=$faculty->departments;
    


    return view('dashboard.headFaculty.allDepartments',compact('departments'));
}

public function showAllprofessors()
{
    $facultyhead=Auth::user()->headFaculty;
    //$facultyhead=HeadFaculty::findOrFail($id);
    $faculty=$facultyhead->faculty;
    $departments=$faculty->departments;
    


    return view('dashboard.headFaculty.allProfessors',compact('departments'));
}

public function showDepartmentprofessors(int $id)
{
    $department=Department::findOrFail($id);
    $professors=$department->teachers;
    
    return view('dashboard.headFaculty.departmentProfessors',compact('professors'));
}



}