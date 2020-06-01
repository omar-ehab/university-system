<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $teachers = User::whereRoleIs('teacher')->with('teacher.department')->get();
        return view('dashboard.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('dashboard.teachers.create', compact('faculties'));
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
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        Teacher::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
        ]);
        $user->attachRole('teacher');
        session()->flash('success', 'Teacher Created Successfully');
        return redirect()->route('dashboard.teachers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $faculties = Faculty::all();
        $teacher = Teacher::with('user', 'department')->where('id', $id)->firstOrFail();
        return view('dashboard.teachers.edit', compact('faculties', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::with('user')->where('id', $id)->firstOrFail();
        $this->validate($request, [
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,' . $teacher->user->id,
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
        ]);
        $teacher->user->update($request->all());
        $teacher->update(['department_id' => $request->department_id]);
        session()->flash('success', 'Teacher Updated Successfully');
        return redirect()->route('dashboard.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $teacher = Teacher::with('user')->where('id', $id)->firstOrFail();
            $user = $teacher->user;
            $teacher->delete();
            $user->delete();
            session()->flash('success', 'Teacher Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong please try again later');
        }
        return redirect()->route('dashboard.teachers.index');
    }
}
