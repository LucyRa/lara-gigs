<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;
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

  // Show create form
  public function create() {
    return view('listings.create');
  }

  /*
  | Validate the submitted create form values.
  | Then either return error messages, or proceed with
  | the creation of a new listing.
  |
  | If creation is successful, redirect to the homepage.
  |
  | - Rule::unique -> Validation class::method from Laravel
  | - ::create -> Factory method from Laravel
  */
  public function store(Request $request) {
    $formFields = $request->validate([
      'title' => 'required',
      'company' => ['required', Rule::unique('listings', 'company')],
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email'],
      'tags' => 'required',
      'description' => 'required'
    ]);

    Listing::create($formFields);

    return redirect('/');
  }
}
