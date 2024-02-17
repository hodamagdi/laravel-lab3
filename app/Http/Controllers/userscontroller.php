<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UsersController extends Controller 
{
    public function index()
    {
        $users = User::withCount('posts')->orderByDesc('posts_count')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function show($Id)
    {
        $user = User::findOrFail($Id);
        $posts = $user->posts()->with('user')->paginate(2);
        
        return view('users.show', compact('user', 'posts'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/users');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users');
    }
}
