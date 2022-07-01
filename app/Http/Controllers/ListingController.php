<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
  /*
  | Get all of the listings, from the Listing model, 
  | and then render the listings view with the
  | retrieved data
  */
  public function index() {
    return view('listings.index', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
  }

  /*
  | Get a single listing, from the Listing model, 
  | and then render the listing view with the
  | retrieved data
  */
  public function show(Listing $listing) {
    return view('listings.show', [
        'listing' => $listing
    ]);
  }
}

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
