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

Route::get('/administrator/login', 'User_Controller@displayLoginPage')->middleware('guest');
Route::post('/administrator/authenticate', 'User_Controller@loginAuth');

Route::middleware(['auth:users'])->group(function() {
    Route::get('/administrator', 'User_Controller@index');
    Route::get('/administrator/permukiman', 'Lokasi_Controller@displayDataLokasi');
    Route::post('/administrator/permukiman/add-new', 'Lokasi_Controller@saveDataLokasi');
    Route::post('/administrator/permukiman/update', 'Lokasi_Controller@updateDataLokasi');
    Route::get('/administrator/permukiman/remove/{kode_pos}', 'Lokasi_Controller@removeDataLokasi');
    Route::get('/administrator/tingkat-risiko',  'Score_Controller@index');
    Route::get('/administrator/tingkat-risiko/kalkulasi-skor', 'Score_Controller@saveScoreLokasi');
    Route::get('/administrator/tingkat-risiko/hasil-kalkulasi', 'Score_Controller@getScoreLokasi');
    Route::get('/administrator/logout', 'User_Controller@logout');
});

Route::get('/', 'Lokasi_Controller@index');
Route::get('/lokasi-permukiman', 'Lokasi_Controller@displayDataLokasi');
Route::get('/skor-risiko-kebakaran', 'Score_Controller@getScoreLokasi');
Route::get('/grafik-tingkat-risiko', 'Score_Controller@displayChart');





