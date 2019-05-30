@extends('layouts.app')
@section('content')
    <h1 class="d-inline-flex">Līgumi</h1>
    <a class="btn btn-secondary btn-lg d-inline-flex float-right" href="/contracts/create" role="button">Pievienot līgumu</a> 
    @if(count($contracts)>0)
        @foreach($contracts as $contract)
            <div class="card card-tilte bg-light m-1 pt-2 pb-1">
                <div class="d-inline">
                    <div class="d-inline-flex col-2 px-1">
                        <a href="/contracts/{{$contract->id}}"><h5>{{$contract->contracts_nr}}</h5></a>
                    </div>
                    <div class="d-inline-flex col-2">
                        <p>{{$contract->contract_type}}</p>
                    </div>
                    <div class="d-inline-flex col-3">
                        <p>{{$contract->name}}</p>
                    </div>
                    <div class="d-inline-flex col-2">
                        <p>{{$contract->company_name}}</p>
                    </div>
                    <div class="d-inline-flex col-2">
                         <p>{{$contract->amount}}</p>
                    </div>
                    <div class="d-inline-flex col-1">
                        <p>{{$contract->signed_at}}</p>
                    </div>

                </div>
            </div>
        
        @endforeach
        
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection