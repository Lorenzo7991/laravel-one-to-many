@extends('layouts.main')

@section('title', 'Admin Home')


@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Admin Home') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
            <div class="card-header">{{ __('Welcome') }} {{ Auth::user()->name }}</div>


                <div class="card-body d-flex align-items-center justify-content-between">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are successfully logged in!') }}

                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">{{ __('Continue') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
