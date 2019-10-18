@extends('layout')

@section('title','about')

@section('content')

    <h2 class="title">Create a new project</h2>
    <!-- after user submit form, it will post not get into /projects, so you have to specify post request for /projects  -->
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('title')? 'is-danger' : ''}}" name="title" placeholder="Project title"
                value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea type="text" class="textarea {{ $errors->has('description')? 'is-danger' : ''}}" name="description"
                          placeholder="Project description" required>{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="control">
            <button type="submit" class="button is-link"> Create Project</button>
        </div>

       @include('errors')

    </form>

@endsection