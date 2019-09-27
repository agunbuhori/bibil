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
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('verified');

// Route For admin
Route::middleware(['verified', 'roles:admin'])->group(function () {
    
    // Guru
    Route::resource('guru', 'GuruController')->except(['create']);
    Route::post('/guru/reset/password', 'GuruController@password')->name('guru.password');
    
    // Siswa
    Route::resource('siswa', 'SiswaController')->except(['create']);
    Route::post('/siswa/reset/password', 'SiswaController@password')->name('siswa.password');

    // Jurusan
    Route::resource('jurusan', 'JurusanController')->except(['show', 'create']);
    
    // Kelas
    Route::resource('kelas', 'KelasController')->except(['show', 'create']);

    // Ajax
    Route::get('/ajax/kelas', 'AjaxController@kelas')->name('ajax.kelas');
    Route::get('/ajax/mapel', 'AjaxController@mapel')->name('ajax.mapel');
});

Route::middleware(['verified', 'roles:guru'])->group(function () {
    //
});

Route::middleware(['verified', 'roles:siswa'])->group(function () {
   
    // Jadwal Ujian
    Route::get('/jadwal/ujian', 'UjianController@jadwal')->name('jadwal');
    
    // Mata Pelajaran
    Route::get('/mata/pelajaran', 'MapelController@mapel')->name('mapel');
    
    // Ujian Online
    Route::get('/ujian/online', 'OnlineController@index')->name('ujian.online');
    Route::get('/ujian/play/{id_ujian}', 'OnlineController@play')->name('ujian.play');
    Route::get('/ujian/online/selesai/{id_jawaban}', 'OnlineController@selesai')->name('ujian.online.selesai');
    Route::post('/ujian/online/{id_soal}', 'OnlineController@store')->name('ujian.online.store');

    // Hasil Ujian
    Route::get('/nilai/siswa/view', 'NilaiController@siswa')->name('nilai.siswa');

});

// Route for admin and guru
Route::middleware(['verified', 'roles:admin,guru'])->group(function () {

    // Mapel
    Route::resource('mapel', 'MapelController')->except(['show', 'create']);

    // Ujian
    Route::resource('ujian', 'UjianController')->except(['create']);

    // Soal
    Route::resource('soal', 'SoalController')->except(['create', 'show']);
    
    // Kisi kisi
    Route::resource('kisi', 'KisiController')->except(['show', 'create']);
});

// Route for admin and guru
Route::middleware(['verified', 'roles:guru'])->group(function () {

    // Koreksi Soal
    Route::resource('koreksi', 'KoreksiController')->except(['create', 'destroy', 'edit', 'update']);

    // Nilai Siswa
    Route::get('/nilai/guru/view', 'NilaiController@guru')->name('nilai.guru');
    Route::get('/nilai/guru/view/detail/{id}', 'NilaiController@gurudetail')->name('nilai.guru.detail');

});