@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>Published on:
        {$project->created_at->format('F d, Y \a\t H:i:s') }
    </p>
@endsection