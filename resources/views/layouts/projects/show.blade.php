@extends('layouts.app')

@section('content')
    <a href="/projects" class="btn btn-secondary">Atpakaļ</a>
    <a href="/projects/{{$project->id}}/edit" class="btn btn-secondary">Rediģēt</a>
    {!!Form::open(['action'=>['ProjectsController@destroy', $project->id], 'method'=>'post','class'=>'float-right'])!!}
    
        {{Form::hidden('_method', 'delete')}}
        {{Form::submit('Dzēst', ['class'=>'btn btn-danger'])}}
    {!!Form::close() !!}
    <br><br>
    <h1>{{$project->kods}} - {{ $project->title }}</h1>
    <p>
        <b>Pasūtītājs: {{$project->body}};</b>
        <br>
        Ievadīts: {{$project->created_at->format('F d, Y \a\t H:i:s') }}
        <br>
        Pēdējo reizi rediģēts: {{$project->updated_at->format('F d, Y \a\t H:i:s') }}
    </p>
<a href="/projects/list/{{$project->id}}"><h2>Projekta līgumi<h2></a>
   
@endsection