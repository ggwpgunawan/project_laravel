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

    // return view('home');
    return redirect('/dashboard');
    
});
//Route::get('home', function () {
//   return view ('home') ;
//});

Route::get('/web', 'webcontroller@home');
Route::get('/web/tentang', 'webcontroller@tentang');
Route::get('/web/kontak', 'webcontroller@kontak');

Route::get('/dashboard','DashboardController@index')
    ->middleware('auth');; // << perintah ini aja
    // ini halaman bisa diakses jika sdh login, kalo blm di arahkan ke hal lofin

Route::get('/unit','unitController@index');
Route::post('/unit/create','unitController@create');
Route::get('/unit/{id}/edit','unitController@edit');
Route::post('/unit/{id}/update','unitController@update');
Route::get('/unit/{id}/delete','unitController@delete');

Route::get('/vendor','vendorController@index');
Route::post('/vendor/create','vendorController@create');
Route::get('/vendor/{id}/edit','vendorController@edit');
Route::post('/vendor/{id}/update','vendorController@update');
Route::get('/vendor/{id}/delete','vendorController@delete');


Route::get('/produk','produkController@index'); 
Route::post('/produk','produkController@store'); 
Route::get('/produk/{id}/edit','produkController@edit');
Route::post('/produk/{id}/update','produkController@update');
Route::get('/produk/{id}/delete','produkController@delete');

Route::get('/kategoriproduk','kategoriprodukController@index');
Route::post('/kategoriproduk','kategoriprodukController@store');
Route::get('/kategoriproduk/{id}/edit','kategoriprodukController@edit');
Route::post('/kategoriproduk/{id}/update','kategoriprodukController@update');
Route::get('/kategoriproduk/{id}/delete','kategoriprodukController@delete');

Route::get('/layanan','layananController@index');
Route::post('/layanan','layananController@store'); 
Route::get('/layanan/{id}/edit','layananController@edit');
Route::post('/layanan/{id}/update','layananController@update');
Route::get('/layanan/{id}/delete','layananController@delete');

Route::get('/kategorilayanan','kategorilayananController@index');
Route::post('/kategorilayanan','kategorilayananController@store');
Route::get('/kategorilayanan/{id}/edit','kategorilayananController@edit');
Route::post('/kategorilayanan/{id}/update','kategorilayananController@update');
Route::get('/kategorilayanan/{id}/delete','kategorilayananController@delete');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/dashboard');    
})->name('home')->middleware('auth'); // << sama ini juga

Route::get('view-data', 'AuthorizationController@viewData');
Route::get('create-data', 'AuthorizationController@createData');
Route::get('edit-data', 'AuthorizationController@editData');
Route::get('update-data', 'AuthorizationController@updateData');
Route::get('delete-data', 'AuthorizationController@deleteData');

// pakai resource supaya cepat n
Route::resource('/produkperform','produkperformController');
//Route::resource('/vendorproject','vendorprojectController');
Route::resource('/maintenance','maintenanceController');

Route::get('/vendorproject','vendorprojectController@index')->name('vendorproject.index');
Route::get('/json-layanan','vendorprojectController@layanan');
Route::get('/vendorproject/create','vendorprojectController@create');
Route::post('/vendorproject','vendorprojectController@store')->name('vendorproject.store');
Route::get('/vendorproject/{id}/edit','vendorprojectController@edit');
Route::post('/vendorproject/{id}/update','vendorprojectController@update');
Route::get('/vendorproject/{id}/delete','vendorprojectController@destroy');