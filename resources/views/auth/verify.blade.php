@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Apskati savu e-pastu.') }}
                        </div>
                    @endif

                    {{ __('Pirms turpini, lūdzam apstakīt e-pastu.') }}
                    {{ __('Ja nesaņēmi e-pastu') }}, <a href="{{ route('verification.resend') }}">{{ __('spied šeit lai saņemtu vēl vienu.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
