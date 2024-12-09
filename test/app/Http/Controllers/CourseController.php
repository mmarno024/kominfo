<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::select(['id', 'course', 'mentor', 'title']);
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-detail" data-id="' . $row->id . '">Detail</button>
                            <a class="btn btn-warning text-white" href="' . route('courses.edit', $row->id) . '">Edit</a>
                            <form action="' . route('courses.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('courses.index');
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|string|max:50',
            'mentor' => 'required|string|max:50',
            'title' => 'required|string|max:50',
        ]);

        $course = new Course();
        $course->course = $request->course;
        $course->mentor = $request->mentor;
        $course->title = $request->title;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    public function show(Course $course)
    {
        if (request()->ajax()) {
            return response()->json($course);
        }
        return view('courses.show', compact('course'));
    }
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course' => 'required',
            'mentor' => 'required',
            'title' => 'required',
        ]);

        $course->save();
        return response()->json(['success' => 'Course updated successfully.']);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
