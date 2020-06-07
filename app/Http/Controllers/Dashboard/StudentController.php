<?php

namespace App\Http\Controllers\Dashboard;

use App\Alert;
use App\Course;
use App\Http\Controllers\Controller;
use App\pending_courses;
use App\Student;
use App\User;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */

    //  ours afnaaaan rewaaaaan
    public function index()
    {
        return view('dashboard.student.studentHome');
    }

    public function showProfile(int $id)
    {
        // $article= Article::findOrFail($id);
        $user = User::findOrFail($id);
        //   $student=Student::findOrFail($id);
        // dd($student);
        $student = $user->student;
        // return view('dashboard.student.profile',['user'=>$user]);
        return view('dashboard.student.profile', ['student' => $student]);

    }

    public function showCourses(int $id)
    {
        $user = User::findOrFail($id);
        $student = $user->student;
        $course = $student->course;
        $collection = new collection();
        foreach ($course as $course) {
            if ($course->pivot->isPaid) {
                $collection->push($course);
            }
        }

        return view('dashboard.student.myCourses', ['collection' => $collection]);
    }

    public function registerCourses()
    {
        $student = auth()->user()->student;
        $student_courses = $student->course_student->where('passed', 1);

        $student_department = $student->department;
        $department_courses = $student_department->courses;
        $collection = new collection();
        foreach ($student_courses as $student_course) {

            $course = $student_course->course;
            $collection->push($course);
        }
        $neededCourses = $department_courses->diff($collection);
        return view('dashboard.student.registerCourses', compact('neededCourses'));
    }

    public function addCourse(int $id)
    {
        $student = Auth::user()->student;
        $student_courses = $student->course;
        $pres = Course::find($id)->course_prerequisites;
        $collection = new collection();
        $flag = 0;
        foreach ($pres as $pre) {
            $course_pre = Course::findOrFail($pre->prerequisite_id);
            $collection->push($course_pre);
        }
        $inters = $student_courses->intersect($collection);
        foreach ($inters as $inter) {
            $flag = 0;
            if ($inter->pivot->passed == 0) {
                $flag = 1;
                break;
            }

        }

        if ($flag == 1) {
            return view('dashboard.student.courseConflict');
        } else {
            $theCourse = Course::find($id);
            $pending_request = new pending_courses();
            $pending_request->course_id = $id;
            $pending_request->student_id = $student->id;
            $pending_request->term_id = 1;//hna mfrood al term ally opened by IT member
            $pending_request->save();

            return view('dashboard.student.requestIsPending');
        }


    }

    public function showCourseMaterial(int $id)
    {
        $material = Course::find($id)->material;
        return view('dashboard.student.courseMaterial', ['material' => $material]);
    }


    public function showAlerts(int $id)
    {
        $user = User::findOrFail($id);
        $student = $user->student;

        $alert = $student->alert;

        return view('dashboard.student.alerts', ['alert' => $alert]);

    }

    public function showAlertData(int $id)
    {
        $alert = Alert::findOrFail($id);

        return view('dashboard.student.alertData', ['alert' => $alert]);

    }

    public function showTranscript(int $id)
    {
        $user = User::findOrFail($id);
        $student = $user->student;

        $student_course = $student->course_student;

        return view('dashboard.student.transcript', compact('student_course'));

    }


    public function showTermTranscript(int $id)
    {

        $user = Auth::user();
        $student = $user->student;

        $student_term_courses = $student->course_student->where('term_id', $id);
        return view('dashboard.student.thisTermTranscript', compact('student_term_courses'));
    }


    public function payOnline()
    {
        return view('dashboard.student.payment');
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
