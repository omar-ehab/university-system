<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\HeadDepartment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HeadDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $heads = User::whereRoleIs('headDepartment')->with('headDepartment.department')->get();
        return view('dashboard.teachers.index', compact('heads'));
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
        $request->password = bcrypt($request->password);
        $user = User::create($request->all());
        HeadDepartment::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
        ]);
        $user->attachRole('headDepartment');
        session()->flash('success', 'Head Department Created Successfully');
        return redirect()->route('dashboard.head_departments.index');
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
        $head = HeadDepartment::with('user', 'department')->where('id', $id)->firstOrFail();
        return view('dashboard.teachers.edit', compact('faculties', 'head'));
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
        $head = HeadDepartment::with('user')->where('id', $id)->firstOrFail();
        $this->validate($request, [
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,' . $head->user->id,
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
        ]);
        $head->user->update($request->all());
        session()->flash('success', 'Head Department Updated Successfully');
        return redirect()->route('dashboard.head_departments.index');
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
            $head = HeadDepartment::with('user')->where('id', $id)->firstOrFail();
            $user = $head->user;
            $head->delete();
            $user->delete();
            session()->flash('success', 'Head Department Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong please try again later');
        }
        return redirect()->route('dashboard.head_departments.index');
    }
}
