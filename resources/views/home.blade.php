@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to BTCertiCentre!
                </div>
                <div class="links"> 
                <a href="{{ url('/home') }}">Demo Test</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
