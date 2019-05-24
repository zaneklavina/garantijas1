@extends('layouts.app')

@section('content')
    <h1 class="d-inline-flex">Projekti</h1>
    <a class="btn btn-secondary btn-lg d-inline-flex float-right" href="/projects/create" role="button">Pievienot projektu</a> 
    @if(count($projects)>0)
        @foreach($projects as $project)
            <div class="card card-tilte bg-light m-1 pt-2 pb-1">
                <div class="d-inline">
                    <div class="d-inline-flex col-1 px-1">
                        <a href="/projects/{{$project->id}}"><h5>{{$project->kods}}</h5></a>
                    </div>
                        <div class="d-inline-flex col-3">
                        <p>{{$project->title}}</p>
                    </div>
                    <div class="d-inline-flex col-3">
                        <p>Pasūtītājs: {{$project->body}}</p>
                    </div>
                    <div class="d-inline-flex col-2">  
                        <small>Ievadīts: {{$project->created_at->format('F d, Y \a\t H:i:s') }}</small>
                    </div>
                    <div class="d-inline-flex col-2">  
                        <small>Labots: {{$project->updated_at->format('F d, Y \a\t H:i:s') }}</small>
                    </div>
                </div>
            </div>
        
        @endforeach
        {{$projects->links()}}
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection