<?php

use App\Mail\PostCreatedMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/mail', function () {
    $user = User::find(2431);
    $post = Post::find(122);
    return new PostCreatedMail($user->name, $post->title);
});
