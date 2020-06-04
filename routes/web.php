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

/* api routes */

Route::post('/add_bus','Ticketing@store');
Route::post('/add_seats','Ticketing@seats');
Route::get('/retrieve_bus','Ticketing@buses');
Route::delete('/remove_bus/{id}','Ticketing@destroy');
Route::put('/update_bus','Ticketing@update');
Route::get('/bus_schedules','Ticketing@retrieveSchedules');
Route::post('/dashboard','Ticketing@dashboard');
Route::put('/release','Ticketing@release_ticket');
Route::put('/hold_ticket','Ticketing@hold_ticket');
//user
Route::post('/searchBus','Ticketing@searchBus');
Route::get('/welcome','Ticketing@retrieveAllBus'); 
Route::post('/chooseSeat/{id}', 'Ticketing@retrieveSeats');
Route::post('/logout','Ticketing@logout');
Route::post('/store_passenger','Ticketing@storePassengers');
Route::post('/store_ticket','Ticketing@storeTickets');


/* end of api routes */

// Route::get('/admin', function () {
//     return view('admin');
// });
//user side
Route::get('/user', function () {
    return view('user');
});

Route::get('/',function (){
    return redirect('/login');
});


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
