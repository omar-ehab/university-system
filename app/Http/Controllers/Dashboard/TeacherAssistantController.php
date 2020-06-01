<?php

namespace App\Http\Controllers\Dashboard;

use App\AcademicAdvisor;
use App\Faculty;
use App\Http\Controllers\Controller;
use App\TeacherAssistant;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TeacherAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $teacherAssistants = User::whereRoleIs('teacherAssistant')->with('teacherAssistant.department')->get();
        return view('dashboard.teacher-assistants.index', compact('teacherAssistants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('dashboard.teacher-assistants.create', compact('faculties'));
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
        TeacherAssistant::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
        ]);
        $user->attachRole('teacherAssistant');
        session()->flash('success', 'Teacher Assistant Created Successfully');
        return redirect()->route('dashboard.teacher-assistants.index');
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
        $teacherAssistants = TeacherAssistant::with('user', 'department')->where('id', $id)->firstOrFail();
        return view('dashboard.teacher-assistants.edit', compact('faculties', 'teacherAssistants'));
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
        $teacherAssistant = TeacherAssistant::with('user')->where('id', $id)->firstOrFail();
        $this->validate($request, [
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,' . $teacherAssistant->user->id,
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
        ]);
        $teacherAssistant->user->update($request->all());
        $teacherAssistant->update(['department_id' => $request->department_id]);
        session()->flash('success', 'Teacher Assistant Updated Successfully');
        return redirect()->route('dashboard.teacher-assistants.index');
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
            $teacherAssistant = TeacherAssistant::with('user')->where('id', $id)->firstOrFail();
            $user = $teacherAssistant->user;
            $teacherAssistant->delete();
            $user->delete();
            session()->flash('success', 'Teacher Assistant Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong please try again later');
        }
        return redirect()->route('dashboard.teacher-assistants.index');
    }

    public function makeAcademicAdvisor(TeacherAssistant $teacherAssistant)
    {
        $advisor = AcademicAdvisor::where('user_id', $teacherAssistant->user_id)->where('department_id', $teacherAssistant->department_id)->first();
        if ($advisor) {
            session()->flash('error', 'Teacher Assistant is already an Academic Advisor');
            return redirect()->route('dashboard.teacher-assistants.index');
        }
        AcademicAdvisor::create([
            'user_id' => $teacherAssistant->user_id,
            'department_id' => $teacherAssistant->department_id
        ]);
        $user = $teacherAssistant->user;
        $user->attachRole('academicAdvisor');
        session()->flash('success', 'Request Done Successfully');
        return redirect()->route('dashboard.teacher-assistants.index');
    }
}
