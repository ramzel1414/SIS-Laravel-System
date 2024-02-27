<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;

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
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout(); // Log the user out
    return redirect('/'); // Redirect to the welcome page or any other page
})->name('logout');


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');


// Student-related routes group
Route::prefix('students')->group(function () {
    // Route for listing students
    Route::get('/', [StudentController::class, 'index'])->name('students.index');

    // Route for viewing a specific student
    Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');

    // Add more student-related routes as needed
});

// Teacher-related routes group
Route::prefix('teachers')->group(function () {
    // Route for listing students
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');

    // Route for viewing a specific student
    Route::get('/{teachers}', [TeacherController::class, 'show'])->name('teachers.show');

    // Add more student-related routes as needed
});

// Teacher-related routes group
Route::prefix('grades')->group(function () {
    // Route for listing students
    Route::get('/', [GradeController::class, 'index'])->name('grades.index');

    // Route for viewing a specific student
    Route::get('/{grades}', [GradeController::class, 'show'])->name('grades.show');

    // Add more student-related routes as needed
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
