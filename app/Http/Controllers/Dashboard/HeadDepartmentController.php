<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Department;
use App\Http\Controllers\Controller;
use App\Term;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadDepartmentController extends Controller
{
    public function teachers(Department $department)
    {
        $teachers = User::whereRoleIs('teacher')->where('id', '!=', auth()->user()->id)->with('teacher.department')->get();
        $teachers = $teachers->filter(function ($teacher) use ($department) {
            return $teacher->teacher->department_id == $department->id && !$teacher->hasRole('head_faculty');
        });

        return view('dashboard.teachers.index', compact('teachers'));
    }

    public function teacherAssistants(Department $department)
    {
        $teacherAssistants = User::whereRoleIs('teacher_assistant')->with('teacherAssistant.department')->get();
        $teacherAssistants = $teacherAssistants->filter(function ($assistant) use ($department) {
            return $assistant->teacherAssistant->department_id == $department->id;
        });
        return view('dashboard.teacher-assistants.index', compact('teacherAssistants'));
    }

    public function students(Department $department)
    {
        $users = User::with('student')->get();
        $students = $users->filter(function ($user) use ($department) {
            return $user->student && $user->student->department_id == $department->id;
        });

        return view('dashboard.students.index', compact('students'));
    }

    public function courses(Department $department)
    {
        $courses = Course::where('department_id', $department->id)->withCount('prerequisites', 'students')->get();
        return view('dashboard.courses.index', compact('courses'));
    }

    public function calender(Request $request, Department $department)
    {
        $terms = Term::orderBy('created_at')->get();
        $term_id = $request->term_id ? $request->term_id : $terms->first()->id;
        $data = DB::table('course_classroom')
            ->where('term_id', $term_id)
            ->get();

        return view('dashboard.head_department_week_calender', compact('terms', 'data'));
    }
}
