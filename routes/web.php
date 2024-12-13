<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function(){
    return view('welcome');
});  

Route::resource('/pelanggan', \App\Http\Controllers\PelangganController::class);
Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::resource('/golongan', \App\Http\Controllers\GolonganController::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/layouts/app', function () {
    return view('layouts.app'); 
})->name('layouts.app');  

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');