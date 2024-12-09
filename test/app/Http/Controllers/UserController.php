<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'username', 'email', 'password', 'role']);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-detail" data-id="' . $row->id . '">Detail</button>
                            <a class="btn btn-warning text-white" href="' . route('users.edit', $row->id) . '">Edit</a>
                            <form action="' . route('users.destroy', $row->id) . '" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>';
                })
                ->make(true);
        }

        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        if (request()->ajax()) {
            return response()->json($user);
        }
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|min:6|confirmed',
            'role' => 'required',
        ]);

        $data = $request->only('username', 'email', 'role');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
