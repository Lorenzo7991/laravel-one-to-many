@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">{{ __('Projects') }}</h2>
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $project->thumb }}" class="card-img-top" alt="Project Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">{{ __('View Project') }} <i class="fas fa-arrow-right ms-2"></i></a>

                <p class="card-text"><strong>Status:</strong> {{ $project->status }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
