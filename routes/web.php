<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use Haruncpi\LaravelSimpleCaptcha\SimpleCaptcha;

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

// Route::post('/dashboards', [DashboardController::class, 'store']);
Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboards.index');
Route::get('/dashboards/create', [DashboardController::class, 'create'])->name('dashboards.create');
Route::post('/dashboards', [DashboardController::class, 'store'])->name('dashboards.store');

// Route::post('/pengaduans', [PengaduanController::class, 'store']);
Route::get('/pengaduans', [PengaduanController::class, 'index'])->name('pengaduans.index');
Route::get('/pengaduans/create', [PengaduanController::class, 'create'])->name('pengaduans.create');
Route::post('/pengaduans', [PengaduanController::class, 'store'])->name('pengaduans.store');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboards/{pengaduan}/edit', [DashboardController::class, 'edit'])->name('dashboards.edit');
    // Route::put('/dashboards/{pengaduan}', [DashboardController::class, 'update'])->name('dashboards.update');
    // Route::delete('/dashboards/{pengaduan}', [DashboardController::class, 'destroy'])->name('dashboards.destroy');
    Route::get('/pengaduans/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('pengaduans.edit');
    Route::put('/pengaduans/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduans.update');
    Route::delete('/pengaduans/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduans.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
