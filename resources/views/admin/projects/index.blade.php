@extends('layouts.main')

@section('title', 'Projects Tab')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">{{ __('Projects') }}</h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    {{ __('Projects List') }}
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success"><i class="fas fa-plus me-2"></i>{{ __('Add new Project') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Technologies</th>
                                    <th>Status</th>
                                    <th>Type</th> <!-- Nuova colonna per il tipo -->
                                    <th>Preview</th>
                                    <th>Documentation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ Str::limit($project->slug, 20, '...') }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($project->end_date)->format('d/m/Y') }}</td>
                                    <td>{{ $project->technologies_used }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>
                                        @if ($project->type)
                                            {{ $project->type->label }}
                                        @else
                                            No type assigned
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ $project->thumb }}" alt="Preview" class="img-thumbnail" style="max-width: 100px;">
                                    </td>
                                    <td>
                                        <a href="{{ $project->documentation }}" target="_blank">{{ __('Documentation') }}</a>
                                    </td>
                                    <td>
                                        <div id="icons-container" class="d-flex flex-column align-items-center">
                                            <a href="{{ route('admin.projects.show', $project) }}" title="View"><i class="fas fa-eye text-primary mb-2"></i></a>
                                            <a href="{{ route('admin.projects.edit', $project) }}" title="Edit"><i class="fas fa-pencil-alt text-warning mb-2"></i></a>
                                            <a href="{{ route('admin.projects.destroy', $project) }}" title="Delete" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this project?')) { document.getElementById('delete-project-{{ $project->id }}').submit(); }"><i class="fas fa-trash-can text-danger"></i></a>
                                            <form id="delete-project-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
