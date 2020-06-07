<?php

namespace App\Http\Controllers\Dashboard;

use App\Classroom;
use App\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Faculty $faculty
     * @return Application|Factory|View
     */
    public function index(Faculty $faculty)
    {
        $classrooms = $faculty->classrooms;
        return view('dashboard.faculties.classrooms.index', compact('classrooms', 'faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Faculty $faculty
     * @return Application|Factory|View
     */
    public function create(Faculty $faculty)
    {
        return view('dashboard.faculties.classrooms.create', compact('faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, Faculty $faculty)
    {
        $this->validate($request, [
            'code' => 'required',
            'capacity' => 'required|integer|min:5',
            'floor' => 'required|integer|min:0'
        ]);
        $request->merge(['faculty_id' => $faculty->id]);
        Classroom::create($request->all());
        session()->flash('success', 'Classroom Created Successfully');
        return redirect()->route('dashboard.faculties.classrooms.index', $faculty->id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Faculty $faculty
     * @param Classroom $classroom
     * @return Application|Factory|View
     */
    public function edit(Faculty $faculty, Classroom $classroom)
    {
        return view('dashboard.faculties.classrooms.edit', compact('faculty', 'classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Faculty $faculty
     * @param Classroom $classroom
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Faculty $faculty, Classroom $classroom)
    {
        $this->validate($request, [
            'code' => 'required',
            'capacity' => 'required|integer|min:5',
            'floor' => 'required|integer|min:0'
        ]);
        $request->merge(['faculty_id' => $faculty->id]);
        $classroom->update($request->all());
        session()->flash('success', 'Classroom Updated Successfully');
        return redirect()->route('dashboard.faculties.classrooms.index', $faculty->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faculty $faculty
     * @param Classroom $classroom
     * @return RedirectResponse
     */
    public function destroy(Faculty $faculty, Classroom $classroom)
    {
        try {
            $classroom->delete();
            session()->flash('success', 'Classroom Deleted Successfully');
            return redirect()->route('dashboard.faculties.classrooms.index', $faculty->id);
        } catch (\Exception $e) {
            session()->flash('error', 'Can\'t Delete Classroom Because it has data associated with it');
            return redirect()->route('dashboard.faculties.classrooms.index', $faculty->id);
        }
    }
}
