<?php


use App\Http\Controllers\Api\V1\Contacts\DeleteController;
use App\Http\Controllers\Api\V1\Contacts\IndexController;
use App\Http\Controllers\Api\V1\Contacts\SearchController;
use App\Http\Controllers\Api\V1\Contacts\ShowController;
use App\Http\Controllers\Api\V1\Contacts\StoreController;
use App\Http\Controllers\Api\V1\Contacts\UpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')
    ->as('contacts:')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{contact}', ShowController::class)->name('show');
        Route::get('/search/{keyword}', SearchController::class)->name('search');
        Route::put('/edit/{contact}', UpdateController::class)->name('update');
        Route::delete('/{contact}', DeleteController::class)->name('delete');
        Route::post('/', StoreController::class)->name('store');
    });
