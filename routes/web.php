<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\codingup;
use App\Http\Controllers\codingup2023;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/codingup', [codingup::class, 'index']);
Route::get('/codingup/2023', [codingup2023::class, 'index']);

