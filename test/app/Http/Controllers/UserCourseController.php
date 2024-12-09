<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $usercourse = UserCourse::select(['id', 'id_user', 'id_course']);
            $usercourse = UserCourse::with(['user', 'course']);
            return DataTables::of($usercourse)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-detail" data-id="' . $row->id . '">Detail</button>
                            <a class="btn btn-warning text-white" href="' . route('usercourse.edit', $row) . '">Edit</a>
                            <form action="' . route('usercourse.destroy', $row) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('usercourse.index');
    }

    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('usercourse.create', compact('users', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_course' => 'required',
        ]);

        $usercourse = new UserCourse();
        $usercourse->id_user = $request->id_user;
        $usercourse->id_course = $request->id_course;

        $usercourse->save();

        return redirect()->route('usercourse.index')->with('success', 'User Course created successfully.');
    }
    public function show(UserCourse $usercourse)
    {
        if (request()->ajax()) {
            return response()->json($usercourse);
        }
        return view('usercourse.show', compact('usercourse'));
    }
    public function edit(UserCourse $usercourse, $id)
    {
        $usercourse = UserCourse::findOrFail($id);
        $users = User::all();
        $courses = Course::all();

        return view('usercourse.edit', compact('usercourse', 'users', 'courses'));
    }

    public function update(Request $request, UserCourse $usercourse)
    {
        $request->validate([
            'id_user' => 'required',
            'id_course' => 'required',
        ]);

        $usercourse->save();
        return response()->json(['success' => 'User Course updated successfully.']);
    }

    public function destroy(UserCourse $usercourse)
    {
        $usercourse->delete();
        return redirect()->route('usercourse.index')->with('success', 'User Course deleted successfully.');
    }
}
