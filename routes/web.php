<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome');

Auth::routes();

Route::get('/clients', 'ClientsController@index')->name('home');
Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
Route::post('/clients/create', 'ClientsController@store')->name('clients.store');
Route::get('/clients/{client}', 'ClientsController@show')->name('clients.show');
Route::get('clients/{client}/edit', 'ClientsController@edit')->name('clients.edit');
Route::put('clients/{client}/edit', 'ClientsController@update')->name('clients.update');
Route::delete('clients/{client}', 'ClientsController@delete')->name('clients.delete');
Route::get('/clients/{client}/email', 'EmailsController@create')->name('emails.create');
Route::post('/clients/{client}/email/send', 'EmailsController@store')->name('emails.send');

Route::get('/logout', function(Request $request){
    dd($request);
    Auth::logout();
    return redirect(route('welcome'))->with('message', 'You have been logged out');
})->middleware('guest')->name('logout');
