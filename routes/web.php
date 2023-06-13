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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', 'PageController@beranda');
    Route::get('/profil', 'PageController@profil');
    Route::get('/mahasiswa', 'PageController@mahasiswa');
    Route::get('/kontak', 'PageController@kontak');

    Route::get('/mahasiswa/pencarian', 'PageController@pencarian');
    Route::get('/mahasiswa/formtambah', 'PageController@tambah');
    Route::post('/mahasiswa/simpan', 'PageController@simpan');
    Route::get('/mahasiswa/formubah/{nim}', 'PageController@ubah');
    Route::put('/mahasiswa/update/{nim}', 'PageController@update');
    Route::get('/mahasiswa/delete/{nim}', 'PageController@delete');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', 'AuthController@register');
    Route::post('/simpan', 'AuthController@simpan');
    Route::get('/', 'AuthController@login')->middleware('guest')->name('login');
    Route::post('/ceklogin', 'AuthController@ceklogin');
    
});

Route::get('/index', function(){
    return view('index');
})->middleware('guest');

// Route::get('/', function () {
//     return view('wellcome');
// });
