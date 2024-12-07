<?php

use Illuminate\Support\Facades\Route;


Route::get('/{any?}', function () {
    return view('app');
})->where('any', '.*');

Route::get('/admin/{any?}', function () {
    return view('admin');
})->where('any', '.*');

Route::get('/author/{any?}', function () {
    return view('author');
})->where('any', '.*');