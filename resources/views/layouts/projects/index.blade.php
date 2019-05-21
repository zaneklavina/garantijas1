@extends('layouts.app')

@section('content')
    <h1>Projekti</h1>
    @if(count($projects)>0)
        @foreach($projects as $project)
            <div class="card card-body bg-light">
                <h3><a href="/projects/{{$project->id}}">{{$project->kods}}</a></h3>
                <small>Projekta kods ievadīts: {{$project->created_at}}</small>
            </div>
            <br>
        @endforeach
    @else 
        <p>Nav atrasti ieraksti</p>
    @endif
@endsection