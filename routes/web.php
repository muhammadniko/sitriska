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

Route::get('/administrator/login', 'User_Controller@show_login_page')->middleware('guest');
Route::post('/administrator/authenticate', 'User_Controller@login_auth');

Route::middleware(['auth:users'])->group(function() {
    Route::get('/administrator', 'User_Controller@show_dashboard_page');
    Route::get('/administrator/permukiman', 'Lokasi_Controller@displayDataLokasi');
    Route::post('/administrator/permukiman/add-new', 'Lokasi_Controller@add_new_lokasi');
    Route::post('/administrator/permukiman/update', 'Lokasi_Controller@update_lokasi');
    Route::get('/administrator/permukiman/remove/{kode_pos}', 'Lokasi_Controller@remove_lokasi');
    Route::get('/administrator/tingkat-risiko',  'Score_Controller@index');
    Route::get('/administrator/tingkat-risiko/kalkulasi-skor', 'Score_Controller@new_score');
    Route::get('/administrator/tingkat-risiko/hasil-kalkulasi', 'Score_Controller@getScore');
    Route::get('/administrator/logout', 'User_Controller@logout');
});

Route::get('/', 'Lokasi_Controller@index');
Route::get('/lokasi-permukiman', 'Lokasi_Controller@displayDataLokasi');
Route::get('/skor-risiko-kebakaran', 'Score_Controller@getScore');




