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
        return $this->course->create($request->all());
    }

    public function show(string $id)
    {
        $course = $this->course->find($id);
        return $course;
    }

    public function update(Request $request, string $id)
    {
        $course = $this->course->find($id);
        $course->update($request->all());
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = $this->course->find($id);
        return $course->delete();
    }
}
