@extends('layouts.app')

@section('content')
    <h1>Projekti</h1>
    @if(count($projects)>0)
        @foreach($projects as $project)
            <div class="card-subtilte bg-light m-1 py-2">
                <div class="col">
                    <div class="d-inline-block col-2">
                        <a href="/projects/{{$project->id}}"><h5>{{$project->kods}}</h5></a>
                    </div>
                    <div class="d-inline-block col-4">
                        <p>{{$project->title}}</p>
                    </div>
                    <div class="d-inline-block col-3">
                        <p>Pasūtītājs: {{$project->body}}</p>
                    </div>
                    <div class="d-inline-block col-2">  
                        <small>Projekta kods ievadīts: {{$project->created_at}}</small>
                    </div>
                </div>
            </div>
        
        @endforeach
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection