<?php


Route::get('/home', 'CustomerController\DashboardController@index')->name('home');

Route::resource('/booking', 'CustomerController\BookingController');
