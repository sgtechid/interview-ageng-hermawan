<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.user-management.index', compact('data'));
    }

    public function create()
    {
        return view('pages.user-management.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users',
                'role' => 'required|in:admin,user',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'Email already exists.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least :min characters.',
            ],
        );

        User::create($validatedData);
        return redirect()->back()->with('success', 'User has been added successfully.');
    }

    public function edit($id)
    {
        $userById = User::where('id', $id)->first();

        return view('pages.user-management.edit', compact('userById'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'User has been updated successfully.');
    }

    public function delete($id)
    {
        $get_id = $id;

        $check_id = User::where('id', $id)->first();

        if ($check_id) {
            $check_id->delete();
            return redirect()->back()->with('success', 'User has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User deleted failed');
        }
    }
}
