<?php

namespace App\Http\Controllers;

use \App\Models\Project;

use App\Services\Twitter;
use App\Mail\ProjectCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        // auth()->id(); // fetches current user id
        // auth()->user(); // fetches current user
        // auth()->check(); // check whether user is logged in returns true or false
        // auth()->guest(); // checks whether user is guest

        // getting only current users projects
        $projects = auth()->user()->projects;
        // $projects = Project::where('owner_id', auth()->id())->get();

        // return $projects; returns JSON format
        return view('projects.index', ['projects' => $projects]);
    }

    public function store() {

        $validate = request()->validate([
            'title' => ['required', 'min:6'],
            'desc' => ['required', 'max:500'],
        ]);
        
        $validate['owner_id'] = auth()->id();
            
        Project::create($validate);
        // this code cleans up the code below
        // Project::create([
        //     'title' => request('title'),
        //     'desc' => request('desc')
        // ]);

        // return request()->all();
        // $project = new Project();

        // $project->title = request('title');
        // $project->desc = request('desc');

        // $project->save();
        return redirect('/projects');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project, Twitter $twitter) {
        //$project = Project::findOrFail();

        // return $project; returning projects as a JSON

        $this->authorize('valid', $project);

        return view('projects.show', ['project' => $project]);
    }

    public function edit(Project $project) {

        $this->authorize('valid', $project);

        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project) {

        $this->authorize('valid', $project);


        request()->validate([
            'title' => ['required', 'min:3'],
            'desc' => ['required', 'min:3']
        ]);

        $project->update(request(['title', 'desc']));

        // $project->title = request()->title;
        // $project->desc = request()->desc;
        
        // $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project) {

        $this->authorize('valid', $project);
        
        $project->delete();

        return redirect('/projects');
    }
}
