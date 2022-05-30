<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;

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

Route::get('/',[pageController::class,'home'])->name('home');
Route::get('/medicines',[pageController::class,'medicines'])->name('medicineList');
Route::get('/team',[pageController::class,'team'])->name('team');
Route::get('/about',[pageController::class,'about'])->name('about');
Route::get('/contact',[pageController::class,'contact'])->name('contact');
Route::post('/query',[pageController::class,'showDetails'])->name('query');
