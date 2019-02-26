<?php

namespace App\Http\Controllers;

use \App\Models\Project;

use App\Services\Twitter;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::all();

        // return $projects; returns JSON format
        return view('projects.index', ['projects' => $projects]);
    }

    public function store() {

        $validate = request()->validate([
            'title' => ['required', 'min:6'],
            'desc' => ['required', 'max:255'],
        ]);

            
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

        dd($twitter);

        return view('projects.show', ['project' => $project]);
    }

    public function edit(Project $project) {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project) {

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
        
        $project->delete();

        return redirect('/projects');
    }
}
