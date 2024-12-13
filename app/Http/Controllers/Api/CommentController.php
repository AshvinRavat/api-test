<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);
        $comment = $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $validated['content'],
        ]);
        
        return response()->json([
            'message' => 'comment added successfully'
        ], 201);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $comment->update([
            'content' => $validated['content'],
        ]);
        return response()->json([
            'message' => 'comment updated successfully'
        ], 201);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'message' => 'comment deleted successfully'
        ], 204);
    }
}
