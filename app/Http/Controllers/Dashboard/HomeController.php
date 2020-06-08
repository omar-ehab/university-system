<?php

namespace App\Http\Controllers\Dashboard;

use App\Alert;
use App\Course;
use App\Faculty;
use App\Http\Controllers\Controller;
use App\Material;
use App\Student;
use App\Teacher;
use App\TeacherAssistant;
use App\Term;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        if (auth()->user()->hasRole('admin')) {
            return $this->adminPage();
        } elseif (auth()->user()->hasRole('head_department')) {
            return $this->headDepartmentPage();
        } elseif (auth()->user()->hasRole('teacher')) {
            return $this->teacherPage();
        } elseif (auth()->user()->hasRole('teacher_assistant')) {
            return $this->teacherAssistantPage();
        } elseif (auth()->user()->hasRole('student')) {
            return view('dashboard.studentHome');
        } elseif (auth()->user()->hasRole('academic_advisor')) {
            return view('dashboard.academicAdvisorHome');
        } elseif (auth()->user()->hasRole('head_faculty')) {
            return view('dashboard.headFacultyHome');
        } elseif (auth()->user()->hasRole('head_university')) {
            return view('dashboard.headUniversityHome');
        }
    }

    private function adminPage()
    {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $teacherAssistantCount = TeacherAssistant::count();
        $facultiesCount = Faculty::count();
        $chart[0] = Student::where('cgpa', '>', 3.5)->count();
        $chart[1] = Student::where('cgpa', '>', 3)->where('cgpa', '<=', 3.5)->count();
        $chart[2] = Student::where('cgpa', '>', 2)->where('cgpa', '<=', 3)->count();
        $chart[3] = Student::where('cgpa', '<=', 2)->count();
        $chart = json_encode($chart);

        return view('dashboard.admin', 
        compact('studentsCount', 'teachersCount', 'teacherAssistantCount', 'facultiesCount', 'chart'));
    }

    private function headDepartmentPage()
    {
        $coursesCount = Course::where('department_id', auth()->user()->headDepartment->department_id)->count();
        $teachersCount = Teacher::where('department_id', auth()->user()->headDepartment->department_id)->count();
        $teacherAssistantCount = TeacherAssistant::where('department_id', auth()->user()->headDepartment->department_id)->count();
        $studentsCount = Student::where('department_id', auth()->user()->headDepartment->department_id)->count();
        $chart[0] = Student::where('department_id', auth()->user()->headDepartment->department_id)->where('cgpa', '>', 3.5)->count();
        $chart[1] = Student::where('department_id', auth()->user()->headDepartment->department_id)->where('cgpa', '>', 3)->where('cgpa', '<=', 3.5)->count();
        $chart[2] = Student::where('department_id', auth()->user()->headDepartment->department_id)->where('cgpa', '>', 2)->where('cgpa', '<=', 3)->count();
        $chart[3] = Student::where('department_id', auth()->user()->headDepartment->department_id)->where('cgpa', '<=', 2)->count();
        $chart = json_encode($chart);
        return view('dashboard.head_department', 
        compact('coursesCount', 'teachersCount', 'teacherAssistantCount', 'studentsCount', 'chart'));
    }

    private function teacherPage()
    {
        $coursesIds = auth()->user()->teacher->courses->pluck('id');
        $currentTerm = Term::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
        $coursesCount = auth()->user()->teacher->courses()->count();
        $courseIds = auth()->user()->teacher->courses->pluck('id');
        $studentsCount = DB::table('course_students')->whereIn('course_id', $courseIds)->where('term_id', $currentTerm->id)->count();
        $alertsCount = Alert::whereIn('course_id', $coursesIds)->count();
        $materialsCount = Material::where('user_id', auth()->user()->id)->count();
        $studentIds = DB::table('course_students')->whereIn('course_id', $courseIds)->where('term_id', $currentTerm->id)->get()->pluck('id');

        $chart[0] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacher->department_id)->where('cgpa', '>', 3.5)->count();
        $chart[1] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacher->department_id)->where('cgpa', '>', 3)->where('cgpa', '<=', 3.5)->count();
        $chart[2] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacher->department_id)->where('cgpa', '>', 2)->where('cgpa', '<=', 3)->count();
        $chart[3] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacher->department_id)->where('cgpa', '<=', 2)->count();
        $chart = json_encode($chart);

        return view('dashboard.teacher', compact('coursesCount', 'studentsCount', 'alertsCount', 'materialsCount', 'chart'));
    }

    public function teacherAssistantPage()
    {
        $coursesIds = auth()->user()->teacherAssistant->courses->pluck('id');
        $currentTerm = Term::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
        $coursesCount = auth()->user()->teacherAssistant->courses()->count();
        $courseIds = auth()->user()->teacherAssistant->courses->pluck('id');
        $studentsCount = DB::table('course_students')->whereIn('course_id', $courseIds)->where('term_id', $currentTerm->id)->count();
        $alertsCount = Alert::whereIn('course_id', $coursesIds)->count();
        $materialsCount = Material::where('user_id', auth()->user()->id)->count();
        $studentIds = DB::table('course_students')->whereIn('course_id', $courseIds)->where('term_id', $currentTerm->id)->get()->pluck('id');

        $chart[0] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacherAssistant->department_id)->where('cgpa', '>', 3.5)->count();
        $chart[1] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacherAssistant->department_id)->where('cgpa', '>', 3)->where('cgpa', '<=', 3.5)->count();
        $chart[2] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacherAssistant->department_id)->where('cgpa', '>', 2)->where('cgpa', '<=', 3)->count();
        $chart[3] = Student::whereIn('id', $studentIds)->where('department_id', auth()->user()->teacherAssistant->department_id)->where('cgpa', '<=', 2)->count();
        $chart = json_encode($chart);

        return view('dashboard.teacher-assistant', compact('coursesCount', 'studentsCount', 'alertsCount', 'materialsCount', 'chart'));
    }


}
