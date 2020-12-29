<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('posts', [PostController::class, 'index']);


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/tag', function (){

    $todos = Post::orderBy('id', 'desc')->get();

    foreach($todos as $item)
    {
        $tags = Tag::all()->random(random_int(1,3));
        foreach($tags as $tag)
        {
            $item->tags()->attach($tag);
        }
    }

});
