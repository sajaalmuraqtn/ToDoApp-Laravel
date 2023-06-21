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
Route::get('todos/index', [App\Http\Controllers\todocontrollers::class, 'index'])->name('todos.index');
Route::get('todos/edit/{id}', [App\Http\Controllers\todocontrollers::class, 'edit'])->name('todos.edit');
Route::get('todos/create', [App\Http\Controllers\todocontrollers::class, 'create'])->name('todos.create');
Route::post('todos/store', [App\Http\Controllers\todocontrollers::class, 'store'])->name('todos.store');
Route::get('todos/delete/{id}', [App\Http\Controllers\todocontrollers::class, 'delete'])->name('todos.delete');
Route::post('todos/update/{id}', [App\Http\Controllers\todocontrollers::class, 'update'])->name('todos.update');
