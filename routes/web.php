<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| #GET
| #POST
| #PUT
| #DELETE
*/

/*
| A route to return all listings from the Listing model -> all()
*/
Route::get('/', function () {
  return view('listings', [
    'heading' => 'Latest Listings',
    'listings' => Listing::all()
  ]);
});

/*
| A route to return a single listing, from the defined id,
| using the Listing model -> find()
| 
| The ID is retrived from the url by the route, and passed to the
| Listing::find() method as a parameter - find() will then return a 
| single listing
*/
Route::get('/listings/{id}', function ($id) {
  return view('listing', [
    'listing' => Listing::find($id)
  ]);
});
