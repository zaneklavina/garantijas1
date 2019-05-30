@extends('layouts.app')
@section('content')
    <h1 class="d-inline-flex">Garantijas</h1>
    <a class="btn btn-secondary btn-lg d-inline-flex float-right" href="/guarantees/create" role="button">Pievienot garantiju</a> 
    @if(count($guarantees)>0)
        @foreach($guarantees as $guarantee)
            <div class="card card-tilte bg-light m-1 pt-2 pb-1">
                <div class="d-inline">
                    <div class="d-inline-flex col-2 px-1">
                        <a href="/guarantees/{{$guarantee->id}}"><h5>Garantijas numurs: {{$guarantee->number}}</h5></a>
                    </div>
                    <div class="d-inline-flex col-2">
                        <p>{{$guarantee->contracts_nr}}</p>
                    </div>
                    <div class="d-inline-flex col-2">
                        <p>{{$guarantee->type}}</p>
                    </div>
                    <div class="d-inline-flex col-2">
                        <p>Iestāde: {{$guarantee->b_aas_apraksts}}</p>
                    </div>
                    <div class="d-inline-flex col-1">
                         <p>Izsniedzējs: {{$guarantee->provider}}</p>
                    </div>
                    <div class="d-inline-flex col-1">
                         <p>Garantijas summa: {{$guarantee->amount}}</p>
                    </div>
                    <div class="d-inline-flex col-1">
                        <small>Sākas: {{$guarantee->starts}}</small>
                       </div>
                    <div class="d-inline-flex col-1">
                         <small>Beidzas: {{$guarantee->ends}}</small>
                    </div>
   
                </div>
            </div>
        
        @endforeach
        
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection