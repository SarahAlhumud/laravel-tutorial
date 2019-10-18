<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Task;

class ProjectTasksController extends Controller
{

    public function update(Task $task){
        // Without encapsulation
//        $task->update([
//            'completed' => request()->has('completed')
//        ]);

        // With encapsulation
//        $task->complete(request()->has('completed'));

        // OR
        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();

        // redirect is by default is a GET request
//        return redirect('/projects/'.$task->project->id);
        return back();
    }

//    public function store($project_id){
    public function store(Project $project){

        $attributes = request()->validate([
            'description' => ['required','min:3']
        ]);

        //         First Approach
//        Task::create([
//            'project_id' => $project->id,
//            'description' => $attributes['description']
//        ]);


        // Second Approach: preferable
//        $project->addTask(request('description'));
        $project->addTask($attributes);


        return back();



    }
}
