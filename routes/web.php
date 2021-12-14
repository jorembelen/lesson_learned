<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonLearnController;
use App\Http\Livewire\Users\UserCreate;
use App\Http\Livewire\Users\UserList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::put('lesson-approve/{lesson}', [LessonLearnController::class, 'approve'])->name('lesson.approve');
    Route::resource('lessons', LessonLearnController::class);

    Route::group(['middleware' => ['admin']], function() {

        Route::get('lessons-report', [LessonLearnController::class, 'lessonReport'])->name('lessons.report');
        // Route::get('create-user', UserCreate::class)->name('create.user');
        Route::get('users-list', UserList::class)->name('users.list');
        Route::get('create-user', [AdminController::class, 'createUser'])->name('create.user');
        Route::get('edit-user/{user}', [AdminController::class, 'editUser'])->name('user.edit');
        Route::put('update-user/{user}', [AdminController::class, 'updateUser'])->name('user.update');
        Route::post('add-user', [AdminController::class, 'addUser'])->name('user.add');

    });

});
