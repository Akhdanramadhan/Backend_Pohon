<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikPohonController;
use App\Http\Controllers\PohonController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pemilik', PemilikPohonController::class);
Route::resource('pohon', PohonController::class);
