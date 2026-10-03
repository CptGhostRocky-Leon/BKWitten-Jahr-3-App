<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/offline', 'offline')->name('offline');

Route::view('/faq', 'faq')->name('faq');
