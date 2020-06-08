<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class HeadUniversityController extends Controller
{
    public function showAllFaculties()
    {
        $faculties = Faculty::all();
        return view('dashboard.headUniversity.allFaculties', compact('faculties'));

    }

    public function viewFacultiesProfessors()
    {
        $faculties = Faculty::all();

        return view('dashboard.headUniversity.allFacultiesProfessors', compact('faculties'));

    }

    public function viewThisFacultyProfessors(int $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty_departments = $faculty->departments;


        return view('dashboard.headUniversity.thisFacultyProfessors', compact('faculty_departments'));

    }

    public function viewThisProfessorData(int $id)
    {
        $professor = Teacher::findOrFail($id);
        $professor_user = $professor->user;

        return view('dashboard.headUniversity.thisProfessorData', compact('professor_user'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
