<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // dd(123);
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = 1;
        $comment->post_id = $post->id;
        $comment->save();

        return response()->json([
            'content' => $comment->content,
            'user' => $comment->user->username,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }
}
