@extends('layout')

@section('content')
    <header>
        <h1 class="title">{{ $project->title }}</h1>
    </header>

    <section>
        <div>
            <div class="paragraph">{{ $project->desc }}</div>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
            <br><br>
            @if ($project->tasks->count())
                <div class="box">
                    @foreach ($project->tasks as $task)
                        <div>
                            <form action="/tasks/completed/{{ $task->id }}" method="post">
                                @if ($task->completed)
                                    @method('DELETE')
                                @endif
                                @csrf
                                <label class="checkbox {{ $task->completed ? 'is-complete' : ''}}" for="completed">
                                    <input type="checkbox" name="completed" id="completed" class="checkbox " onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                                    {{ $task->desc }}
                                </label>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
            <br>
            <form action="/projects/{{ $project->id }}/tasks" method="post" class="box">
                @csrf
                <div class="control">
                    <label class="text" for="desc">
                        <input type="text" name="desc" id="desc" placeholder="Enter task..." required>
                    </label>
                </div>
                <br>
                <div class="control">
                    <button class="button is-link">Add Task</button>
                </div><br>
                @include('errors')
            </form>

        </div>
    </section>
@endsection