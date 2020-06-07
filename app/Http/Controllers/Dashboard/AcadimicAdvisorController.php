<?php

namespace App\Http\Controllers\Dashboard;

use App\Alert;
use App\Course;
use App\course_student;
use App\Http\Controllers\Controller;
use App\pending_courses;
use App\Student;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AcadimicAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('dashboard.academicAdvisor.academicAdvisorHome');

    }


    public function showMyStudents(int $id)
    {
        $user = User::findOrFail($id);
        $academicAdvisor = $user->academicAdvisor;
        $student = $academicAdvisor->student;
        return view('dashboard.academicAdvisor.myStudents', ['student' => $student]);

    }


    public function showStudentData(int $id)
    {
        $user = User::findOrFail($id);
        $student = $user->student;
        return view('dashboard.academicAdvisor.studentData', ['student' => $student]);

    }

    public function goIssue(int $id)
    {
        $course = Course::all();
        $student = Student::findOrFail($id);
        return view('dashboard.academicAdvisor.issueAlert', compact('student', 'course'));

    }

    public function showMyProfile(int $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.academicAdvisor.profile', compact('user'));
    }


    public function searchForStudent()
    {
        $search = request('search');

        $advisor = Auth::user()->academicAdvisor;

        $students = Student::with('user')->where('academic_advisor_id', $advisor->id)->whereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->get();


        return view('dashboard.academicAdvisor.studentSearch', compact('students'));

    }


    public function viewAllPendingRequests()
    {
        $advisor = Auth::user()->academicAdvisor;

        // $students = Student::where('academic_advisor_id', $advisor->id)->whereHas('pending_register_course', function($q)  {
        //     $q->where('student_id', '=', 'student_id');
        // })->get();

        $students = Student::where('academic_advisor_id', $advisor->id)->with('pending_courses')->get();

        //dd($students);
        return view('dashboard.academicAdvisor.allPendingRequests', ['students' => $students]);
    }

    public function storeAlert(int $id)
    {
        request()->validate([
            'body' => 'required'

        ]);

        $alert = new Alert();

        $alert->course_id = request('course');
        // $alert->course_id=1;

        $alert->student_id = $id;
        $alert->body = request('body');
        $alert->save();


        //hard coded url
        // return redirect('/articles');

        //      return redirect(route('articles.index',$article));


        return redirect()->back()->with('message', "Alert has been issued , awaiting Doctor's approval");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    public function showStudentPendingRequests(int $id)
    {
        $user = User::findOrFail($id);
        $studentID = $user->student;
        $pendingRequests = pending_courses::where('student_id', $studentID->id)->get();

        return view('dashboard.academicAdvisor.studentPendingRequests', ['pendingRequests' => $pendingRequests]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    public function acceptPendingRequests(int $id)
    {
        $pendingRequest = pending_courses::findOrFail($id);
        $courseRegister = new course_student();

        $courseRegister->course_id = $pendingRequest->course_id;
        $courseRegister->student_id = $pendingRequest->student_id;
        $courseRegister->term_id = $pendingRequest->term_id;

        $courseRegister->save();
        $pendingRequest->delete();

        return redirect()->back();
    }

    public function declinePendingRequests(int $id)
    {
        $pendingRequest = pending_courses::findOrFail($id);
        $pendingRequest->delete();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
