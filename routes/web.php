<?php

use App\Http\Controllers\TodosController;
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

Route::get('todos', function () {
    return view('todos.app');
});

//Route::get('todos/{todo}/view', [TodosController::class, 'show'])->name('todos.show');
//Route::get('todos/register', [TodosController::class, 'create'])->name('todos.create');
//Route::post('todos/save', [TodosController::class, 'store'])->name('todos.store');
//Route::get('todos/list', [TodosController::class, 'index'])->name('todos.index');
//Route::get('todos/{todo}/edit', [TodosController::class, 'edit'])->name('todos.edit');
//Route::put('todos/{todo}/update', [TodosController::class, 'update'])->name('todos.update');
//Route::delete('todos/{todo}/delete', [TodosController::class, 'destroy'])->name('todos.destroy');

Route::resource('todos', TodosController::class);
