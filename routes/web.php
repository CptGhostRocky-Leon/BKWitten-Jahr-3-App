<?php

use App\Livewire\NeueInfoAnlegen;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/neue-info-anlegen', NeueInfoAnlegen::class) ->name('info.anlegen');
Route::view('/offline', 'offline')->name('offline');

Route::view('/faq', 'faq')->name('faq');
