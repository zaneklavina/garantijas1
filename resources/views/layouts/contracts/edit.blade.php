@extends('layouts.app')

@section('content')
    <h1>Projekta līguma rediģēšana</h1>
    {{ Form::open(['action' => ['ContractsController@update',$contract->id], 'method' => 'put']) }}
        <div class="form-group">
            {{Form::label('project_id', 'Projekta kods (jāatzīmē atkārtoti)')}}
            {!! Form::select('project_id', $projects, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('contracts_nr', 'Līguma numurs')}}
            {{Form::text('contracts_nr', $contract->contracts_nr, ['class'=>'form-control', 'placeholder'=>'Ievadiet līguma numuru'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Līguma tips (jāatzīmē atkārtoti)')}}
            {!! Form::select('type', $types, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('company_name', 'Uzņēmuma nosaukums')}}
            {{Form::text('company_name', $contract->company_name, ['class'=>'form-control', 'placeholder'=>'Ievadiet uzņēmuma nosaukumu'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Līguma nosaukums')}}
            {{Form::text('name', $contract->name, ['class'=>'form-control', 'placeholder'=>'Ievadiet līguma numuru'])}}
        </div>
        <div class="form-group">
            {{Form::label('signed_at', 'Līguma datums')}}
            {{Form::date('signed_at', $contract->signed_at, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('starts_at', 'Darbu sākuma datums')}}
            {{Form::date('starts_at', $contract->starts_at, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('ends_at', 'Darbu beigu datums')}}
            {{Form::date('ends_at', $contract->ends_at, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('amount', 'Līguma summa bez PVN')}}
            {{Form::number('amount', $contract->amount, ['class'=>'form-control', 'step'=>'any'])}}
        </div>
        {{Form::submit('Saglabāt', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection