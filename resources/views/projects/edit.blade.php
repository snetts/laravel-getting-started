@extends('layout')

@section('content')
    <h1>Edit Project</h1>
    <div class="">
        @if ($errors->any())
            <div class="notification is-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>   
                @endforeach
            </div>
        @endif
        <form action="/projects/{{ $project->id }}" method="post" class="needs-validation" novalidate>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Enter project title" value="{{ $project->title }}" required/>

            </div>
            <div class="control">
                <textarea type="text" class="input" name="desc" placeholder="Enter project description" required>{{ $project->desc }}</textarea>
            </div>
            <button type="submit" class="button is-link">Update Project</button>
        </form>
        </div>
        <div class="">
        <form action="/projects/{{ $project->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Delete Project</button>
        </form>
    </div>
@endsection