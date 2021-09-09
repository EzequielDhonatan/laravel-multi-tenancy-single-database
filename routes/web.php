<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\{

    Blog\Post\PostController

}; //

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix'        => 'panel',
        'middleware'    => 'auth:sanctum',
        'verified'
    ],

    function () {

    /* BLOG
    ================================================== */
    Route::resource( 'blog/post', PostController::class ); ## POST
    Route::any( 'blog/post-search', [ PostController::class, 'search' ] )->name( 'post.search' ); ## POST SEARCH

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
