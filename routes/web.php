<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
// use   \bootstrap\app;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'active'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/category/create', [CategoryController::class , 'show']);
// Route::post('/categories/create', [CategoryController::class , 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});


Route::middleware('auth')->group(function ()
{
    Route::resource('links', LinksController::class);

});

require __DIR__.'/auth.php';
