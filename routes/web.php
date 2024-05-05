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
    return view('welcomeasli');
});

Route::get('menu1','Menu1controller@index');

Route::get('role',[
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
    ]);

Route::get('blade','TestController@blade');

Route::get('nomor/{id}',function($id){
    echo 'nomor: '.$id;
    });

Route::get('tambah','TestController@tambah');
Route::post('prosestambah','TestController@prosestambah');
Route::get('tesform','TestController@form');
Route::get('kali','TestController@kali');
Route::post('proseskali','TestController@proseskali');
Route::resource('mahasiswa','Mycontroller');
Route::get('satuan','TestController@satuan');
Route::resource('barang','BarangController');
Route::resource('pelanggan','PelangganController');
Route::resource('jual','JualController');
Route::get('deletejual/{nobukti}','JualController@deletejual');
Route::get('deletejualdetail/{idjualdetail}','JualController@deletejualdetail');
Route::resource('mahasiswa','MhsController');
Route::get('deletedatamhs/{id}','MhsController@deletedatamhs');
