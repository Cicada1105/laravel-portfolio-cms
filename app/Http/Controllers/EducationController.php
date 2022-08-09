<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Education;

class EducationController extends Controller
{
    public function list() {
        return view('education/list',[
            'institutions' => Education::all()
        ]);
    }

    /* Add methods */
    public function addForm() {
        return view('education/add');
    }
    public function add() {
        $attributes = request()->validate([
            'institution_name' => 'required',
            'degree_type' => 'required',
            'degree' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
            'slug' => 'required|unique:education|regex:/^[A-z\-]+$/',
        ]);

        $education = new Education();
        $education->institution_name = $attributes['institution_name'];
        $education->degree_type = $attributes['degree_type'];
        $education->degree = $attributes['degree'];
        $education->start_month = $attributes['start_month'];
        $education->start_year = $attributes['start_year'];
        $education->end_month = $attributes['end_month'];
        $education->end_year = $attributes['end_year'];
        $education->slug = $attributes['slug'];
        $education->user_id = Auth::user()->id;
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been added!');
    }

    /* Edit methods */
    public function editForm(Education $education) {
        return view('education/edit', [
            'education' => $education
        ]);
    }
    public function edit(Education $education)
    {

        $attributes = request()->validate([
            'institution_name' => 'required',
            'degree_type' => 'required',
            'degree' => 'required',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
            'slug' => [
                'required',
                Rule::unique('education')->ignore($education->id),
                'regex:/^[A-z\-]+$/',
            ]
        ]);

        $education->institution_name = $attributes['institution_name'];
        $education->degree_type = $attributes['degree_type'];
        $education->degree = $attributes['degree'];
        $education->start_month = $attributes['start_month'];
        $education->start_year = $attributes['start_year'];
        $education->end_month = $attributes['end_month'];
        $education->end_year = $attributes['end_year'];
        $education->slug = $attributes['slug'];
        $education->save();

        return redirect('/console/education/list')
            ->with('message', 'Education has been edited!');
    }

    /* Delete method */
    public function delete(Education $education)
    {
        $education->delete();
        
        return redirect('/console/education/list')
            ->with('message', 'Education has been deleted!');        
    }
}
