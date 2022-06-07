<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', [pageController::class,'home'])->name('home');
Route::get('/services', [pageController::class,'services'])->name('services');
Route::get('/about', [pageController::class,'about'])->name('about');
Route::get('/departments', [pageController::class,'department'])->name('departments');
Route::get('/register', [DoctorController::class,'register'])->name('register');
Route::post('/regInfo',[DoctorController::class,'registerSubmit'])->name('registerSubmit');
Route::get('/login', [DoctorController::class,'login'])->name('login');
Route::post('/dashboard',[DoctorController::class,'dashboard'])->name('dashboard');
Route::get('/contact', [pageController::class,'contact'])->name('contact');
Route::post('/info',[pageController::class,'contactSubmitted'])->name('contactSubmitted');




