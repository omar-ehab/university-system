<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Material;
use App\Term;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function index(Course $course)
    {
        $currentTerm = Term::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
        $materials = $course->materials()->where('term_id', $currentTerm->id)->get();

        return view('dashboard.materials.index', compact('materials', 'course'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $course
     * @return Application|Factory|View
     */
    public function create($course)
    {
        return view('dashboard.materials.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $course
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, $course)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,docx,pptx,xlsx,pdf,doc,ppt,jpg,jpeg,png|max:2048' //max-size 2Mb
        ]);
        $currentTerm = Term::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
        $file = $request->file;
        $name = $course . time() . '.' . $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        Storage::disk('public')->put($name, file_get_contents($file));
        Material::create([
            'course_id' => $course,
            'term_id' => $currentTerm->id,
            'name' => $originalName,
            'path' => $name
        ]);
        session()->flash('success', 'Materials Added Successfully');
        return redirect()->route('dashboard.materials.index', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param $course
     * @param Material $material
     * @return BinaryFileResponse
     */
    public function download($course, Material $material)
    {
        $path = public_path('storage/' . $material->path);
        $content_type = 'application/' . pathinfo($material->path, PATHINFO_EXTENSION);

        $headers = array(
            'Content-Type' => $content_type,
        );
        return response()->download($path, $material->name, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $course
     * @param Material $material
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($course, Material $material)
    {
        Storage::disk('public')->delete($material->path);
        $material->delete();
        session()->flash('success', 'Materials Deleted Successfully');
        return redirect()->route('dashboard.materials.index', $course);
    }
}
