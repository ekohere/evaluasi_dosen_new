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



Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/evaluasi_dosen', 'EvaluasiDosenController@index');
    Route::post('/evaluasi_dosen', 'EvaluasiDosenController@store');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::resource('admin/pertanyaan', 'PertanyaanController');
    Route::resource('admin/jenis_pertanyaan', 'JenisPertanyaanController');
    Route::resource('admin/hasil_evaluasi_dosen', 'HasilEvaluasiDosenController');
    Route::resource('admin/hasil_evaluasi_has_pertanyaan', 'HasilEvaluasiDosenHasPertanyaanController');
});

Route::get('isi_evaluasi/{mhs_id}','HomeController@getIsiEvaluasi');