@extends('layouts.app')

@section('content')
    <h1>Projekti</h1>
    @if(count($projects)>0)
        @foreach($projects as $project)
            <div class="card card-tilte bg-light m-1 pt-2 pb-1">
                <div class="d-inline">
                    <div class="d-inline-flex col-2">
                        <a href="/projects/{{$project->id}}"><h5>{{$project->kods}}</h5></a>
                    </div>
                        <div class="d-inline-flex col-4">
                        <p>{{$project->title}}</p>
                    </div>
                    <div class="d-inline-flex col-3">
                        <p>Pasūtītājs: {{$project->body}}</p>
                    </div>
                    <div class="d-inline-flex col-2">  
                        <small>Projekta kods ievadīts: {{$project->created_at}}</small>
                    </div>
                </div>
            </div>
        
        @endforeach
        {{$projects->links()}}
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection