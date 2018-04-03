@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span style=" font-size:14pt; padding-left: 5px; color: #1c7430">{{Auth::user()->name}}</span><span>خوش آمدید</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
