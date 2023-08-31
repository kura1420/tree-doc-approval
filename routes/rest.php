<?php

use App\Http\Controllers\Rest\DocumentController;
use App\Http\Controllers\Rest\MenuController;
use App\Http\Controllers\Rest\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('profile')
    ->as('rest-profile.')
    ->controller(ProfileController::class)
    ->group(function () {
        Route::post('/', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

Route::prefix('menu')
    ->as('menu.')
    ->controller(MenuController::class)
    ->group(function () {
        Route::post('/', 'index')->name('index');
    });

Route::apiResource('document', DocumentController::class);