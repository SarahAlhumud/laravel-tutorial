<?php

namespace App\Http\Controllers;

use \App\Example;
use \App\Project;
use App\Services\Twitter;
use \App\Task;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

/* ********************** Start Sarah's Comments **********************
To enter laravel playground:
$ php artisan tinker

- To create a project object:

>>> $project = new App\Project;
>>> $project->title = 'First project';
>>> $project->description = 'description of first project';
>>> $project->save();

- collections are like glorified arrays on steroids
- to show all projects objects(records) -collection-:
>>> App\Project::all();
- to show first project objects(records):
>>> App\Project::first();
or
>>> App\Project::all()[0];

>>> App\Project::latest()->first();

- to get title of all projects:
>>> App\Project::all()->map->title;

------------------
Laravel follows a convention called PSR-4 which is an auto-loading specification.

namespace: \App\Project It is means in 'app' directory and project file.
we used namespace to organized and structured files and distinguished between them.

if we want use a specific file in a file:
- we have to use '\' then full namespace path before file name.
OR
- 'use' + ' ' + '\' + full namespace path before file name, then we can use file name without full path

********************** End Sarah's Comments ********************** */

class ProjectsController extends Controller
{
    public function index()
    {

        // if we use 'use \App\Project;' in beginning of this file
        $projects = Project::all();

        // if we don't
//          $projects = \App\Project::all();


        // show projects as json format in browser $.$
        // return $projects;

        // this will open resources/views/projects/index
        // return view('projects.index', ['projects' => $projects]);
        // Compact is php function, return array ('projects'->value of 'projects' variable)
        return view('projects.index', compact('projects'));
    }

    public function create()
    {

        return view('projects.create');
    }

    public function show($id){

        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    // Route Model Binding method:
    // We don't have to query database to find the project by entered ID. Great $.$ Laravel is Fantastiiiiiiiiiic
//    public function show(Project $project){
//
//        return view('projects.show', compact('project'));
//    }

//    public function show(Filesystem $file){
//
//        dd($file);
//    }

//    public function show(Project $project){
//        dd(app('twitter'));
//    }

    // Twitter $twitter auto-resolving by Laravel.
    // It will check if there is a Twitter class in service container, if not it will check if there is a class called Twitter
    // 'app()->singleton('App\Services\Twitter', function(){'  will called
//    public function show(Project $project, Twitter $twitter){
//        dd($twitter);
//
//    }


    // example.com/projects/1/edit
    public function edit(Project $project){

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

        // dd is die and dump used for debug
//        dd(request()->all());

//        $project = Project::findOrFail($id);
//        $project->title = request()->title;
//        $project->description = request()->description;
//
//        $project->save();

        // Previous is equivalent to
        $project->update(request(['title','description']));

        // Previous is equivalent to
//        $project->update([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);


        return redirect('/projects');
    }

    public function destroy(Project $project){

//        Project::findOrFail($id)->delete();
        $project->delete();
        return redirect('/projects');

    }

    public function store(){
//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

        // Previous is equivalent to
//        Project::create([
//            'title' => request('title'),
//            'description' => \request('description')
//        ]);

        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'description' => ['required','min:3']
        ]);

        // OR
        Project::create($attributes);

        // Don't use request()->all with * protected guarded = []; *
//        Project::create(request()->all());



        // redirect is by default is a GET request
        return redirect('/projects');
        // get all data from the requests
//        return request()->all();
    }


}
