<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Project;
use App\Models\Education;
use App\Models\Employment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', function(){

    $projects = Project::orderBy('created_at')->get();

    foreach($projects as $key => $project)
    {
        $projects[$key]['user'] = User::where('id', $project['user_id'])->first();

        if($project['image'])
        {
            $projects[$key]['image'] = env('APP_URL').'storage/'.$project['image'];
        }
    }

    return $projects;

});

Route::get('/projects/profile/{project?}', function(Project $project){

    $project['user'] = User::where('id', $project['user_id'])->first();
    $project['type'] = Type::where('id', $project['type_id'])->first();

    if($project['image'])
    {
        $project['image'] = env('APP_URL').'storage/'.$project['image'];
    }

    return $project;

});


Route::get('/education', function(){

    $institutions = Education::orderBy('created_at')->get();

    foreach($institutions as $key => $education)
    {
        $institutions[$key]['user'] = User::where('id', $education['user_id'])->first();
    }

    return $institutions;

});

Route::get('/education/profile/{education?}', function(Education $education){

    $education['user'] = User::where('id', $education['user_id'])->first();

    return $education;

});


Route::get('/employment', function(){

    $employments = Education::orderBy('created_at')->get();

    foreach($employments as $key => $employment)
    {
        $employments[$key]['user'] = Employment::where('id', $employment['user_id'])->first();
    }

    return $employments;

});

Route::get('/employment/profile/{employment?}', function(Employment $employment){

    $employment['user'] = User::where('id', $employment['user_id'])->first();

    return $employment;

});