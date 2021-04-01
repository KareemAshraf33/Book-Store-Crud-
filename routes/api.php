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

Route::middleware('isapiloggedin')->group(function(){
Route::get('/books/list','ApiController@books');    
});
Route::middleware('isapiadmin')->group(function(){
Route::get('/categories/list','ApiController@categories');    
});

Route::post('/users/register','ApiController@register');
Route::post('/users/login','ApiController@login');

