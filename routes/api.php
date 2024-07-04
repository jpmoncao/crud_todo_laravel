<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::get('users/{id}/todos', [UserController::class, 'todos']);

Route::resource('todos', TodoController::class);
Route::get('todos/{id}/user', [TodoController::class, 'user']);

