<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


use App\Models\Employment;


class EmploymentController extends Controller
{
    //
    public function list() {
        return view('employment/list',[
            'employments' => Employment::all()
        ]);
    }

    /* Add methods */
    public function addForm() {
        return view('employment/add');
    }
    public function add() {
        $attributes = request()->validate([
            'title' => 'required',
            'employer' => 'required',
            'description' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
            'slug' => 'required|unique:employments|regex:/^[A-z\-]+$/',
        ]);

        $employment = new Employment();
        $employment->title = $attributes['title'];
        $employment->employer = $attributes['employer'];
        $employment->description = $attributes['description'];
        $employment->start_month = $attributes['start_month'];
        $employment->start_year = $attributes['start_year'];
        $employment->end_month = $attributes['end_month'];
        $employment->end_year = $attributes['end_year'];
        $employment->slug = $attributes['slug'];
        $employment->user_id = Auth::user()->id;
        $employment->save();

        return redirect('/console/employment/list')
            ->with('message', 'Employment has been added!');
    }

    /* Edit methods */
    public function editForm(Employment $employment) {
        return view('employment/edit', [
            'employment' => $employment
        ]);
    }
    public function edit(Employment $employment)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'employer' => 'required',
            'description' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
            'slug' => [
                'required',
                Rule::unique('employments')->ignore($employment->id),
                'regex:/^[A-z\-]+$/',
            ]
        ]);

        $employment->title = $attributes['title'];
        $employment->employer = $attributes['employer'];
        $employment->description = $attributes['description'];
        $employment->start_month = $attributes['start_month'];
        $employment->start_year = $attributes['start_year'];
        $employment->end_month = $attributes['end_month'];
        $employment->end_year = $attributes['end_year'];
        $employment->slug = $attributes['slug'];
        $employment->save();

        return redirect('/console/employment/list')
            ->with('message', 'Employment has been edited!');
    }

    /* Delete method */
    public function delete(Employment $employment)
    {
        $employment->delete();
        
        return redirect('/console/employment/list')
            ->with('message', 'Employment has been deleted!');        
    }
}
