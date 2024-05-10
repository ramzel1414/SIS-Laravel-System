<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserProfileController;

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


//route for log-out
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the welcome page or any other page
})->name('logout');


//route for dashboard
Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');


// Student-related routes group
Route::prefix('students')->middleware(['auth', 'verified'])->group(function () {          //in short this group route is http://127.0.0.1:8000/students/.. 'automatic students na siya mag start'
   
    // Route for students page
    Route::get('/', [StudentController::class, 'index'])->name('student.index');

    // Route for adding a student (add student button sa modal)
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');

    //Route for deleting student (delete button)
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

});

// Subject-related routes group
Route::prefix('subjects')->middleware(['auth', 'verified'])->group(function () {

    // Route for showing subjects page
    Route::get('/', [SubjectController::class, 'index'])->name('subject.index');

    // Route for adding a student (add student button sa modal)
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    
    //Route for deleting subject (delete button)
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

});

// Grade-related routes group
Route::prefix('grades')->middleware(['auth', 'verified'])->group(function () {

    // Route for showing grades page
    Route::get('/', [GradeController::class, 'index'])->name('grade.index');

    // Route for storing a new grade (add button in modal)
    Route::post('/', [GradeController::class, 'store'])->name('grade.store');

    // Route for updating a student (edit button sa modal)
    Route::put('/grade/{id}', [GradeController::class, 'update'])->name('grade.update');

    //Route for deleting grade (delete button)
    Route::delete('/grade/{id}', [GradeController::class, 'destroy'])->name('grade.destroy');

});


//breeze scafold (default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
