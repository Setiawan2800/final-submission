<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookViewController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookViewController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookViewController::class, 'create'])->name('books.create');
Route::post('/books', [BookViewController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookViewController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [BookViewController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookViewController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookViewController::class, 'destroy'])->name('books.destroy');
