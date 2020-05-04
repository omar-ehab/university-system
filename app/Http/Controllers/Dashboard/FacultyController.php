<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $faculties = Faculty::withCount('departments', 'students', 'classrooms')->get();
        return view('dashboard.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('dashboard.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'code' => 'required|string',
        ]);
        Faculty::create($request->all());
        session()->flash('success', 'Faculty Created Successfully');
        return redirect()->route('dashboard.faculties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Faculty $faculty
     * @return Factory|View
     */
    public function show(Faculty $faculty)
    {
        return view('dashboard.faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faculty $faculty
     * @return Factory|View
     */
    public function edit(Faculty $faculty)
    {
        return view('dashboard.faculties.edit', compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return void
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faculty $faculty
     * @return RedirectResponse
     */
    public function destroy(Faculty $faculty)
    {
        try {
            $faculty->delete();
            session()->flash('success', 'Faculty Deleted Successfully');
            return redirect()->route('dashboard.faculties.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Can\'t Delete Faculty Because it has data associated with it');
            return redirect()->route('dashboard.faculties.index');
        }
    }
}
