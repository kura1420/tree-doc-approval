<?php

use App\Http\Controllers\Page\DocumentController;
use Illuminate\Support\Facades\Route;

Route::prefix('document')
    ->as('mobile-document.')
    ->controller(DocumentController::class)
    ->group(function () {
        Route::get('/{id}/{filename}', 'viewFile')->name('view-file');
    });