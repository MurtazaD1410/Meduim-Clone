<?php

namespace App\Http\Controllers;

use App\Models\Post;


class LikeController extends Controller
{
    public function like(Post $post)
    {
        $hasClapped = auth()->user()->hasLiked($post);
        if ($hasClapped) {
            $post->likes()->where(
                "user_id",
                auth()->id()
            )->delete();
        } else {
            $post->likes()->create([
                "user_id" => auth()->id(),
            ]);
        }

        return response()->json([
            'likesCount' => $post->likes()->count(),
        ]);
    }
}
