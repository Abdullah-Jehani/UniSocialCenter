<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function addComment(Request $request, Post $post, User $user)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'content' => $validated['content']
        ]);

        return redirect('/posts/' . $post->id);
    }
}
