<?php

use App\Http\Controllers\MainController;
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

Route::middleware(['web'])->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('home');

    Route::prefix('{city}')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('city.home');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::get('/news', [MainController::class, 'news'])->name('news');
    });
});
