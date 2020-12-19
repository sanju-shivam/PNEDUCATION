<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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
})->name('/');

Route::get('has',function(){
	dd(Hash::make('123456789'));
});

Auth::routes();

Route::middleware('auth')->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/logout','HomeController@logout')->name('logout');

//  School Routes
	Route::resource('school','SuperAdmin\SchoolController');

// Admin Routes
	Route::get('admin/create','SuperAdmin\AdminController@create')->name('admin.create');
});


	


