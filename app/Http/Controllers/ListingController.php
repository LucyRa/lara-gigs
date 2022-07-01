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
  | 
  | Listing::latest()->get() = Get all listings and 
  | order them by created_at, with most recent being 
  | rendered first
  | -- Adding the filter() method, with request(['tag', 'search']) as
  |    a parameter, will return all listings that have
  |    the defined tag or have a title/description/tag value which is
  |    like the tag/search parameter
  */
  public function index() {
    return view('listings.index', [
        'heading' => 'Latest Listings',
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
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
