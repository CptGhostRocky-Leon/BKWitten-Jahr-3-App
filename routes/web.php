<?php

use App\Livewire\NeueInfoAnlegen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsFeedController;


Route::get('/', [NewsFeedController::class, 'index'])
    ->name('home');


Route::get('/neue-info-anlegen', NeueInfoAnlegen::class) ->name('info.anlegen');
Route::view('/offline', 'offline')->name('offline');

Route::view('/faq', 'faq')->name('faq');

