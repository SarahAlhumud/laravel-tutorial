<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Filesystem\Filesystem;
use \App\Example;
use \App\Repositories\UserRepository;
use App\Services\Twitter;

/* ********************** Start Sarah's Comments **********************

This project is explain laravel concepts from this tutorial https://laracasts.com/series/laravel-from-scratch-2018/

*/

// *********** Method 1: using route closures ***********
//Route::get('/', function () {
//
//    $tests = [
//      'First',
//      'Second',
//      'Third'
//    ];
//
//    return view('welcome', ['tests' => $tests]);
//});

// ------------- only single instance of an element ---------
//app()->singleton('example', function (){
//
//    return new \App\Example;
//});

// -------------- multiple instances of an element --------
//app()->bind('example', function (){
//
//    return new \App\Example;
//});


//app()->singleton('App\Services\Twitter', function(){
//
//    return new \App\Services\Twitter('affsfffss');
//});

Route::get('/test', function () {

    $tests = [
      'First',
      'Second',
      'Third'
    ];

//    dd(app(\App\Example::class),app(\App\Example::class));
    dd(app('\App\Example'));

//    return view('test', ['tests' => $tests, 'var' => 'variable', 'fromQuery' => request('title'),
//        'script' => '<script>window.alert("Executed $.$")</script>'
//        ]);

    // The view can be returned in another form
//    return view('test') -> withTests($tests) -> withVar('variable') -> withFromQuery(request('title')) ->
//        withScript('<script>window.alert("Executed $.$")</script>');

    // Or
    return view('test') -> with( ['tests' => $tests, 'var' => 'variable', 'fromQuery' => request('title'),
        'script' => '<script>window.alert("Executed $.$")</script>' ]);

});

Route::get('/interface', function (UserRepository $user){
    dd($user);
});

Route::get('/twitter', function (Twitter $twitter){
    dd($twitter);
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/about', function (){
    return view('about');
});

/* Routing Conventions
 *
 *          GET /projects: Give me all the projects. The action func is 'index'

 *          GET /projects/create: create object 'project'. The action func is 'create'

 *          GET /projects/1: show object's details 'project'. The action func is 'show'

 *          POST /projects: Add persist object 'project' to database. The action func is 'store'

 *          GET /project/1/edit: edit existing resource using form. The action func is 'edit'

 *          PUT like PATCH : update the resources 'like projects'.

 *          PATCH /projects/1 : update the existing resource. e.g. object '1' in 'projects'. The action func is 'update'

 *          DELETE /projects/1 : delete the existing resource. e.g. object '1' in 'projects'. The action func is 'destroy'
 *
 */

// Using controller (PagesController) and action method (index)
Route::get('/', 'PagesController@index');

// *********** Method 2: using dedicated controller ***********
//// These are the Projects resources that manipulate Project
//Route::get('/projects', 'ProjectsController@index');
//
//// the following rout used when user submit the form in /projects/create page
//Route::post('/projects', 'ProjectsController@store');
//
//Route::get('/projects/create', 'ProjectsController@create');
//
//// {} represents entered value by user
//Route::get('/projects/{project}', 'ProjectsController@show');
//
//// {} represents entered value by user
//Route::get('/projects/{project}/edit', 'ProjectsController@edit');
//
//// the following rout used when user submit the form in /projects/{id}/edit page
//Route::patch('/projects/{project}', 'ProjectsController@update');
//
//// {} represents entered value by user
//Route::delete('/projects/{project}', 'ProjectsController@destroy');

// You can shortcut the previous Routing Conventions
Route::resource('projects', 'ProjectsController');

// It is better to create a ProjectTaskController rather than using ProjectsController
//Route::patch('/tasks/{task}', 'ProjectsController@test');

// You need to specify project's id in hidden input in the form.
Route::post('/tasks', 'ProjectTasksController@store');
// My trying of previous one 'create a new task', It also very common and acceptable like previous one.
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

// It is clearer to called ProjectTasksController instead of TasksController
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

// -------------------------------
// When you doubt, create controller
Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

// -------------------------------

Route::resource('posts', 'PostsController');

