<?php
 
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\AuhtController;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\Api\VAmpsController;
 
 Route::get('/', function () {
     return redirect()->route('dashboard.home');
 });
 
 Route::get('login', [AuhtController::class, 'index'])->name('login');
 Route::post('post-login', [AuhtController::class, 'login'])->name('login.post');
 Route::get('registration', [AuhtController::class, 'register'])->name('register');
 Route::post('post-registration', [AuhtController::class, 'registerUser'])->name('register.post');
 Route::middleware(['auth'])->get('dashboard', [AuhtController::class, 'dashboard'])->name('dashboard');
 Route::post('logout', [AuhtController::class, 'logout'])->name('logout');

 Route::middleware(['auth'])->get('/home', [DashboardController::class, 'home'])->name('dashboard.home');
 Route::middleware(['auth'])->get('/chart', [DashboardController::class, 'chart'])->name('dashboard.chart');
 Route::middleware(['auth'])->get('/data', [DashboardController::class, 'data'])->name('dashboard.data');

    