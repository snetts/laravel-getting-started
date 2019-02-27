@extends('layout')
@section('content')
    <header>
        <h1 class="title">Create Project</h1><br>
    </header>
    <section>
        @include('errors')
        <form method="POST" action="/projects">
            {{ csrf_field() }}
            <div class="control">
                <input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Project Title" value="{{ old('title') }}" required/>
            </div><br>
            <div class="control">
                <textarea name="desc" class="input {{ $errors->has('desc') ? 'is-danger' : '' }}" placeholder="Project Description" required>{{ old('desc') }}</textarea>
            </div><br>
            <div class="control">
                <button class="button is-link" type="submit" name="submit">Create Project</button>
            </div>
        </form>
    </section>
@endsection
