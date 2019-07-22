<?php

Route::get('/', 'ContactsController@index');

Route::prefix('contacts')->group(function(){
  Route::get('create', 'ContactsController@create')->name('contacts.create');
  Route::post('store', 'ContactsController@store')->name('contacts.store');
  Route::get('{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
  Route::patch('{contact}', 'ContactsController@update')->name('contacts.update');
  Route::get('{contact}', 'ContactsController@show')->name('contacts.show');
  Route::delete('{contact}', 'ContactsController@destroy')->name('contacts.destroy');
});

Route::prefix('/contacts/{contact}')->group(function(){
  Route::post('mails', 'MailsController@store');
  Route::patch('mails', 'MailsController@update');
  Route::delete('mails', 'MailsController@destroy');
});


