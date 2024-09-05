<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/genel-gorunum', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/kayit-ol', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/sifremi-unuttum', [AdminController::class, 'forgetPassword'])->name('admin.forget-password');

Route::post('/admin/login', [MemberController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [MemberController::class, 'logout'])->name('admin.logout');
Route::post('/admin/register', [MemberController::class, 'register'])->name('admin.register.post');
Route::get('/admin/kullanicilar', [UserController::class, 'index'])->name('admin.users.index');
