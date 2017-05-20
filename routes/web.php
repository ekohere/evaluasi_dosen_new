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

Route::resource('admin/pertanyaan', 'PertanyaanController');
Route::resource('admin/jenis_pertanyaan', 'JenisPertanyaanController');
Route::resource('admin/hasil_evaluasi_dosen', 'HasilEvaluasiDosenController');
Route::resource('admin/hasil_evaluasi_dosen_has_pertanyaan', 'HasilEvaluasiDosenHasPertanyaanController');