<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function toggleLike(post $post, User $user)
    {
        if (!Like::where('post_id', $post->id)->where('user_id', $user->id)->exists()) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]);
        } else {
            Like::where('post_id', $post->id)
                ->where('user_id', $user->id)
                ->delete();
        }

        return redirect('/');
    }
}
