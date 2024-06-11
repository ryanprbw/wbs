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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('about');
});



Route::middleware('auth')->group(function () {

    // Routes that require user role
   
    Route::middleware('role:user')->group(function () {

    });

    // Routes that require admin role
    Route::middleware('role:admin')->group(function () {
        Route::get('/pengaduans', [PengaduanController::class, 'index'])->name('pengaduans.index');
        Route::get('/pengaduans/create', [PengaduanController::class, 'create'])->name('pengaduans.create');
        Route::post('/pengaduans', [PengaduanController::class, 'store'])->name('pengaduans.store');
        Route::get('/pengaduans/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('pengaduans.edit');
        Route::put('/pengaduans/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduans.update');
        Route::delete('/pengaduans/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduans.destroy');
    });
    // Route::get('/pengaduans', [PengaduanController::class, 'index'])->name('pengaduans.index');
    Route::get('/pengaduans/create', [PengaduanController::class, 'create'])->name('pengaduans.create');
    Route::post('/pengaduans', [PengaduanController::class, 'store'])->name('pengaduans.store');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
