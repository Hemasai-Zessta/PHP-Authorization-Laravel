<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index')->middleware("can:isAdmin");

Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

// Route guard if u remove the controller guard then u can work with thi
//Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show')->middleware('can:view,post');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/posts/delete/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');

//------------create
//Route::post('/posts/create', [PostController::class, 'store']);
/*Route::get('/create', function() {
    return view('policy.createPost');                  //policy.createPost');
});                                       //[PostController::class, 'create']);
*/
Route::get('/posts/create/{id}', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');                  //policy.createPost');
Route::post('/posts/create/{id}', [App\Http\Controllers\PostController::class, 'store']);




