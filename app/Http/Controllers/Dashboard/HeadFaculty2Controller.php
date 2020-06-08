<?php

namespace App\Http\Controllers\Dashboard;

use App\Department;
use App\Http\Controllers\Controller;
use App\Teacher;
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
        $facultyhead = Auth::user()->headFaculty;
        //$facultyhead=HeadFaculty::findOrFail($id);
        $faculty = $facultyhead->faculty;
        $departments = $faculty->departments;


        return view('dashboard.headFaculty.allDepartments', compact('departments'));
    }

    public function showAllprofessors()
    {

        $faculty = auth()->user()->headFaculty->faculty;
        $departmentIds = $faculty->departments->pluck('id');
        $teachers = Teacher::whereIn('department_id', $departmentIds)->with('user')->get();

        return view('dashboard.headFaculty.allProfessors', compact('teachers'));
    }

    public function showDepartmentprofessors(Department $department)
    {
        $professors = $department->teachers;
        return view('dashboard.headFaculty.departmentProfessors', compact('professors'));
    }


}