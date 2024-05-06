<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teachers\TeachersController;
use GuzzleHttp\Middleware;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/', function () {
            return view('dashboard');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('grade', GradeController::class)->names('grade')->only(['update', 'index', 'store', 'destroy']);
        Route::resource('classroom', ClassRoomController::class)->names('classroom')->only(['update', 'index', 'store', 'destroy']);
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('delete_all', [ClassRoomController::class, 'delete_all'])->name('delete_all');
        Route::post('filter', [ClassRoomController::class, 'filter'])->name('filter');
        Route::resource('section', SectionController::class)->names('section');
        Route::get('teacher', [TeachersController::class, 'index'])->name('teacher');
        Route::get('teacher/create', [TeachersController::class, 'create'])->name('teacher.create');
        Route::post('teacher/store', [TeachersController::class, 'store'])->name('teacher.store');
        Route::get('teacher/edit/{id}', [TeachersController::class, 'edit'])->name('teacher.edit');
        Route::post('teacher/edit', [TeachersController::class, 'update'])->name('teacher.update');
        Route::post('teacher/delete', [TeachersController::class, 'destroy'])->name('teacher.destroy');
        Route::resource('student', StudentController::class)->names('student');
        Route::get('grade_student_id/{id}', [StudentController::class, 'grade_student_id']);
        Route::get('section_student_id/{id}', [StudentController::class, 'section_student_id']);


        Route::get('grade_id/{id}', [SectionController::class, 'gradeId'])->name('grade_id');
        Route::view('parents/add', 'pages.parents')->name('parents');

        Route::get('/empty', function () {
            return view('empty');
        });

    }
);
// Route::get('/grade', function () {
//     return view('pages.grades');
// })->name('grade');

Route::get('/test', [ClassRoomController::class, 'test']);
Route::get('/test11', [TeachersController::class, 'index']);

Route::get('/empty11', function () {
    return view('pages/teacher/teacher');
});


require __DIR__ . '/auth.php';