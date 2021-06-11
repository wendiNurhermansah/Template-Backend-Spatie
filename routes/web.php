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

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('MasterRole')->namespace('masterRole')->name('MasterRole.')->group(function(){
    //role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('role.addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');


    //permissions
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/api', 'PermissionsController@api')->name('permissions.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');
});

Route::prefix('Perusahaan')->namespace('perusahaan')->name('Perusahaan.')->group(function(){
    Route::resource('data_perusahaan', 'PerusahaanController');
    Route::post('data_perusahaan/api', 'PerusahaanController@api')->name('data_perusahaan.api');

    Route::get('kabupatenByProvinsi/{id}', 'PerusahaanController@kabupatenByProvinsi')->name('kabupatenByProvinsi');
    Route::get('kecamatanByKabupaten/{id}', 'PerusahaanController@kecamatanByKabupaten')->name('kecamatanByKabupaten');
    Route::get('kelurahanByKecamatan/{id}', 'PerusahaanController@kelurahanByKecamatan')->name('kelurahanByKecamatan');

    Route::get('data_perusahaanExcel', 'PerusahaanController@excel')->name('data_perusahaan.data_perusahaanExcel');
    Route::get('export_excel', 'PerusahaanController@export_excel')->name('data_perusahaan.export_excel');

});




