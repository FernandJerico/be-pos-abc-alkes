<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        return view('manage-users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manage-users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        
        return redirect()->route('manage-users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('manage-users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('manage-users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $manage_user)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email,'.$manage_user->id,
            'password' => 'nullable|min:6|max:255',
        ];
    
        $validatedData = $request->validate($rules);
    
        // Hash the password if it's included in the request
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // If password is not provided, remove it from the validated data
            unset($validatedData['password']);
        }
    
        // Update user's information
        $manage_user->update($validatedData);
    
        return redirect()->route('manage-users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manage_user)
    {
        User::destroy($manage_user->id);

        return redirect()->route('manage-users.index')->with('success', 'User deleted successfully');
    }
}