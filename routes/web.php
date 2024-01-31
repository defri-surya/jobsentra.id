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

Route::get('/', 'FrontController@homepage')->name('welcome');
Route::get('/ktpekerjaan', 'FrontController@ktpekerjaan')->name('ktpekerjaan');
Route::get('/halamanloker', 'FrontController@halamanloker')->name('halamanloker');
Route::get('/pelatihan', 'FrontController@pelatihan')->name('pelatihan');
Route::get('/assesment', 'FrontController@assesment')->name('assesment');
Route::get('/detailloker/{code}', 'FrontController@detailloker')->name('detailloker');
Route::get('/detaillokerfavorit/{code}', 'FrontController@detaillokerfavorit')->name('detaillokerfavorit');

// multiple search
Route::get('/search', 'FrontController@search')->name('search');

// single search
Route::get('/searchByKategori', 'FrontController@searchByKategori')->name('searchByKategori');
Route::get('/searchByKategorihalaman', 'FrontController@searchByKategorihalaman')->name('searchByKategorihalaman');



Route::get('login', function () {
    return view('auth.login');
});

Route::get('register/company', 'FrontController@register_company')->name('register.company');
Route::get('register/member', 'FrontController@register_member')->name('register.member');

// Route::get('produk', 'FrontController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth' => 'CekRole:admin']], function () {
    Route::namespace('Admin')->group(function () {
        Route::get('partnership', 'PartnershipController@create')->name('partnership.create');
        Route::post('partnership', 'PartnershipController@store')->name('partnership.store');
        Route::get('partnership/{id}/edit', 'PartnershipController@edit')->name('partnership.edit');
        Route::put('partnership/{id}', 'PartnershipController@update')->name('partnership.update');
        Route::get('partnership/{id}', 'PartnershipController@show')->name('partnership.show');
        Route::delete('partnership/{id}', 'PartnershipController@destroy')->name('partnership.destroy');
        Route::get('dataperusahaan', 'DataPerusahaanController@index')->name('dataperusahaan.index');
        Route::get('dataperusahaan/{id}', 'DataPerusahaanController@show')->name('dataperusahaan.show');
        Route::put('dataperusahaan/update/{id}/{key}', 'DataPerusahaanController@update');
        Route::put('dataperusahaan/unFavorit/{id}/{key}', 'DataPerusahaanController@hapus_favorit');
        Route::put('dataperusahaan/verifikasi/{id}', 'DataPerusahaanController@verifikasi')->name('verifikasi');
        Route::resource('datapencaker', 'DataPencakerController');
        Route::resource('datakatagoripekerjaan', 'DataKatagoripekerjaanController');

        Route::get('datalokerfavorit', 'DataLokerfavoritController@index')->name('datalokerfavorit.index');

        //Search
        Route::get('searchloker/{id}', 'DataPerusahaanController@search')->name('search.loker');
        Route::get('searchcompany', 'DataPerusahaanController@search_company')->name('search.company');
        Route::get('searchpencaker', 'DataPencakerController@search')->name('search.pencaker');
        Route::get('searchlokerfavorit', 'DataLokerfavoritController@search')->name('search.loker.favorit');

        // Route::resource('datalokerfavorit', 'DataLokerfavoritController');

        // Route::resource('datapencaker', 'DataPencakerController');
    });
});

Route::group(['middleware' => ['auth' => 'CekRole:member']], function () {
    Route::namespace('Pencaker')->group(function () {
        Route::get('infocv', 'PencakerController@index')->name('infocv');
        Route::get('exportpdf', 'PencakerController@exportpdf')->name('exportpdf');
        Route::get('print', 'PencakerController@print')->name('print');
        Route::get('settingcv', 'PencakerController@create')->name('settingcv');
        Route::post('savecv', 'PencakerController@store')->name('savecv');
        Route::get('editcv/{id}', 'PencakerController@edit')->name('editcv');
        Route::put('updatecv/{id}', 'PencakerController@update')->name('updatecv');
        Route::get('lamaranku', 'PencakerController@lamaranku')->name('lamaranku');
        Route::post('applyjob/{id}', 'ApplyjobController@store')->name('applyjob.store');
        Route::get('detailLowongan/{code}', 'PencakerController@show')->name('detailLowongan');
    });
});

Route::group(['middleware' => ['auth' => 'CekRole:company']], function () {
    Route::namespace('Perusahaan')->group(function () {
        Route::get('listpelamar/{id}', 'PerusahaanController@index')->name('listpelamar');
        Route::get('buatloker', 'LokerController@create')->name('buatloker');
        Route::post('saveloker', 'LokerController@store')->name('saveloker');
        Route::get('editloker/{id}', 'LokerController@edit')->name('editloker');
        Route::put('updateloker/{id}', 'LokerController@update')->name('updateloker');
        Route::delete('deleteloker/{id}', 'LokerController@destroy')->name('deleteloker');
        Route::get('profilecompany', 'PerusahaanController@profile')->name('profilecompany');
        Route::get('settingprofile', 'PerusahaanController@create')->name('settingprofile');
        Route::post('saveprofil', 'PerusahaanController@store')->name('saveprofil');
        Route::get('editprofile/{id}', 'PerusahaanController@edit')->name('editprofile');
        Route::put('updateprofile/{id}', 'PerusahaanController@update')->name('updateprofile');
        Route::get('pelamar/{id}', 'PelamarController@index')->name('pelamar');
        Route::put('lanjut/{id}', 'PelamarController@lanjut')->name('lanjut');
        Route::put('ditolak/{id}', 'PelamarController@ditolak')->name('ditolak');
        Route::put('diterima/{id}', 'PelamarController@diterima')->name('diterima');
    });
});
