<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{
    public function index()
    {
        $posts = post::with('user', 'likes', 'comments')->orderBy('created_at', 'desc')->get();
        $commentuser = Comment::with('commentuser')->get();
        return view('main', compact(['posts']));
    }
    public function create()
    {
    }
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => ['min:3 , required', 'max:255']
        ]);
        $post->update([
            'content' => $request->content,
            'created_at' => now()
        ]);

        return redirect('/');
    }
    public function edit(post $post)
    {

        return view('edit', compact('post'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => ['min:3 , required', 'max:255']
        ]);
        post::create(
            [
                'content' => $request->content,
                'user_id' => auth()->user()->id

            ],
        );
        return redirect('/');
    }
    public function show($id)
    {
        $post = Post::with('user', 'likes', 'comments')->find($id);
        $commentuser = Comment::with('commentuser')->get();
        return view('show', compact(['post', 'commentuser']));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('success', 'Post deleted successfully.');
    }
}
