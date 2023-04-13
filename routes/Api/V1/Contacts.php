<?php


use App\Http\Controllers\Api\V1\Contacts\IndexController;
use App\Http\Controllers\Api\V1\Contacts\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')
    ->as('contacts:')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::post('/', StoreController::class)->name('store');
    });
