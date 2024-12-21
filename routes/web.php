<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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

Route::get('/tes', function () {
    return view('tes15');
});

// auth bre
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/login', [AuthController::class, 'login'])->name('do.login');
    Route::post('/register', [AuthController::class, 'register'])->name('do.register');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index.dashboard');
    Route::get('/detail-buku/{id}', [AdminController::class, 'showBookDetailed'])->name('show-book-detailed');
    Route::get('/dashboard/{id}/edit', [AdminController::class, 'editBook'])->name('book.edit');
    Route::put('/dashboard/{id}', [AdminController::class, 'updateBook'])->name('book.update');
    Route::get('/history', [AdminController::class, 'history'])->name('history');
    Route::delete('/history/{id}', [AdminController::class, 'deleteHistory'])->name('delete.history');
    Route::get('/management-book', [AdminController::class, 'bookManagement'])->name('book.management');
    Route::get('/tambah-buku', [AdminController::class, 'createBook'])->name('create.book');
    Route::get('/peminjaman', [AdminController::class, 'loanBook'])->name('book.loan');
    Route::get('/tambah-peminjaman', [AdminController::class, 'createLoanBook'])->name('create.loan');
    Route::post('/tambah-peminjaman', [AdminController::class, 'addLoanBook'])->name('add.loan');
    Route::get('/peminjaman/{id}/edit', [AdminController::class, 'editLoanBook'])->name('loan.edit');
    Route::put('/peminjaman/{id}', [AdminController::class, 'updateLoanBook'])->name('loan.update');
    Route::patch('/peminjaman/{id}/return', [AdminController::class, 'confirmReturn'])->name('loan.return');
    Route::post('/tambah-buku', [AdminController::class, 'addBook']);
    Route::delete('/dashboard/{id}', [AdminController::class, 'deleteBook'])->name('book.delete');
});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/home', [BookController::class, 'index'])->name('home');
});

Route::post('logout', [AuthController::class, 'logout'])->name('do.logout')->middleware('auth');

