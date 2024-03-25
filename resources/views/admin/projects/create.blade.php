@extends('layouts.main')

@section('title', 'New Project')

@section('content')
    <div class="container">
        <div class="card bg-dark text-light">
            <div class="card-header">
                <h1 class="card-title">Create New Project</h1>
            </div>
            <div class="card-body ">
                @include('admin.form')
            </div>
        </div>
    </div>
@endsection
