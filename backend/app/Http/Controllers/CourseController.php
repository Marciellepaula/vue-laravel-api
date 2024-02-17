<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    protected $course;
    public function __construct()
    {
        $this->course = new Course();
    }

    public function index()
    {
        $courses = Course::all();

        // Use toArray to include both attributes and original arrays
        $courses->each(function ($course) {
            $course->photo = $course->photo ? url("storage/{$course->photo}") : null;
        });

        return response()->json($courses->toArray());
    }



    public function store(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string'
            // Add other validation rules for other fields if needed
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photoPath = $request->file('photo')->store('course_photos', 'public');

            $course = Course::create([
                'name' => $request->name,
                'photo' => $photoPath,
                // Add other fields from the request as needed
            ]);

            return response()->json(['message' => 'Course created successfully', 'data' => $course], 201);
        }

        // Handle the case when no valid photo is uploaded
        return response()->json(['error' => 'No valid photo provided'], 400);
    }


    public function show(string $id)
    {
        $course = $this->course->find($id);
        $course->photo = $course->photo ? url("storage/{$course->photo}") : null;
        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }
        $course->toArray();
        return response()->json(['data' => $course], 200);
    }

    public function update(Request $request, string $id)
    {

        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->update($request->all());

        return response()->json(['message' => 'Course updated successfully', 'course' => $course]);
    }

    public function destroy(string $id)
    {
        $course = $this->course->find($id);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
