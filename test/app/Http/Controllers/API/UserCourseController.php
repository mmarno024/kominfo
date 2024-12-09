<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usercourse = UserCourse::all();
        return response()->json($usercourse);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_course' => 'required',
        ]);

        $usercourse = UserCourse::create([
            'id_user' => $validatedData['id_user'],
            'id_course' => $validatedData['id_course'],
        ]);

        return response()->json($usercourse, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $usercourse = UserCourse::where('id_user', $request->id_user)->where('id_course', $request->id_course)->first();
        if (!$usercourse) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($usercourse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usercourse = UserCourse::where('id_user', $request->id_user)->where('id_course', $request->id_course)->first();
        if (!$usercourse) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_course' => 'required',
        ]);

        $usercourse->update(array_filter($validatedData));
        return response()->json($usercourse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $usercourse = UserCourse::where('id_user', $request->id_user)->where('id_course', $request->id_course)->first();
        if (!$usercourse) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $usercourse->delete();
        return response()->json(null, 204);
    }
}
