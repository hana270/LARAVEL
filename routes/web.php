<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebeController;

Route::get('/bebes', [BebeController::class, 'index'])->name('bebes.index');
Route::get('/bebes/create', [BebeController::class, 'create'])->name('bebes.create');
Route::post('/bebes', [BebeController::class, 'store'])->name('bebes.store');

Route::get('/bebes/destroy', [BebeController::class, 'destroyForm']);
Route::delete('/bebes/destroy/{bebe_id}', [BebeController::class, 'destroyById'])->name('bebes.destroyById');

Route::get('/bebes/{bebe}/edit', [BebeController::class, 'edit'])->name('bebes.edit');
Route::put('/bebes/{bebe}', [BebeController::class, 'update'])->name('bebes.update');


?>