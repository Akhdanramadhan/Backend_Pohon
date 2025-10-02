<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PohonController;
use App\Http\Controllers\PemilikPohonController;

Route::apiResource('pohon', PohonController::class);
Route::apiResource('pemilik-pohon', PemilikPohonController::class);
