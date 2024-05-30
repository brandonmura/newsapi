<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/index', function () {
    return view('index');
});
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/search', [ArticleController::class, 'search'])->name('articles.search');
