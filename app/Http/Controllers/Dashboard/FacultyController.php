<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        $faculty = Faculty::withCount('departments', 'students', 'classrooms')->where('id', $id)->firstOrFail();
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
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Faculty $faculty)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'code' => 'required|string',
        ]);
        $faculty->update($request->all());
        session()->flash('success', 'Faculty Updated Successfully');
        return redirect()->route('dashboard.faculties.index');
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

    public function edit_head($faculty_id)
    {
        $oldDean = Faculty::find($faculty_id)->dean;
        $users = User::with('teacher.department')->whereRoleIs(['headFaculty', 'teacher'])->get();
        $users = $users->filter(function ($user) use ($faculty_id) {
            return $user->teacher->department->faculty_id == $faculty_id;
        });

        return view('dashboard.faculties.edit_dean', compact('users', 'oldDean', 'faculty_id'));
    }

    public function update_head(Request $request, $faculty_id)
    {
        $this->validate($request, [
            'dean_id' => 'required'
        ]);
        DB::transaction(function () use ($request, $faculty_id) {
            $faculty = Faculty::find($faculty_id);
            if ($faculty->dean) {
                $faculty->dean->user->detachRole('head_faculty');
                $faculty->dean->delete();
            }
            $dean = User::find($request->dean_id);
            $dean->attachRole('head_faculty');
            $faculty->dean()->create(['user_id' => $request->dean_id]);
        });
        session()->flash('success', 'Faculty Dean Changed Successfully');
        return redirect()->route('dashboard.faculties.show', $faculty_id);
    }
}
