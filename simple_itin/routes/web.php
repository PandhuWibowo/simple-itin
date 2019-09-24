<?php

//Kenalin PHP di bawah 7.2 pada hosting
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

//Kalau mau hapus cache di hosting
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//Index
Route::get("/", function(){
    return redirect("login");
});
//Segala macam auth disini
Auth::routes();

//Halaman Home

//Start
Route::get('/backend/home', 'HomeController@index');

Route::namespace("Dashboard")->group(function(){
    Route::prefix("/backend")->group(function (){

        //Bagian Dashboard Kota
        Route::prefix("/cities")->group(function(){
            Route::get("/","KotaController@index");
            Route::put("update","KotaController@update");
            Route::delete("delete","KotaController@destroy");
            Route::post("store","KotaController@store");
        });

        //Bagian Dashboard Jenis Penginapan
        Route::prefix("/accomodation-types")->group(function (){
            Route::get("/","JenisPenginapanController@index");
            Route::put("update","JenisPenginapanController@update");
            Route::delete("delete","JenisPenginapanController@destroy");
            Route::post("store","JenisPenginapanController@store");
        });

    });
});
//End


