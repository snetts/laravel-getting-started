<?php

use App\Http\Controllers\ProjectsController;

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
/* 
    GET /projects (index) get all projects
    GET /projects/create (create)  create a project
    GET /projects/1 (show) show a single project
    POST /projects (store) persist or store a new project, called when storing a new project
    PUT
    GET /projects/1/edit (edit) edit a project
    PATCH /projects/1 (update) update a project
    DELETE /projects/1 (destroy) delete a project
 */

Route::get('/', function () {
    return view('welcome');
});


/* Is the equivalent of all below. */
Route::resource('projects', 'ProjectsController');

Route::patch('/tasks/{tasks}', 'TasksController@update');  // must correspond to the name of the model in this case Tasks.php

Route::post('/projects/{project}/tasks', 'TasksController@store');

// Route::get('/projects', 'ProjectsController@index');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::patch('/projects/{project}/update', 'ProjectsController@update');

// Route::delete('/projects/{project}/delete', 'ProjectsController@destroy');