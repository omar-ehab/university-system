<?php

namespace App\Http\Controllers\Dashboard;

use App\Classroom;
use App\Course;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\TeacherAssistant;
use App\Term;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CourseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.courses.create', compact('courses'));
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
            'code' => 'required|unique:courses',
            'credit_hours' => 'required|numeric|min:1|max:5'
        ]);
        $course = Course::create($request->all());
        if ($request->prerequisites) {
            $course->prerequisites()->sync($request->prerequisites);
        }
        session()->flash('success', 'Course Created Successfully');
        return redirect()->route('dashboard.department.courses', auth()->user()->headDepartment->department_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $course = Course::with('department', 'prerequisites')->withCount('students')->where('id', $id)->firstOrFail();
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function edit(Course $course)
    {
        $courses = Course::where('id', '!=', $course->id)->get();
        return view('dashboard.courses.edit', compact('course', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'department_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:courses',
            'credit_hours' => 'required|numeric|min:1|max:5'
        ]);
        $course->update($request->all());
        if ($request->prerequisites) {
            $course->prerequisites()->sync($request->prerequisites);
        }
        session()->flash('success', 'Course Updated Successfully');
        return redirect()->route('dashboard.department.courses', auth()->user()->headDepartment->department_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
        } catch (\Exception $e) {
            session()->flash('error', "Can't Delete Course");
            return redirect()->route('dashboard.department.courses', auth()->user()->headDepartment->department_id);
        }
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('dashboard.department.courses', auth()->user()->headDepartment->department_id);
    }

    public function assign_teacher_page(Course $course)
    {
        $weekDays = [
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday'
        ];
        $terms = Term::where('start', '>=', now())->get();
        $classrooms = Classroom::where('faculty_id', $course->department->faculty_id)->get();
        $teachers = Teacher::where('department_id', auth()->user()->headDepartment->department_id)->get();

        return view('dashboard.courses.assign_teacher', compact('teachers', 'course', 'terms', 'classrooms', 'weekDays'));
    }

    public function assign_teacher(Request $request, Course $course)
    {
        $this->validate($request, [
            'term_id' => 'required',
            'teacher_id' => 'required',
            'classroom_id' => 'required',
            'day_number' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from'
        ]);
        $classAvailable = $this->checkClassroomAvailability($request);
        if ($classAvailable) {
            DB::transaction(function () use ($course, $request) {
                $course->teachers()->attach($request->teacher_id, ['term_id' => $request->term_id]);
                $course->classrooms()->attach($request->classroom_id, ['term_id' => $request->term_id,
                    'day_number' => $request->day_number,
                    'from_time' => $request->from,
                    'to_time' => $request->to
                ]);
            });
            session()->flash('success', 'Teacher Assigned to Course Successfully');
        } else {
            session()->flash('error', 'Class is not Available in this time (From: ' . Carbon::createFromFormat('H:i', $request->from)->format('h:i A') . 'To: ' . Carbon::createFromFormat('H:i', $request->to)->format('h:i A') . ')');
            return redirect()->back();
        }
        return redirect()->route('dashboard.courses.show', [auth()->user()->headDepartment->department_id, $course->id]);
    }

    public function assign_teacher_assistant_page(Course $course)
    {
        $weekDays = [
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday'
        ];
        $terms = Term::where('start', '>=', now())->get();
        $classrooms = Classroom::where('faculty_id', $course->department->faculty_id)->get();
        $teacherAssistants = TeacherAssistant::where('department_id', auth()->user()->headDepartment->department_id)->get();
        return view('dashboard.courses.assign_teacher_assistant', compact('teacherAssistants', 'course', 'terms', 'classrooms', 'weekDays'));
    }

    public function assign_teacher_assistant(Request $request, Course $course)
    {
        $this->validate($request, [
            'term_id' => 'required',
            'teacher_assistant_ids' => 'required|array|min:1',
            'teacher_assistant_ids.*' => 'required|distinct',
            'classroom_id' => 'required',
            'day_number' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from'
        ]);
        $classAvailable = $this->checkClassroomAvailability($request);
        if ($classAvailable) {
            DB::transaction(function () use ($request, $course) {
                $course->teacherAssistants()->attach($request->teacher_assistant_id, ['term_id' => $request->term_id]);
                $course->classrooms()->attach($request->classroom_id, ['term_id' => $request->term_id,
                    'day_number' => $request->day_number,
                    'from_time' => $request->from,
                    'to_time' => $request->to
                ]);
            });
            session()->flash('success', 'Teacher Assistant Assigned to Course Successfully');
        } else {
            session()->flash('error', 'Class is not Available in this time (From: ' . Carbon::createFromFormat('H:i', $request->from)->format('h:i A') . 'To: ' . Carbon::createFromFormat('H:i', $request->to)->format('h:i A') . ')');
            return redirect()->back();
        }
        return redirect()->route('dashboard.courses.show', [auth()->user()->headDepartment->department_id, $course->id]);
    }

    public function students(Request $request, Course $course)
    {
        $terms = Term::all();
        $students = $course->students;
        if ($request->term_id) {
            $students = $students->filter(function ($student) use ($request) {
                return $student->pivot->term_id == $request->term_id;
            });
        }
        if ($request->status) {
            $status = $request->status == 'passed';
            $students = $students->filter(function ($student) use ($status) {
                return $student->pivot->passed == $status;
            });
        }
        return view('dashboard.courses.students', compact('students', 'course', 'terms'));
    }

    private function checkClassroomAvailability($request)
    {
        $data = DB::table('course_classroom')
            ->where('classroom_id', $request->classroom_id)
            ->where('term_id', $request->term_id)
            ->where('day_number', $request->day_number)
            ->where(function ($q) use ($request) {
                $q->whereRaw('(from_time < ? AND to_time > ?) OR (from_time < ? AND to_time > ?)', [
                    Carbon::createFromFormat('H:i', $request->from),
                    Carbon::createFromFormat('H:i', $request->from),
                    Carbon::createFromFormat('H:i', $request->to),
                    Carbon::createFromFormat('H:i', $request->to),
                ]);
            })->get();
        if (count($data) > 0)
            return false;
        return true;
    }
}
