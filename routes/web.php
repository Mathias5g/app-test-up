<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user/create/store', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
