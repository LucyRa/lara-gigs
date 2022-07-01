<?php

use App\Http\Controllers\ListingController;
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
| A route to return all listings.
|
| Using the ListingController, which in turn calls the
| Listing model -> in this case the method called will
| be all
*/
Route::get('/', [ListingController::class, 'index']);


/*
| A route to return a single listing, from the listing id
| defined in the URL.
|
| Using the ListingController, which in turn calls the
| Listing model -> in this case the method called will
| be show
*/
Route::get('listings/{listing}', [ListingController::class, 'show']);