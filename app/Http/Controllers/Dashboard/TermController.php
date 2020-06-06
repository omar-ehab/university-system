<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Term;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $terms = Term::all();
        return view('dashboard.terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.terms.create');
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
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start'
        ]);
        Term::create($request->all());
        session()->flash('success', 'Term Created Successfully');
        return redirect()->route('dashboard.terms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Term $term
     * @return Application|Factory|View
     */
    public function edit(Term $term)
    {
        return view('dashboard.terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Term $term
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Term $term)
    {
        $this->validate($request, [
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start'
        ]);

        $term->update($request->all());
        session()->flash('success', 'Term Updated Successfully');
        return redirect()->route('dashboard.terms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Term $term
     * @return RedirectResponse
     */
    public function destroy(Term $term)
    {
        try {
            $term->delete();
        } catch (Exception $e) {
            session()->flash('error', "Can't Delete Term");
            return redirect()->back();
        }
        session()->flash('success', "Term Deleted Successfully");
        return redirect()->route('dashboard.terms.index');
    }

    public function open_registration(Term $term)
    {
        $term->update([
            'can_register' => true
        ]);
        session()->flash('success', "Term Registration Opened Successfully");
        return redirect()->route('dashboard.terms.index');
    }

    public function close_registration(Term $term)
    {
        $term->update([
            'can_register' => false
        ]);
        session()->flash('success', "Term Registration Closed Successfully");
        return redirect()->route('dashboard.terms.index');
    }
}
