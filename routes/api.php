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
Route::middleware('auth:api')->get('/families/{id}', 'FamilyController@get');
Route::middleware('auth:api')->get('/families/{id}/members', 'FamilyController@members');
Route::middleware('auth:api')->get('/families/{id}/members/{member_id}', 'FamilyController@getMember');

//Public
Route::post('tenants/register', 'TenantController@register');
Route::get('tenants/activation', 'TenantController@activate');
Route::post('login', 'UserController@login');
Route::post('tenants/register', 'TenantController@register');
