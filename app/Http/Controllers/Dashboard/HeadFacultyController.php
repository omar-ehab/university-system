<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\HeadFaculty;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class HeadFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $heads = User::whereRoleIs('headFaculty')->with('headFaculty')->get();
        return view('dashboard.facultyDeans.index', compact('heads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('dashboard.facultyDeans.create', compact('faculties'));
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
            'faculty_id' => 'required',
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
        HeadFaculty::create([
            'user_id' => $user->id,
            'faculty_id' => $request->faculty_id,
        ]);
        $user->attachRole('headFaculty');
        session()->flash('success', 'Faculty Dean Created Successfully');
        return redirect()->route('dashboard.faculty_deans.index');
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
        $head = HeadFaculty::with('user', 'faculty')->where('id', $id)->firstOrFail();
        return view('dashboard.facultyDeans.edit', compact('faculties', 'head'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $head = HeadFaculty::with('user')->where('id', $id)->firstOrFail();
        $this->validate($request, [
            'faculty_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $head->user->id,
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
        ]);
        $head->user->update($request->all());
        session()->flash('success', 'Faculty Dean Updated Successfully');
        return redirect()->route('dashboard.faculty_deans.index');
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
            $head = HeadFaculty::with('user')->where('id', $id)->firstOrFail();
            $user = $head->user;
            $head->delete();
            $user->delete();
            session()->flash('success', 'Faculty Dean Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong please try again later');
        }
        return redirect()->route('dashboard.faculty_deans.index');
    }
}
