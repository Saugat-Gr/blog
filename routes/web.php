<?php

use App\Http\Controllers\Blog\PostController as BlogPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Blog\CateogoryController as BlogCategoryController;
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


Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');


Route::group(['middleware'=>'auth','prefix' =>'blog', 'as' => 'blog.'], function(){
     Route::resource('posts', BlogPostController::class);
     Route::resource('categories', BlogCategoryController::class);
});

Route::get('/about', function(){
    return view('pages.about');    
})->name('pages.about');

Route::get('/dashboard', [PostController::class, 'index']);
;



require __DIR__.'/auth.php';
