<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;

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

//Basic Pages
Route::get('/', [pageController::class,'home'])->name('home');
Route::get('/services', [pageController::class,'services'])->name('services');
Route::get('/about', [pageController::class,'about'])->name('about');
Route::get('/departments', [pageController::class,'department'])->name('departments');

//Doctor Pages
Route::get('/register', [DoctorController::class,'register'])->name('register');
Route::post('/regInfo',[DoctorController::class,'create'])->name('registerSubmit');
Route::get('/login', [DoctorController::class,'login'])->name('login');
Route::post('/login',[DoctorController::class,'loginRequest'])->name('login');
Route::get('/dashboard', [DoctorController::class,'dashboard'])->name('dashboard')->middleware('ValidDoctor');
Route::get('/logout',[DoctorController::class,'logout'])->name('logout');
Route::get('/contact', [pageController::class,'contact'])->name('contact');
Route::post('/info',[pageController::class,'contactSubmitted'])->name('contactSubmitted');
Route::get('/profile',[DoctorController::class,'loadProfile'])->name('profile')->middleware('ValidDoctor');
Route::get('/edit',[DoctorController::class,'editProfile'])->name('edit_profile')->middleware('ValidDoctor');
Route::post('/update',[DoctorController::class,'updateProfile'])->name('updateProfile')->middleware('ValidDoctor');

//Admin Pages
Route::get('/adminLogin',[AdminController::class,'index'])->name('admin_log');
Route::post('/adminLogin',[AdminController::class,'adminlogin'])->name('admin_login');
Route::get('/admin_dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard')->middleware('ValidAdmin');
Route::get('/admin_logout',[AdminController::class,'logout'])->name('admin_logout');
Route::get('/create_doctor',[AdminController::class,'doctor_reg'])->name('create_doc')->middleware('ValidAdmin');
Route::post('/adminRegInfo',[AdminController::class,'create'])->name('add_doctor')->middleware('ValidAdmin');
Route::get('/manage_doctors',[AdminController::class,'showUsers'])->name('manage_doctors')->middleware('ValidAdmin');
Route::get('/d-{id}',[AdminController::class,'showUser'])->name('show_doctor')->middleware('ValidAdmin');
Route::get('/dE-{id}',[AdminController::class,'editUser'])->name('edit_doctor')->middleware('ValidAdmin');
Route::get('/dD-{id}',[AdminController::class,'deleteUser'])->name('delete_doctor')->middleware('ValidAdmin');
Route::post('/up',[AdminController::class,'updateProfile'])->name('upProfile')->middleware('ValidAdmin');




