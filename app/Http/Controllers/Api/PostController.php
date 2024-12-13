<?php

namespace App\Http\Controllers\Api;

use App\Events\PostCreated;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user')->paginate(10);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = $request->user()->posts()->create($validated);
        $user = $request->user();
        
        PostCreated::dispatch($user, $post);

        return response()->json([
            'message' => 'post created successfully', 
            'post' => $post],
         200);
        }
        
        catch(Exception $error)
        {
            logger($error);
        }
    }

    public function comments(Post $post)
    {
        $postAndComments = $post->with('comments')->get();

        return response()->json([
            'post_with_comments' => $postAndComments],
         200);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return response()->json([
            'message' => 'post updated successfully',
        ],
         200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'post deleted successfully',
        ], 204);
    }

}
