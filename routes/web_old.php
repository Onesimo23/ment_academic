<?php
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\CourseController;
// use App\Http\Controllers\DepartmentController;
// use App\Http\Controllers\ActivityController;
// use App\Http\Controllers\FacultyController;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');

    
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('start.home');

// // Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Auth::routes();

// // Route::get('/start', [HomeController::class, 'index'])->name('start.home');







// // Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
// // Route::get('/faculty/create',[ FacultyController::class,'create'])->name('faculty.create');
// // Route::post('/faculty',[ FacultyController::class,'store'])->name('faculty.store');
// // Route::get('/faculty/{id}/edit',[FacultyController::class,'edit'])->name('faculty.edit');
// // Route::post('/faculty/{id}',[FacultyController::class,'update'])->name('faculty.update');
// // Route::get('/faculty/{id}',[FacultyController::class,'show'])->name('faculty.show ');
// // Route::get('/faculty/{id}',[FacultyController::class,'destroy'])->name('faculty.destroy');


// // Testando as rotas 
// Route::group(['middleware' => 'auth'], function () {
//     // Rotas comuns aqui
// });

// Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
//     Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
//     Route::get('/department/create',[ DepartmentController::class,'create'])->name('department.create');
//     Route::post('/department',[ DepartmentController::class,'store'])->name('department.store');
//     Route::get('/department/{id}/edit',[DepartmentController::class,'edit'])->name('department.edit');
//     Route::post('/department/{id}',[DepartmentController::class,'update'])->name('department.update');
//     Route::get('/department/{id}',[DepartmentController::class,'show'])->name('department.show ');
//     Route::get('/department/{id}',[DepartmentController::class,'destroy'])->name('department.destroy');
    
// });

// Route::group(['middleware' => ['auth', 'checkrole:student']], function () {
    

// });

// Route::group(['middleware' => ['auth', 'checkrole:professor']], function () {
    
// Route::get('/course', [CourseController::class, 'index'])->name('course.index');
// Route::get('/course/create',[ CourseController::class,'create'])->name('course.create');
// Route::post('/course',[ CourseController::class,'store'])->name('course.store');
// Route::get('/course/{id}/edit',[CourseController::class,'edit'])->name('course.edit');
// Route::post('/course/{id}',[CourseController::class,'update'])->name('course.update');
// Route::get('/course/{id}',[CourseController::class,'show'])->name('course.show ');
// Route::get('/course/{id}',[CourseController::class,'destroy'])->name('course.destroy');

// });