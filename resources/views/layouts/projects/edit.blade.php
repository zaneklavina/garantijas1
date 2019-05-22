@extends('layouts.app')

@section('content')
    <h1>Projekta rediģēšana</h1>
    {{ Form::open(['action' => ['ProjectsController@update', $project->id], 'method' => 'put']) }}
        <div class="form-group">
            {{Form::label('kods', 'Projekta kods')}}
            {{Form::text('kods', $project->kods, ['class'=>'form-control', 'placeholder'=>'Piemērs: 1L19VA02'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Projekta nosaukums')}}
            {{Form::text('title', $project->title, ['class'=>'form-control', 'placeholder'=>'Ievadiet projekta nosaukumu'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Projekta pasūtītājs')}}
            {{Form::text('body', $project->body, ['class'=>'form-control', 'placeholder'=>'Ievadiet projekta pasūtītāju'])}}
        </div>
        {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection