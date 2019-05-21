@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>
        <b>Pasūtītājs: {{$project->body}};</b>
            <br>
        Projekts pievienots: {{$project->created_at->format('F d, Y \a\t H:i:s') }}
    </p>
    <h2>Projekta garantijas<h2>
@endsection