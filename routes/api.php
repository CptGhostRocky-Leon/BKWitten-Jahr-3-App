<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InformationController;

Route::get('/test', function () {
    return [
        'message' => 'API is working!'
    ];
});

Route::get('/informationen', [InformationController::class, 'index']);
Route::get('/informationen/{information}', [InformationController::class, 'show']);
Route::post('/informationen', [InformationController::class, 'store']);