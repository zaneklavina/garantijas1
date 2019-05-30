@extends('layouts.app')

@section('content')


    <a href="/contracts" class="btn btn-secondary">Atpakaļ</a>
    <a href="/contracts/{{$contract->id}}/edit" class="btn btn-secondary">Rediģēt</a>
    {!!Form::open(['action'=>['ContractsController@destroy', $contract->id], 'method'=>'post','class'=>'float-right'])!!}
        {{Form::hidden('_method', 'delete')}}
        {{Form::submit('Dzēst', ['class'=>'btn btn-danger'])}}
    {!!Form::close() !!}
    <br><br>
    <h1>{{$contract->contracts_nr}} </h1>
    <h2>{{$contract->name}} </h2>
    <h3>Paraksta datums: {{$contract->signed_at}}</h3>
    <h3>Uzņēmums: {{$contract->company_name}}</h3>
    <h3>Summa: {{$contract->amount}}</h3>
    <p>
       
        Ievadīts: {{$contract->created_at->format('F d, Y \a\t H:i:s') }}
        <br>
        Pēdējo reizi rediģēts: {{$contract->updated_at->format('F d, Y \a\t H:i:s') }}
    </p>
   
   
@endsection
