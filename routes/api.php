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
//Secure
Route::middleware('auth:api')->get('/user', 'UserController@me');
Route::middleware('auth:api')->post('/logout', 'UserController@logout');

//Public
Route::post('login', 'UserController@login');
Route::post('tenants/register', 'TenantController@register');