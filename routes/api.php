<?php

use App\Http\Controllers;
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

Route::middleware('auth:api')->get('/user/login', function (Request $request) {
    // perform google sign-in Oauth - Passport (probably MiddleWare)
    // if info valid - return user json data
    // else - return json error and message

    // return 
});
