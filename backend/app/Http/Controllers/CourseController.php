<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $course;
    public function __construct()
    {
        $this->course = new Course();
    }
    public function index()
    {
        return $this->course->all();
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

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        return response()->json(['data' => $course], 200);
    }

    public function update(Request $request, string $id)
    {
        $course = $this->course->find($id);
        $course->update($request->all());
        return $course;
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
