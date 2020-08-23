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

Route::get('/test', function(){
    return view('test');
})->middleware('auth');

Route::get('/clients', 'ClientsController@index')->name('home');
Route::get('/clients/create', 'ClientsController@create')->name('clients.create');
Route::post('/clients/create', 'ClientsController@store')->name('clients.store');
Route::get('/clients/{client}', 'ClientsController@show')->name('clients.show');
Route::get('clients/{client}/edit', 'ClientsController@edit')->name('clients.edit');
Route::put('clients/{client}/edit', 'ClientsController@update')->name('clients.update');
Route::delete('clients/{client}', 'ClientsController@delete')->name('clients.delete');

Route::get('/clients/{client}/email', 'SendEmailsController@showSenderForm')->name('emails.show');
Route::post('/clients/{client}/email/send', 'SendEmailsController@sendEmail')->name('emails.send');


Route::get('/templates', 'TemplatesController@index')->name('templates.index');
Route::get('/templates/create', 'TemplatesController@create')->name('templates.create');
Route::post('/templates/create', 'TemplatesController@store')->name('templates.store');

Route::get('/preview/{template}', function(){

})->name('email.preview');


Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('welcome'))->with('message', 'You have been logged out');
})->middleware('guest')->name('logout');

