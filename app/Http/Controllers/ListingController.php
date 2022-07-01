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
    return view('listings', [
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
    return view('listing', [
        'listing' => $listing
    ]);
  }
}
