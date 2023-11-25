<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::view('kamar', 'kamar')->name('kamar');

Route::group([
    'prefix'=>config('admin.path'),
], function(){
    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::group(['middleware'=>'auth:admin'], function(){
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');

        Route::view('/','layouts.dashboard')->name('dashboard');
        Route::get('/akun', 'Admincontroller@akun')->name('admin.akun');
        Route::put('/akun', 'Admincontroller@updateAkun');
        Route::delete('/admin/delete/{admin}','Admincontroller@destroy')->name('admin.delete');

        Route::group(['middleware'=>['can:role,"admin"']], function(){
           Route::resource('admin','Admincontroller');
           Route::delete('/admin/delete/{admin}','Admincontroller@destroy')->name('admin.delete');
           Route::resource('kamar','KamarController');
        });
       
    });
});



