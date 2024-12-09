<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return response()->json($course);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course' => 'required|string|max:50',
            'mentor' => 'required|string|max:50',
            'title' => 'required|string|max:50',
        ]);

        $course = Course::create([
            'course' => $validatedData['course'],
            'mentor' => $validatedData['mentor'],
            'title' => $validatedData['title'],
        ]);

        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        if (!$course) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        if (!$course) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $validatedData = $request->validate([
            'course' => 'sometimes|required|string|max:50',
            'mentor' => 'sometimes|required|string|max:50',
            'title' => 'sometimes|required|string|max:50',
        ]);

        $course->update(array_filter($validatedData));
        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        if (!$course) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $course->delete();
        return response()->json(null, 204);
    }
}
