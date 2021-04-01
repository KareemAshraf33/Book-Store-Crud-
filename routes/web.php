<?php

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
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('isadmin')->group(function(){
//admin
//create
Route::get('books/create','BookController@create');
Route::post('books/store','BookController@store');
//update 
Route::get('/books/edit/{id}','BookController@edit');
Route::post('/books/update/{id}','BookController@update');
//delete 
Route::get('/books/delete/{id}','BookController@delete'); 
    
Route::get('/categories/list','CategoryController@list');
Route::post('/categories/save','CategoryController@save');   

});

Route::middleware('isloggedin')->group(function(){
//user
Route::get('/books/list','BookController@list');
//books/show/1
Route::get('/books/show/{id}','BookController@show');   
Route::get('/users/logout','UserController@logout'); 
    
Route::get('users/notes','NoteController@notes');
Route::post('users/savenote','NoteController@savenote');  

});

//registeration
Route::get('/users/register','UserController@register');
Route::post('/users/save','UserController@save');
//login
Route::get('/users/login','UserController@login');
Route::post('/users/handlelogin','UserController@handlelogin');
//not auth route 
Route::get('/notauth',function(){
    return 'you dont have permission to visit this link';
});

