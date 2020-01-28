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

/* end of api routes */

Route::get('/admin', function () {
    return view('admin');
});
