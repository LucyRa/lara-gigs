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
  |    like the tag/search parameter (see Model->Listing->scopeFilter)
  |
  | Paginate will return a complex pagination
  | simplaePaginate will return next previous pagination
  */
  public function index() {
    return view('listings.index', [
        'heading' => 'Latest Listings',
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
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

    /*
    | If the form submission contains a logo file, then
    | store the file in the defined location
    | (see config -> filesystems)
    |
    | php artisan storage:link -> will create symlinks to
    | make the files publicly available
    */
    if($request->hasFile('logo')) {
      $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    Listing::create($formFields);

    // Redirect with a flash message
    return redirect('/')->with('message', 'Listing created successfully');
  }

  /*
  | Return the edit listing view, populated with the defined listing data
  */
  public function edit(Listing $listing) {
    return view('listings.edit', ['listing' => $listing]);
  }

  /*
  | When the edit listing form is submitted, validate the values
  | and then perform an update() to update the database values for
  | the listing.
  | Then return to the listing view, with a success message.
  */
  public function update(Request $request, Listing $listing) {
    $formFields = $request->validate([
      'title' => 'required',
      'company' => 'required',
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email'],
      'tags' => 'required',
      'description' => 'required'
    ]);

    /*
    | If the form submission contains a logo file, then
    | store the file in the defined location
    | (see config -> filesystems)
    |
    | php artisan storage:link -> will create symlinks to
    | make the files publicly available
    */
    if($request->hasFile('logo')) {
      $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    // Update the current listing
    $listing->update($formFields);

    // Redirect back to the listing entry with a flash message
    return back()->with('message', 'Listing updated successfully');
  }

  /*
  | Take in the current listing, and delete() the database entry.
  | Then redirect to the home page with a success message.
  */
  public function destroy(Listing $listing) {
    $listing->delete();

    return redirect('/')->with('message', 'Listings deleted successfully');
  }
}
