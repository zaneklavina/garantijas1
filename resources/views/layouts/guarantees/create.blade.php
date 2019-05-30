@extends('layouts.app')

@section('content')
    <h1>Garantijas pievienošana</h1>
    {{ Form::open(['action' => 'GuaranteesController@store', 'method' => 'post']) }}
        <div class="form-group">
            {{Form::label('project_id', 'Projekta kods')}}
            {!! Form::select('project_id', $projects, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('contract_id', 'Līguma numurs')}}
            {!!Form::select('contract_id', $contracts, null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {{Form::label('type_id', 'Garantijas tips')}}
            {!! Form::select('type_id', $type, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('firm_id', 'Izsniedzējs')}}
            {!!Form::select('firm_id', $providers, null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {{Form::label('b_aas_id', 'Iestāde')}}
            {!!Form::select('b_aas_id', $details, null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {{Form::label('number', 'Garantijas numurs')}}
            {{Form::text('number', '', ['class'=>'form-control', 'placeholder'=>'Ievadiet garantijas numuru'])}}
        </div>
        <div class="form-group">
            {{Form::label('starts', 'Garantija spēkā no: ')}}
            {{Form::date('starts', '', ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('ends', 'Garantija spēkā līdz: ')}}
            {{Form::date('ends', '', ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('amount', 'Līguma summa bez PVN')}}
            {{Form::number('amount', '', ['class'=>'form-control', 'step'=>'any'])}}
        </div>
        <div class="form-group">
                {{Form::label('premija', 'Prēmija')}}
                {{Form::number('premija', '', ['class'=>'form-control', 'step'=>'any'])}}
            </div>
        {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}}
    {{ Form::close() }}
@endsection