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


Route::controller(UserController::class)->group(function() {
    // Show Register Form
    Route::get('/register', 'create')->middleware('guest');
    // Store Registered User
    Route::post('/users', 'store');
    // Show Login Form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    // Login User
    Route::post('users/authenticate', 'authenticate');
    // Show Change Password Form
    Route::get('users/edit', 'edit')->middleware('auth');
    // Show Change Password Form
    Route::put('users/{user}', 'update')->middleware('auth');
    // User Logout 
    Route::post('/logout', 'logout');
});


Route::controller(ListingController::class)->group(function() {
    // All Job Listings
    Route::get('/', 'index');  
    // Show Create Job Listing Form
    Route::get('/listings/create', 'create')->middleware('auth');
    // Store Job Listing
    Route::post('/listings', 'store')->middleware('auth');
    // Show Edit Job Listing Form
    Route::get('/listings/{listing}/edit', 'edit')->middleware('auth');
    // Update Job Listing
    Route::put('/listings/{listing}', 'update')->middleware('auth');
    // Delete Job Listing
    Route::delete('/listings/{listing}', 'delete')->middleware('auth');
    // Manage Job Listings
    Route::get('/listings/manage', 'manage')->middleware('auth');
    // Single Job Listing
    Route::get('/listing/{listing}', 'show');
});


Route::controller(ApplicantController::class)->group(function() {
    // View Job Listing Applicants
    Route::get('/listing/{id}/applicants', 'index')->middleware('auth');
    // View Applicant Details
    Route::get('/applicant/{applicant}', 'show')->middleware('auth');
    // Show Apply Form
    Route::get('/listing/{listing}/apply', 'create')->middleware('guest');
    // Submit Application
    Route::post('/applicant', 'store')->middleware('guest');
});


















