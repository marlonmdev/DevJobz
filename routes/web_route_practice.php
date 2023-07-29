<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register'); 
});


// Sample route with wildcard and constraints that accepts values from 0-9 only
Route::get('/posts/{id}', function ($id) {
    // dd($id); dump and die
    // ddd($id); dump, die, and debug
    ddd($id);
    return response('<h2>Post '. $id .'</h2>'); 
})->where('id', '[0-9]+');

// Sample route that will handle query strings (needs importing of http/request class)
Route::get('/search', function (Request $request) {
    // dd($request);
    return $request->name .' '. $request->age;
});

// Sample custom route with custom status code and headers
Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('custom', 'bar');
});

// Single Listing (1st way)
// Route::get('/listing/{id}', function($id){
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// })->where('id', '[0-9]+');

// Single Listing (2nd) way)
// Route::get('/listing/{id}', function($id){
//     $listing = Listing::find($id);
//     if($listing){        
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     }else{
//         abort(404);
//     }
// });

// Single Listing (3rd way)
// Route::get('/listing/{listing}', function(Listing $listing){
//     return view('listing', [
//         'listing' => $listing
//     ]);
// });
