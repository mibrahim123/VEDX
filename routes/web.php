<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)
->name('register')
->group(function(){
    Route::get('/', 'index');
    Route::get('/register','register');
    Route::get('/register-now','registerNow')->name('.now');
    Route::get('/student-register', 'studentRegister')->name('.student');
    Route::get('/enterprise-register', 'enterpriseRgister')->name('.enterprise');
    Route::get('/expert-register', 'expertRegister')->name('.expert');
});


Route::get('admin/login', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum'
])->group(function () {
    Route::get('/ibrahim', function (){
    dd("yes");
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])
->prefix('admin')
->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('categories/list', [ CategoryController::class, 'ajaxList'])->name('categories.list');
    Route::get('categories/{id}/delete', [ CategoryController::class, 'destroy'])->name('categories.delete');

    Route::resource('categories', CategoryController::class);

    Route::get('categories/change/status/{id}', [ CategoryController::class, 'updateStatus'])
    ->name('categories.update-status');
    Route::get('categories/change/home-status/{id}', [ CategoryController::class, 'updateHomeStatus'])
    ->name('categories.update-home-status');

    Route::get('sub-categories/list', [ SubCategoryController::class, 'ajaxList'])->name('sub-categories.list');
    Route::get('sub-categories/{id}/delete', [ SubCategoryController::class, 'destroy'])->name('sub-categories.delete');

    Route::resource('sub-categories', SubCategoryController::class);

    Route::get('sub-categories/change/status/{id}', [ SubCategoryController::class, 'updateStatus'])
    ->name('sub-categories.update-status');
    Route::get('sub-categories/change/home-status/{id}', [ SubCategoryController::class, 'updateHomeStatus'])
    ->name('sub-categories.update-home-status');

    Route::get('skills/list', [ SkillController::class, 'ajaxList'])->name('skills.list');
    Route::get('skills/{id}/delete', [ SkillController::class, 'destroy'])->name('skills.delete');

    Route::get('skills/change/status/{id}', [ SkillController::class, 'updateStatus'])
    ->name('skills.update-status');
    Route::resource('skills', SkillController::class);
});
