<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/reports/loans');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('books', BookController::class);
    Route::resource('students', StudentController::class);
    Route::resource('transactions', TransactionController::class);
    Route::get('reports/loans', [ReportController::class, 'loanReport'])->name('reports.loans');
Route::get('reports/students', [ReportController::class, 'studentReport'])->name('reports.students');
});

require __DIR__.'/auth.php';
