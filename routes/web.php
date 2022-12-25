<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/book', [BookController::class, 'index'])->name('book');
Route::get('/book/{id}', [BookController::class, 'show'])->name('bookshow');
Route::get('/createBook', [BookController::class, 'create'])->name('createbook');
Route::post('/storeBook', [BookController::class, 'store'])->name('bookstore');
Route::post('/updateBook/{id}', [BookController::class, 'update'])->name('bookupdate');
Route::get('/deleteBook/{id}', [BookController::class, 'delete'])->name('bookdelete');
Route::get('/editBook/{id}', [BookController::class, 'edit'])->name('editbook');


Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('categoryshow');
Route::get('/createcategory', [CategoryController::class, 'create'])->name('createcategory');
Route::post('/storecategory', [CategoryController::class, 'store'])->name('categorystore');
Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('categoryupdate');
Route::get('/deletecategory/{id}', [CategoryController::class, 'delete'])->name('categorydelete');
Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');

Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/author/{id}', [AuthorController::class, 'show'])->name('authorshow');
Route::get('/createauthor', [AuthorController::class, 'create'])->name('createauthor');
Route::post('/storeauthor', [AuthorController::class, 'store'])->name('authorstore');
Route::post('/updateauthor/{id}', [AuthorController::class, 'update'])->name('authorupdate');
Route::get('/deleteauthor/{id}', [AuthorController::class, 'delete'])->name('authordelete');
Route::get('/editauthor/{id}', [AuthorController::class, 'edit'])->name('editauthor');
