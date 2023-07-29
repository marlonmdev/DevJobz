<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ApplicantController;

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

// All Job Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Job Listing Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Job Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Job Listing Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Job Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Job Listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Job Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

// Show Apply Form
Route::get('/listing/{listing}/apply', [ApplicantController::class, 'create'])->middleware('guest');

// Submit Application
Route::post('/applicant', [ApplicantController::class, 'store'])->middleware('guest');

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store Registered User
Route::post('/users', [UserController::class, 'store']);

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('users/authenticate', [UserController::class, 'authenticate']);

// Show Change Password Form
Route::get('users/edit', [UserController::class, 'edit'])->middleware('auth');

// Show Change Password Form
Route::put('users/{user}', [UserController::class, 'update'])->middleware('auth');

// User Logout 
Route::post('/logout', [UserController::class, 'logout']);



