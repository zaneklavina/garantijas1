@extends('layouts.app')

@section('content')
    <a href="/projects" class="btn btn-secondary">Atpakaļ</a>
    <a href="/projects/{{$project->id}}/edit" class="btn btn-secondary">Rediģēt</a>
    <br><br>
    <h1>{{$project->kods}} - {{ $project->title }}</h1>
    <p>
        <b>Pasūtītājs: {{$project->body}};</b>
            <br>
        Projekts pievienots: {{$project->created_at->format('F d, Y \a\t H:i:s') }}
    </p>
    <h2>Projekta garantijas<h2>
@endsection