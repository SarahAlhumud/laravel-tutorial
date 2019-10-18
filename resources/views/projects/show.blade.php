
<!-- Show prpject's details -->

@extends('layout')

@section('title','about')

@section('content')

    <h1 class="title"> {{ $project->title }} </h1>
    <div class="content"> {{ $project->description }}

    <p>
        <a href="/projects/{{ $project->id }}/edit">Edit</a>
    </p>
    </div>

    @if ($project->tasks->count())
    <div class="content box">

        @foreach($project->tasks as $task)

            {{--<form method="POST" action="/tasks/{{$task->id}}">--}}
                {{--@method('PATCH')--}}
                {{--@csrf--}}

                {{--<input type="checkbox" name="completed" {{ $task->completed == 1 ? 'checked' : '' }} onChange="this.form.submit()">--}}
                {{--<input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onChange="this.form.submit()">--}}
                {{--<label for="completed" class={{ $task->completed ? 'is-completed' : '' }} >{{ $task->description }}</label>--}}

                {{--<br>--}}
            {{--</form>--}}

        {{--When you doubt--}}
            <form method="POST" action="/completed-tasks/{{$task->id}}">

                @if ($task->completed)
                    @method("DELETE")
                @endif

                @csrf
                {{--<input type="checkbox" name="completed" {{ $task->completed == 1 ? 'checked' : '' }} onChange="this.form.submit()">--}}
                <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} onChange="this.form.submit()">
                <label for="completed" class={{ $task->completed ? 'is-completed' : '' }} >{{ $task->description }}</label>

                <br>
            </form>

        @endforeach

    </div>
    @endif

    {{-- Add a new task form--}}
    <form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
        @csrf

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea type="text" class="textarea {{ $errors->has('description')? 'is-danger' : ''}}" name="description"
                          placeholder="Task description" required>{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="control">
            <button type="submit" class="button is-link"> Add Task</button>
        </div>
        <br>

        @include('errors')
    </form>


@endsection