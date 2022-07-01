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
    return view('welcome');
});

/*
| Route with content, status, and headers, set with the methods:
| - response({content}, {status}) 
| & 
| - header({header})
*/
Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain');
});

/*
| Route with a wild card to allow for dynamic content routing, 
| and a where clause that will restrict the wildcard to numeric values only (REGEX):
| - where({wildcard}, {expression})
|
| dd({$}) -> Die & Dump: Stop subsequent code from running, and output the given value/variable
| ddd({$}) -> Die, Dump & Debug: Stop subsequent code from running, output the given value/variable,
|             and display the laravel debugger view (with relevant details)
*/
Route::get('/posts/{id}', function ($id) {
    dd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

/*
| Route with the ability to retrieve values from the request (e.g - query string keys & values)
| 
| Values can be returned using the normal PHP OOP class->method syntax (e.g - $class->method)
*/
Route::get('/search', function (Request $request) {
    return $request->name . " " . $request->city;
});