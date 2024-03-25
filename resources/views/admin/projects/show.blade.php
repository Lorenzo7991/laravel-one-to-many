@extends('layouts.main')

@section('title', 'Project Details')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">{{ __('Project Details') }}</h2>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Project') }}: {{ $project->title }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($project->thumb)
                                <img src="{{ $project->thumb }}" class="img-fluid mb-3" alt="Project Image" style="height: 100%;">
                            @endif
                        </div>

                        
                        <div class="col-md-8">
                            <p><strong>{{ __('Title') }}:</strong> {{ $project->title }}</p>
                            <p><strong>{{ __('Description') }}:</strong> {{ $project->description }}</p>
                            <p><strong>{{ __('Start Date') }}:</strong> {{ \Illuminate\Support\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>
                            <p><strong>{{ __('End Date') }}:</strong> {{ \Illuminate\Support\Carbon::parse($project->end_date)->format('d/m/Y') }}</p>
                            <p><strong>{{ __('Technologies') }}:</strong> {{ $project->technologies }}</p>
                            <p><strong>{{ __('Status') }}:</strong> {{ $project->status }}</p>
                            <p><strong>{{ __('Documentation') }}:</strong> <a href="{{ $project->documentation }}" target="_blank"> {{ __('View Documentation') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    @auth
                        <div id="left-footer">
                            <a href="{{ route('guest.home') }}" class="btn btn-primary me-2"><i class="fas fa-arrow-left me-2"></i>{{ __('Back to Home') }}</a>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary "><i class="fas fa-bars me-2"></i>{{ __('Back to Projects List') }}</a>
                        </div>
                        <div id="right-footer">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2"><i class="fas fa-edit me-2"></i>{{ __('Edit') }}</a>
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this project?')) { document.getElementById('delete-project-{{ $project->id }}').submit(); }">
                                <i class="fas fa-trash-can me-2"></i>{{ __('Delete') }}
                            </a>
                            <form id="delete-project-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @else
                        <a href="{{ route('guest.home') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>{{ __('Back to Home') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
