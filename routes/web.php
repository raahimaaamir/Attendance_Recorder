<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/loginauth', [LoginController::class, 'Login'])->name("loginauth");

// Route for displaying the student page
    Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');

// Route for displaying the teacher page
Route::get('/attendance/{id}', [AttendanceController::class, 'displayattendance'])->name('attendance.displayattendance');
Route::post('/attendanc esubmit', [AttendanceController::class, 'attendancesubmit'])->name('attendance.submit');

Route::get('/signup', [LoginController::class, 'showSignupForm'])->name('signup');

// Route for handling sign-up form submission
Route::post('/signup', [LoginController::class, 'signup']);
