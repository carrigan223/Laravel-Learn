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

Route::get('/post', function () {
    return view('post', [
        'post' => '<h1>Hello World</h1>' // $post
    ]);
});

