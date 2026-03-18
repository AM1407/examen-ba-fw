@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Course</h1>
    
    <form action="/courses" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active
                </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Course</button>
        <a href="/courses" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection