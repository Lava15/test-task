<?php

use App\Http\Controllers\Api\V1\Numbers\DeleteController;
use App\Http\Controllers\Api\V1\Numbers\IndexController;
use App\Http\Controllers\Api\V1\Numbers\ShowController;
use App\Http\Controllers\Api\V1\Numbers\StoreController;
use App\Http\Controllers\Api\V1\Numbers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')
    ->as('contact-numbers:')
    ->group(function () {
        Route::get('/{contact}/numbers', IndexController::class)->name('index');
        Route::get('/{contact}/numbers{number}', ShowController::class)->name('show');
        Route::post('/{contact}/numbers', StoreController::class)->name('store');
        Route::put('{contact}/numbers/{number}', UpdateController::class)->name('update');
        Route::delete('/{contact}/numbers/{number}', DeleteController::class)->name('delete');
    });
