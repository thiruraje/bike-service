<?php

// Route::get('/home', function () {
//     $users[] = Auth::user();
//     $users[] = Auth::guard()->user();
//     $users[] = Auth::guard('owner')->user();

//     //dd($users);

//     return view('owner.layout.master');
// })->name('home');
Route::get('/home', 'OwnerController\DashboardController@index')->name('home');

Route::resource('/service', 'OwnerController\ServiceController');
Route::resource('/bookings', 'OwnerController\BookingController');
Route::post('/update_booking_status', 'OwnerController\BookingController@update_booking_status');

