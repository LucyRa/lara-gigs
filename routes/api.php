<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
| API Route to return 'Posts' data as a JSON object (no middleware)
*/
Route::get('/posts', function () {
  return response()->json([
    'posts' => [
      [
          'title' => 'Post 1'
      ]
    ]
  ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
