<?php

use App\Http\Controllers\CreatureController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'view_home'])
    ->name('site.view_home');
Route::get('/about-us', [SiteController::class, 'view_about_us'])
    ->name('site.view_about-us');

Route::get('/users/register', [UserController::class, 'view_register'])
    ->name('user.view_register');
Route::get('/users/login', [UserController::class, 'view_login'])
    ->name('user.view_login');
Route::get('/users/{user}', [UserController::class, 'view_show'])
    ->name('user.view_show');

Route::post('/users/register', [UserController::class, 'register'])
    ->name('user.register');
Route::post('/users/login', [UserController::class, 'login'])
    ->name('user.login');
Route::post('/users/logout', [UserController::class, 'logout'])
    ->name('user.logout');
Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('user.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'delete'])
     ->name('user.delete')->middleware('auth');

Route::get('/creatures', [CreatureController::class, 'view_list'])
    ->name('creature.view_list');
Route::get('/creatures/add', [CreatureController::class, 'view_add'])
     ->name('creature.view_add')->middleware('auth');
Route::get('/creatures/{creature}', [CreatureController::class, 'view_show'])
    ->name('creature.view_show');
Route::get('/creatures/{creature}/edit', [CreatureController::class, 'view_edit'])
    ->name('creature.view_edit')->middleware('auth');

// CRUD creatures

Route::post('/votes/add', [VoteController::class, 'add'])
    ->name('vote.add')->middleware('auth');
Route::delete('/votes/{vote}', [VoteController::class, 'delete'])
    ->name('vote.delete')->middleware('auth');

Route::post('/comments/add');
Route::put('/comments/{comment}/edit');
Route::delete('/comments/{comment}');
