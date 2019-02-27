@extends('layout')
@section('content')
    <header>
        <h1 class="title">Projects</h1><br>
    </header>
    <section>
        @foreach ($projects as $project)
            <li><a href="/projects/{{ $project->id }}" title="{{ $project->title }}">{{ $project->title }}</a></li>
        @endforeach
        <br>
        <a href="/projects/create" class="btn btn-primary">Create Project</a>
        </section>
@endsection