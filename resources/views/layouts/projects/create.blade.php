@extends('layouts.app')

@section('content')
    <h1>Projekta koda pievienošana</h1>
    {{ Form::open(['action' => 'ProjectsController@store', 'method' => 'post']) }}
        <div class="form-group">
            {{Form::label('kods', 'Projekta kods')}}
            {{Form::text('kods', '', ['class'=>'form-control', 'placeholder'=>'Piemērs: 1L19VA02'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Projekta nosaukums')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet projekta nosaukumu'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Projekta pasūtītājs')}}
            {{Form::text('body', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet projekta pasūtītāju'])}}
        </div>
        {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection