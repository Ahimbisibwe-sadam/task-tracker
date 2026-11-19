<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});
// Custom route to flip a task's completed status
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

// Standard resource routes for tasks
Route::resource('tasks', TaskController::class)->except(['show', 'create', 'edit']);