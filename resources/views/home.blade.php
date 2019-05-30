@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Izvēlne</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary btn-lg col-3 ml-4" href="/projects" role="button">Projekti</a>
                    <a class="btn btn-primary btn-lg col-3 offset-1" href="/contracts" role="button">Līgumi</a> 
                    <a class="btn btn-primary btn-lg col-3 offset-1" href="/guarantees" role="button">Garantijas</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
