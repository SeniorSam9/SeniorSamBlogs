<?php

use App\models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get("/post/{post}", function ($slug) {
    // find a post by its slug and pass it to the view as a var
    // slug is something that is used as an id or smth to differentiate an object
    try {
        $post = Post::find($slug);
        return view('post', [
            'post' => $post
        ]);
    } catch (Exception $e) {
        $e->getMessage();
        abort(404);
    }
})->where("post", "[a-zA-Z_\-]+");
