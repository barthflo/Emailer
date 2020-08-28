<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use SendGrid\Mail\Mail;

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
Route::get('/sendgrid', function(){
    $email = new Mail();
$email->setFrom('flrnt.barth@gmail.com', 'Flo Barth Photography');
$email->setSubject("Sending with Twilio SendGrid is Fun");
$email->addTo("flrnt.barth@gmail.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
});

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

Route::get('/clients/{client}/email', 'SendEmailsController@showSenderForm')->name('emails.show');
Route::post('/clients/{client}/email/send', 'SendEmailsController@sendEmail')->name('emails.send');


Route::get('/templates', 'TemplatesController@index')->name('templates.index');
Route::get('/templates/create', 'TemplatesController@create')->name('templates.create');
Route::post('/templates/create', 'TemplatesController@store')->name('templates.store');
Route::get('/templates/{template}', 'TemplatesController@show')->name('templates.show');
Route::get('/templates/{template}/edit', 'TemplatesController@edit')->name('templates.edit');
Route::put('/templates/{template}/edit', 'TemplatesController@update')->name('templates.update');
Route::delete('/templates/{template}', 'TemplatesController@delete')->name('templates.delete');


Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('welcome'))->with('message', 'You have been logged out');
})->middleware('guest')->name('logout');

