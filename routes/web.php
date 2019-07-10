<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ContactsController@index');
Route::get('contacts/create', 'ContactsController@store');
Route::get('contacts/{contact}', 'ContactsController@show');
Route::delete('contacts/{contact}', 'ContactsController@destroy');


Route::resource('/contacts', 'ContactsController')->except('index');

Route::post('/contacts/{contact}/mails', 'MailsController@store');

Route::resource('/mails', 'MailsController')->except(['create', 'store']);

