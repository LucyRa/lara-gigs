<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|-------------------------------------------------------------------------
| Common Resource Routes (Naming convension)
-------------------------------------------------------------------------
| index => Show all listings
| show => Show single listing
| create => Show form to create a new listing
| store => Store a new listing
| edit => Show for to edit a listing
| update => Update a listing
| destroy => Delete a listing
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
| A route to return the Create Listing form view
|
| Using the ListingController
*/
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing data
Route::post('/listings', [ListingController::class, 'store']);

/*
| A route to return the Edit listing form view, using the ID defined in the
| URL to call the relevant listing entry
*/
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

/*
| A route to update a listing when it's edit form is submitted.
|
| Using the ListingController, which in turn validates the new values
| before updating the listings database entry.
*/
Route::put('/listings/{listing}', [ListingController::class, 'update']);

/*
| A route to delete a listing when the delete entry button is clicked.
|
| Using the ListingController, which in turn calls the laravel delete() method
| to drop the listings database entry.
*/
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

/*
| A route to return a single listing, from the listing id
| defined in the URL.
|
| Using the ListingController, which in turn calls the
| Listing model -> in this case the method called will
| be show
*/
Route::get('listings/{listing}', [ListingController::class, 'show']);
