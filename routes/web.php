<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//view is something the user sees
//resources/views/welcome.blade.php
//do not need .blade.php
// Route::get('/', function () {
//     return view('welcome');
//     //return "hello world";//
//     // return ["foo" => "bar"];
// });

Route::get('/', function () {
    return view('posts');
});

//setting the route to retrieve based on the slug
Route::get('/post/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if(! file_exists($path)) {
        //ddd("this will throw the debug screen")
        //abort(404); this will load a not found screen
        return redirect("/");
    };

    //cacheing for one hour 
    $post = cache() -> remember("posts.{$slug}", 3600, function () use($path) {
        //var_dump('file_get_contents'); this will dump to the top of the page
        return file_get_contents($path);
    });
    
    return view('post', [
        'post' => $post
    ]);
}) -> where('post', '[a-z_\-]+');