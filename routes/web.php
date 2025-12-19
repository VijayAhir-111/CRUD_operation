<?php

use App\Http\Controllers\CrudController;

Route::get('/students', [CrudController::class, 'index'])->name('students.index');
Route::get('/students/create', [CrudController::class, 'create'])->name('students.create');
Route::post('/students/store', [CrudController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}', [CrudController::class, 'edit'])->name('students.edit');
Route::put('/students/update/{id}', [CrudController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{id}', [CrudController::class, 'destroy'])->name('students.destroy');
