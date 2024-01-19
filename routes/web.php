<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\MentorLoginController;
use App\Http\Controllers\Auth\MentorRegisterController;
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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::get('/mentors/create', [MentorController::class, 'create'])->name('mentors.create');
    Route::post('/mentors', [MentorController::class, 'store'])->name('mentors.store');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Rotas de Login
// Route::get('/mentor/login', [MentorLoginController::class, 'showLoginForm'])->name('mentor.login');
// Route::post('/mentor/login', [MentorLoginController::class, 'login']);
// Route::post('/mentor/logout', [MentorLoginController::class, 'logout'])->name('mentor.logout');

// Rotas de Registro
Route::get('/mentor/register', [MentorRegisterController::class, 'showRegistrationForm'])->name('mentor.register');
Route::post('/mentor/register', [MentorRegisterController::class, 'create']);


});

require __DIR__.'/auth.php';
