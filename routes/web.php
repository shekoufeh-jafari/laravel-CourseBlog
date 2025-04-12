<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\Admin;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [UserController::class, "home"])->name('home');

Route::get("/register" , [UserController::class,"register"])->name('register');
Route::post("/register", [UserController::class, "registerUser"])->name('register.User');

Route::get("/login" , [UserController::class,"login"])->name('login');
Route::post("/login" , [UserController::class,"loginAdmin"])->name('login.Admin');



Route::prefix('admin')->middleware(Admin::class)->group(function(){
    Route::get("/panel", [AdminController::class, "index"])->name('admin.panel');

    Route::get("/add", [AdminController::class, "showAdd"])->name('admin.add');
    Route::post("/add", [AdminController::class, "addcourse"])->name('admin.add');

    Route::get("/edit/{id}", [AdminController::class, "edit"])->name('admin.edit');
    Route::post("/update/{id}", [AdminController::class, "update"])->name('admin.update');
    Route::get("/delete/{id}", [AdminController::class, "delete"])->name('admin.delete');

})->middleware('admin');