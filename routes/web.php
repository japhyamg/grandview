<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\KPIController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Employee Route
Route::middleware(['auth', 'role:user'])->name('user.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/view-kpis', [DashboardController::class, 'viewKpis'])->name('viewkpis');
    Route::get('/create-report', [DashboardController::class, 'createReport'])->name('create-report');
    Route::post('/create-report', [DashboardController::class, 'submitReport'])->name('submit-report');
});


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function(){
    // Show Performanc summary
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Manage Department
    Route::resource('/departments', DepartmentController::class);
    // Manage Employees
    Route::resource('/employees', EmployeeController::class);
    // Manage KPIs
    Route::resource('/kpis', KPIController::class);
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
