<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('instances/search/{name}', 'ApiController@getInstance');
Route::put('instances/update/{id}', function($id, Request $request) {
    $article = Instance::findOrFail($id);
    // dd($article;
    return $article;
});
Route::get('hosts/search/{name}', 'ApiController@getHost');
