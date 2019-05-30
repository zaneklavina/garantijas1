@extends('layouts.app')

@section('content')
@if(count($projectContracts)>0)



@foreach($projectContracts as $projectContract)

    <div class="card card-tilte m-1 pt-2 pb-1">
        <div class="d-inline">
            <div class="d-inline-flex col-2 px-1">
               <h6>{{$projectContract->contracts_nr}}</h6>
            </div>
            <div class="d-inline-flex col-2 px-1">
                <h6>{{$projectContract->contract_type}}</h6>
            </div>
            <div class="d-inline-flex col-2 px-1">
                <h6>{{$projectContract->name}}</h6>
            </div>
            <div class="d-inline-flex col-2 px-1">
                <h6>Uzņēmums: {{$projectContract->company_name}}</h6>
            </div>
            <div class="d-inline-flex col-1 px-1">
               <h6>Summa: {{$projectContract->amount}}</h6>
            </div>
            <div class="d-inline-flex col-1 px-1">
                <small>Līguma datums: {{$projectContract->signed_at}}</small>
            </div>
            <div class="d-inline-flex col-1 px-1">
                <small>Sākuma datums: {{$projectContract->starts_at}}</small>
            </div>
            <div class="d-inline-flex col-1 px-1">
                <small>Beigu datums: {{$projectContract->ends_at}}</small>
            </div>
          
        </div>
    </div>
 
@endforeach
@else <h1>nav ierakstu</h1>
@endif
@endsection