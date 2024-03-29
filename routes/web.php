<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MatchController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
Route::get('/mentors/create', [MentorController::class, 'create'])->name('mentors.create');
Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
Route::get('/mentors/{mentor}', [MentorController::class, 'show'])->name('mentors.show');
Route::get('/mentors/{mentor}/edit', [MentorController::class, 'edit'])->name('mentors.edit');
Route::put('/mentors/{mentor}', [MentorController::class, 'update'])->name('mentors.update');
Route::delete('/mentors/{mentor}', [MentorController::class, 'destroy'])->name('mentors.destroy');


Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');
Route::get('/matches/edit/{id}', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/update/{id}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/destroy/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');


require __DIR__ . '/auth.php';
