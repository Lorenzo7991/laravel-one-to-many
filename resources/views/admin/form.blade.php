<form action="{{ isset ($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" >
    @csrf
    @if(isset ($project))
        @method('PUT')
    @endif

   <div class="mb-3">
    <label for="type_id" class="form-label">Type</label>
    <select class="form-select" id="type_id" name="type_id">
        <option value="">Select Type</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ (isset ($project) && $project->type_id == $type->id) || old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->label }}</option>
        @endforeach
    </select>
</div>


    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ isset ($project) ? $project->title : old('title') }}">
    </div>

    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4">{{ isset ($project) ? $project->description : old('description') }}</textarea>
    </div>

    @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ isset ($project) ? $project->start_date : old('start_date') }}">
    </div>

    @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ isset ($project) ? $project->end_date : old('end_date') }}">
    </div>

    @error('technologies_used')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="technologies_used" class="form-label">Technologies Used</label>
        <input type="text" class="form-control" id="technologies_used" name="technologies_used" value="{{ isset ($project) ? $project->technologies_used : old('technologies_used') }}">
    </div>

    @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value=""></option>
            <option value="suspended" {{ (isset ($project) && $project->status === 'suspended') || old('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
            <option value="progress" {{ (isset ($project) && $project->status === 'progress') || old('status') === 'progress' ? 'selected' : '' }}>Progress</option>
            <option value="completed" {{ (isset ($project) && $project->status === 'completed') || old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

 <!--    @error('thumb')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="mb-3">
    <label for="thumb" class="form-label">Thumbnail:</label>
    @if(isset ($project) && $project->thumb)
        <img src="{{ asset($project->thumb) }}" alt="Thumbnail" class="m-2" style="max-width: 100px;">
    @endif
    <input type="file" class="form-control" id="thumb" name="thumb">
</div>
 -->
    @error('documentation')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="documentation" class="form-label">Documentation URL</label>
        <input type="text" class="form-control" id="documentation" name="documentation" value="{{ isset($project) ? $project->documentation : old('documentation') }}">
    </div>
<hr>
    <div id="form-footer" class=" d-flex align-items-center justify-content-between">

        <button type="submit" class="btn btn-success"><i class="fas fa-plus me-2"></i>{{ isset($project) ? 'Update Project' : 'Create Project' }}</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary "><i class="fas fa-bars me-2"></i>{{ __('Back to Projects List') }}</a>

    </div>

</form>
