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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usereventdashboard','UserEvent@index');


Route::get('/attendevent/{eventid}','UserEvent@attendevent');

Route::get('/cancel_event/{cancel_eventid}','UserEvent@eventcancel');


Route::get('/eventview/{id}','UserEvent@eventview');






//for admin 


Route::get('/admindashboard','UserAdmin@index');
Route::get('/createvent','UserAdmin@create');


Route::post('/storevent','UserAdmin@store_event');

Route::get('/invite/{userid}/{eventid}','UserAdmin@inviteusers');
