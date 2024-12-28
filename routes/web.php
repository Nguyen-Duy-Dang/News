<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


    // Route::get('/', function () {
    //     return view('welcome');
    // });
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('new', NewController::class);
});

//valitdate//
//category
route::view('/category/add', 'admin/category/add');
route::post('/category/add',[CategoryController::class, 'category']);
//end valitdate//
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [CategoryController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';


//Category //
Route::get('/category', [CategoryController::class, 'index'])->middleware(['admin'])->name('category');
Route::view('/category/add', 'admin/category/add');
Route::post('/category/create', [CategoryController::class, 'create'])->middleware(['admin']);
Route::get('/category/edit/{madm}', [CategoryController::class, 'edit'])->middleware(['admin']);
Route::post('/category/update', [CategoryController::class, 'update'])->middleware(['admin']);
Route::get('/category/delete/{madm}', [CategoryController::class, 'delete'])->middleware(['admin']);
//EndCategory


// New//
Route::get('/new', [NewController::class, 'index'])->middleware(['admin'])->name('new');
Route::view('/demo', 'admin/demo');
Route::post('/new/create', [NewController::class, 'create'])->middleware(['admin']);
Route::get('/new/edit/{matt}', [NewController::class, 'edit'])->middleware(['admin'])->name('news.edit');
Route::post('/new/update', [NewController::class, 'update'])->middleware(['admin'])->name('news.update');
Route::get('/new/delete/{matt}', [NewController::class, 'delete']);
Route::get('/newct/{matt}', [NewController::class, 'show'])->name('newct.show');
// routes/web.php
 
Route::post('/comment/{matt}',[CommentController::class,'comment'])->name('comment');;
Route::get('/comment/{id}/delete/{delete}',[CommentController::class,'delete_comment'])->name('comment.delete')->middleware('auth');







Route::get('/user', [UserController::class, 'index'])->middleware(['admin'])->name('user');
Route::get('/user/delete/{id}', [UserController::class, 'dalete']);

// User//
Route::get('/', [UserController::class, 'home']);
Route::view('/about', 'user/about');
Route::view('/contact', 'user/contact');
// EndUser//
Route::get('/search', [NewController::class, 'search'])->name('search');


Route::get('/news/{newsId}/comments', [CommentController::class, 'show'])->name('comments.show');

// Route để lưu bình luận
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');



//EndNew//
// route::view('/new', 'new');
// route::post('/new',[newController::class, 'valit']);
