<?php

use App\Http\Controllers\Hike;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/hikes', [HikeController::class, 'index'])->name('hike.hikes');
Route::get('/hikes/id={id}', [HikeController::class, 'hikeDetails'])->name("hike.details");
Route::get('/hikes/tag={tag}', [HikeController::class, 'hikesByTag'])->name("hike.tags");


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addHike', [HikeController::class, 'showCreateForm'])->name('hike.create');
    Route::post('/addHike', [HikeController::class, 'createHike'])->name('hike.store');
    Route::delete('/dashboard/{id}', [HikeController::class, 'destroy'])->name('hike.destroy');
    Route::get('/dashboard/{id}/edit', [HikeController::class, 'edit'])->name('hike.edit');
    Route::patch('/dashboard/{id}/patch', [HikeController::class, 'update'])->name('hike.update');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
