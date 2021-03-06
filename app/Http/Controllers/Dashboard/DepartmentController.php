<?php

namespace App\Http\Controllers\Dashboard;

use App\Department;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $faculty_id
     * @return Application|Factory|View
     */
    public function index($faculty_id)
    {
        $departments = Department::withCount('students', 'courses', 'teachers', 'teacherAssistants', 'academicAdvisors')
            ->where('faculty_id', $faculty_id)
            ->get();
        return view('dashboard.faculties.departments.index', compact('departments', 'faculty_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $faculty_id
     * @return Application|Factory|View
     */
    public function create($faculty_id)
    {
        return view('dashboard.faculties.departments.create', compact('faculty_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $faculty_id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, $faculty_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'floor' => 'required|integer'
        ]);
        $request->merge(['faculty_id' => $faculty_id]);
        Department::create($request->all());
        session()->flash('success', 'Department Added Successfully');
        return redirect()->route('dashboard.faculties.departments.index', $faculty_id);
    }

    /**
     * Display the specified resource.
     *
     * @param $faculty_id
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($faculty_id, $id)
    {
        $department = Department::withCount('students', 'courses', 'teachers', 'teacherAssistants', 'academicAdvisors')
            ->where('id', $id)
            ->firstOrFail();
        return view('dashboard.faculties.departments.show', compact('faculty_id', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $faculty_id
     * @param Department $department
     * @return Application|Factory|View
     */
    public function edit($faculty_id, Department $department)
    {
        return view('dashboard.faculties.departments.edit', compact('faculty_id', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $faculty_id
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(Request $request, $faculty_id, Department $department)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'floor' => 'required|integer'
        ]);
        $department->update($request->all());
        session()->flash('success', 'Department Added Successfully');
        return redirect()->route('dashboard.faculties.departments.index', $faculty_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $faculty_id
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy($faculty_id, Department $department)
    {
        try {
            $department->delete();
            session()->flash('success', 'Department Deleted Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Can\'t Delete Department Because it has data associated with it');
        }
        return redirect()->route('dashboard.faculties.departments.index', $faculty_id);
    }

    public function get_departments_ajax(Request $request)
    {
        $this->validate($request, [
            'faculty_id' => 'required'
        ]);
        return Department::where('faculty_id', $request->faculty_id)->get();
    }

    public function edit_head($faculty, $department)
    {
        $department = Department::find($department);
        $oldHead = $department->head;
        $users = User::with('teacher')->whereRoleIs(['teacher'])->get();
        $users = $users->filter(function ($user) use ($department) {
            return $user->teacher->department_id == $department->id;
        });
        return view('dashboard.faculties.departments.edit_head', compact('oldHead', 'users', 'faculty', 'department'));
    }

    public function update_head(Request $request, $faculty_id, $department_id)
    {
        $this->validate($request, [
            'head_id' => 'required',
        ]);
        DB::transaction(function () use ($request, $department_id) {
            $department = Department::find($department_id);
            if ($department->head) {
                $department->head->user->detachRole('head_department');
                $department->head->delete();
            }
            $head = User::find($request->head_id);
            $head->attachRole('head_department');
            $department->head()->create(['user_id' => $request->head_id]);
        });
        session()->flash('success', 'Faculty Dean Changed Successfully');
        return redirect()->route('dashboard.faculties.departments.show', [$faculty_id, $department_id]);
    }
}
