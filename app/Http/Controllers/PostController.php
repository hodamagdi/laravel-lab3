<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::with('user')->paginate(2);
        return view('posts.index', compact('posts'));
    }

    public function show($postId)
    {
        $post = post::findOrFail($postId);
        return view('posts/show',[
            'post'=> $post
        ]);
    }

    public function create()
    {
        $users = User::all();
    return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        Post::create([
            'title'=> $request->title,
            'slug'=>$request->slug,
            'body'=>$request->body,
            'enabled' => $request->has('enabled') ? true : false,
            'user_id'=>$request->user_id,
        ]);

        return redirect(url('/posts'));
    }

    public function edit($postId)
    {
        $post = post::findOrFail($postId);
        return view('posts/edit',[
            'post'=> $post
        ]);
    }

    public function update($postId, Request $request)
    {
        post::findOrFail($postId)->update([
            'title'=> $request->title,
            'slug'=>$request->slug,
            'body'=>$request->body,
            'enabled' => $request->has('enabled') ? true : false,
            'user_id'=>$request->user_id,
        ]);
        return redirect(url('/posts'));
    }

    public function delete ($postId)
    {
        post::findOrFail($postId)->delete();
        return redirect(url('/posts'));

    }
}
