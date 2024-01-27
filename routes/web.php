<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/about-us', [SiteController::class, 'about'])->name('site.about_us');

Route::get('/users/register', [UserController::class, 'form'])->name('user.form');
Route::post('/users/register', [UserController::class, 'register'])->name('user.register');

Route::get('/users/login', [AuthController::class, 'form'])->name('auth.form');
Route::post('/users/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/users/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');

Route::get('/publications', [PublicationController::class, 'index'])
    ->name('publication.index');
Route::get('/publications/{publication}', [PublicationController::class, 'show'])
    ->name('publication.show')->whereNumber('publication');

Route::get('/publications/add', [PublicationController::class, 'create'])
    ->name('publication.form')->middleware('auth');
Route::post('/publications/add', [PublicationController::class, 'add'])
    ->name('publication.add')->middleware('auth');

Route::get('/publications/{publication}/edit', [PublicationController::class, 'edit'])
    ->name('publication.edit');
Route::put('/publications/{publication}', [PublicationController::class, 'update'])
    ->name('publication.update');

Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])
    ->name('publication.destroy');

Route::post('/comment/add', [CommentController::class, 'add'])
    ->name('comment.add')->middleware('auth');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])
    ->name('comment.delete');
