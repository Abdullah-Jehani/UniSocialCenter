<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class postController extends Controller
{
    public function index()
    {
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('main', compact('posts'));
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
            ['content' => $request->content],
        );
        return redirect('/');
    }
    public function show($id)
    {
        $post = post::find($id);
        return view('show', compact('post',));
    }
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect('/');
    }
}
