@extends('layouts.app')

@section('content')
    <h1>Projekta līguma pievienošana</h1>
    {{ Form::open(['action' => 'ContractsController@store', 'method' => 'post']) }}
        <div class="form-group">
            {{Form::label('project_id', 'Projekta kods')}}
            {!! Form::select('project_id', $projects, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('contracts_nr', 'Līguma numurs')}}
            {{Form::text('contracts_nr', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet līguma numuru'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Līguma tips')}}
            {!! Form::select('type', $types, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('company_name', 'Uzņēmuma nosaukums')}}
            {{Form::text('company_name', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet uzņēmuma nosaukumu'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Līguma nosaukums')}}
            {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet līguma numuru'])}}
        </div>
        <div class="form-group">
            {{Form::label('signed_at', 'Līguma datums')}}
            {{Form::date('signed_at', '', ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('starts_at', 'Darbu sākuma datums')}}
            {{Form::date('starts_at', '', ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('ends_at', 'Darbu beigu datums')}}
            {{Form::date('ends_at', '', ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('amount', 'Līguma summa bez PVN')}}
            {{Form::number('amount', '', ['class'=>'form-control', 'step'=>'any'])}}
        </div>
        {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection