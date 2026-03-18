@extends('layout')

@section('content')
<div class="container">
    <h1>Courses</h1>
    
    <h4>Active Courses ({{ $activeCourses->count() }})</h4>
    @if($activeCourses->isNotEmpty())
    <div class="row">
        @foreach($activeCourses as $course)
            @include('components.course-card', ['course' => $course])
        @endforeach
    </div>
    @else
    <p>No active courses.</p>
    @endif
    
    <h4>Inactive Courses ({{ $inactiveCourses->count() }})</h4>
    @if($inactiveCourses->isNotEmpty())
    <div class="row">
        @foreach($inactiveCourses as $course)
            @include('components.course-card', ['course' => $course])
        @endforeach
    </div>
    @else
    <p>No inactive courses.</p>
    @endif
    
    @if($activeCourses->isEmpty() && $inactiveCourses->isEmpty())
    <div class="alert alert-info">
        No courses available. <a href="/courses/create">Create a new course</a>.
    </div>
    @endif
</div>
@endsection