<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', [UserController::class, 'loadAllUsers']);
Route::get('/add/user', [UserController::class, 'loadAddUserForm']);

Route::post('/add/user', [UserController::class, 'AddUser'])->name('AddUser');
Route::get('/edit/{id}',[UserController::class, 'loadEditForm']);
Route::get('/delete/{id}',[UserController::class, 'deleteUser']);

Route::post('/edit/user', [UserController::class, 'EditUser'])->name('EditUser');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Route::get('/users', action: [UserController::class, 'index'])->name('users');

// Route::get('/home', action: [HomeController::class, 'index'])->name('home');
// Route::post(uri:'/home', action:[HomeController::class, 'store'])->name('home.store');
