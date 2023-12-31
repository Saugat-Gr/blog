<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\TagController;
use App\Http\Controllers\ProfileController;
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
    return view('pages.recent');
});

Route::get('/dashboard', function () {
    return view('pages.index');
})->name('pages.index');



 Route::middleware('auth')->group(function(){
    
    Route::get('/posts',[PostController::class, 'index'])->name('blog.posts');
    Route::get('/categories',[CategoryController::class, 'index'])->name('blog.categories');
   Route::get('/tags', [TagController::class, 'index'])->name('blog.tags');

 } 
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::get('/recent', function(){
     return view('pages.recent');
 })->name('pages.recent');

  Route::get('/about', function(){
      return view('pages.about');    
})->name('pages.about');


 Route::get('/app', function(){
     return view('app');
 });

require __DIR__.'/auth.php';
