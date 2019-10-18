@extends('layout')

@section('title','about')

@section('content')

    <h2 class="title"> Projects</h2>
    <ul>
    @foreach($projects as $project)
        <!-- Each column in project table represents as property of Eloquent model 'Project' -->
        <li>
            <h3 class="subtitle"> <a href="/projects/{{ $project->id }}"> {{ $project->title }}: </a></h3>
            <p> {{ $project->description }}.</p>
            <br>
        </li>
    @endforeach
    </ul>

    <br>
    <a href="/projects/create">Create a New Project</a>
@endsection