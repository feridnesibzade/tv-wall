<?php

use App\Http\Controllers\StaticController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticController::class, 'index'])->name('index');
Route::get('/about', [StaticController::class, 'about'])->name('about');
// Route::get('/services', [StaticController::class, 'services'])->name('index');
Route::get('/services/{slug?}', [StaticController::class, 'services'])->name('services');
Route::get('/projects/{slug?}', [StaticController::class, 'projects'])->name('projects');
Route::get('/locations/{slug?}', [StaticController::class, 'locations'])->name('locations');
Route::get('/book', [StaticController::class, 'order'])->name('book');
Route::get('/book/success', [StaticController::class, 'orderSuccess'])->name('book-success');

Route::get('/find-city', [StaticController::class, 'findCity'])->name('book');
Route::POST('/create-order', [StaticController::class, 'createOrder'])->name('book');
