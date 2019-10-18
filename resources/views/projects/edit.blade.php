@extends('layout')

@section('title','edit')

@section('content')

    <h1 class="title"> Edit Project {{ $project->id }} </h1>

    <form action="/projects/{{ $project->id }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="title">Title</label>
        <div class="control">
            <input type="text" class="input" value="{{ $project->title }}" name="title">
        </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
        <div class="control">
            <textarea type="text" class="textarea" name="description"> {{ $project->description }} </textarea>
        </div>
        </div>

        <div class="control">
            <button type="submit" class="button is-link"> Update Project</button>
            <button type="submit" class="button is-text" name="_method" value="DELETE"> Delete Project </button>
        </div>

    </form>

@endsection