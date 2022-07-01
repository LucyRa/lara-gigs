<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('listings', [
    'heading' => 'Latest Listings',
    'listings' => [
      [
        'id' => 1,
        'title' => 'Listing 1',
        'description' => 'Lorem ipsum blah blah blah...'
      ],
      [
        'id' => 2,
        'title' => 'Listing 2',
        'description' => 'Lorem ipsum blah blah blah...'
      ]
    ]
  ]);
});
