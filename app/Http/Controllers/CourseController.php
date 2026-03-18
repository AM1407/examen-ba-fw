<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $activeCourses = Course::where('is_active', true)->orderBy('title')->get();
        $inactiveCourses = Course::where('is_active', false)->orderBy('title')->get();
        return view('index', [
            'activeCourses' => $activeCourses,
            'inactiveCourses' => $inactiveCourses
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->is_active = $request->has('is_active');
        $course->save();
        
        return redirect('/courses')->with('success', 'Course created!');
    }

    public function toggle($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->is_active = !$course->is_active;
            $course->save();
        }
        
        return redirect('/courses')->with('success', 'Course updated!');
    }
}
