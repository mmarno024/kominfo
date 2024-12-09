<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCourse;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $usercourses = UserCourse::select(['id_user', 'id_course']);
            return DataTables::of($usercourses)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-detail" data-id="' . $row->id . '">Detail</button>
                            <a class="btn btn-warning text-white" href="' . route('usercourses.edit', $row->id) . '">Edit</a>
                            <form action="' . route('usercourses.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('master.usercourses.index');
    }

    public function create()
    {
        return view('master.usercourses.create');
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

        return redirect()->route('usercourses.index')->with('success', 'User Course created successfully.');
    }
    public function show(UserCourse $usercourse)
    {
        if (request()->ajax()) {
            return response()->json($usercourse);
        }
        return view('usercourses.show', compact('item'));
    }
    public function edit(UserCourse $usercourse)
    {
        return view('usercourses.edit', compact('item'));
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
        return redirect()->route('usercourses.index')->with('success', 'User Course deleted successfully.');
    }
}
