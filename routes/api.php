<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;




Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login'); 
    Route::post('authenticate', 'authenticate')->name('authenticate'); 
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('posts', 'index')->name('post.index'); 
        Route::post('post/store', 'store')->name('post.store'); 
        Route::post('post/update/{post}', 'update')->name('post.update'); 
        Route::get('post/{post}/comments', 'comments')->name('post.comments'); 
        Route::delete('post/delete/{post}', 'delete')->name('post.delete'); 
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('post/{post}/comment/store', 'store')->name('comment.store'); 
        Route::post('comment/update/{comment}', 'update')->name('comment.update'); 
        Route::delete('comment/delete/{comment}', 'delete')->name('comment.delete'); 
    });
    
});





