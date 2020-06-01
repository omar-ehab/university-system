<?php

namespace App\Http\Controllers\Dashboard;

use App\Faculty;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $students = User::whereRoleIs('student')->with('student.department')->get();
        return view('dashboard.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('dashboard.students.create', compact('faculties'));
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
            'academic_advisor_id' => 'required'
        ]);
        $request['password'] = bcrypt($request->password);
        $academic_advisor_id = User::find($request->academic_advisor_id)->academicAdvisor->id;
        DB::transaction(function () use ($request, $academic_advisor_id) {
            $user = User::create($request->all());
            Student::create([
                'user_id' => $user->id,
                'department_id' => $request->department_id,
                'student_id' => time(),
                'cgpa' => 0,
                'graduated' => false,
                'academic_advisor_id' => $academic_advisor_id
            ]);
            $user->attachRole('student');
        });
        session()->flash('success', 'Student Created Successfully');
        return redirect()->route('dashboard.students.index');
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
        $student = Student::with('user', 'department')->where('id', $id)->firstOrFail();
        return view('dashboard.students.edit', compact('faculties', 'student'));
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
        $student = Student::with('user')->where('id', $id)->firstOrFail();
        $this->validate($request, [
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,' . $student->user->id,
            'gender' => 'required|in:male,female',
            'mobile' => 'required|digits:11',
            'nationality' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'national_id' => 'required|digits:14',
            'religion' => 'required',
        ]);
        DB::transaction(function () use ($request, $student) {
            $academic_advisor_id = User::find($request->academic_advisor_id)->academicAdvisor->id;
            $student->user->update($request->all());
            $student->update(['department_id' => $request->department_id, 'academic_advisor_id' => $academic_advisor_id]);
        });

        session()->flash('success', 'Student Updated Successfully');
        return redirect()->route('dashboard.students.index');
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
            $student = Student::with('user')->where('id', $id)->firstOrFail();
            $user = $student->user;
            $student->delete();
            $user->delete();
            session()->flash('success', 'Student Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong please try again later');
        }
        return redirect()->route('dashboard.students.index');
    }

    public function get_advisors_by_department_ajax(Request $request)
    {
        $advisors = User::whereRoleIs('academicAdvisor')->get();
        $advisors = $advisors->filter(function ($advisor) use ($request) {
            return $advisor->academicAdvisor->department_id == $request->department_id;
        });

        return $advisors;
    }
}
