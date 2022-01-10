<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Record;
use App\Genre;


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

Route::view('/', 'home');
Route::get('Itunes','ItunesController@index');
Route::get('shop', 'ShopController@index');
Route::get('shop/{id}', 'ShopController@show');
Route::get('contact-us', 'ContactUsController@show');
Route::post('contact-us', 'ContactUsController@sendEmail');

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::resource('genres', 'Admin\GenreController');
    Route::get('genres2/qryGenres', 'Admin\Genre2Controller@qryGenres');
    Route::resource('genres2', 'Admin\Genre2Controller');
    Route::resource('records', 'Admin\RecordController');
    Route::resource('users', 'Admin\UserController');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::redirect('/', '/user/profile');
    Route::get('profile', 'User\ProfileController@edit');
    Route::post('profile', 'User\ProfileController@update');
    Route::get('password', 'User\PasswordController@edit');
    Route::post('password', 'User\PasswordController@update');
});

//ter ilustrate
Route::prefix('api')->group(function (){
    Route::get('users',function (){
        return User::get();
    });
   Route::get('records',function (){
       return Record::with('genre')->get();
   }) ;
   Route::get('genres',function (){
       return Genre::with('records')->get();
   });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
