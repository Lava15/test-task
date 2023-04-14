<?php

use App\Http\Controllers\Api\V1\Emails\DeleteController;
use App\Http\Controllers\Api\V1\Emails\IndexController;
use App\Http\Controllers\Api\V1\Emails\ShowController;
use App\Http\Controllers\Api\V1\Emails\StoreController;
use App\Http\Controllers\Api\V1\Emails\UpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')
    ->as('contact-emails:')
    ->group(function () {
        Route::get('/{contact}/emails', IndexController::class)->name('index');
        Route::get('/{contact}/emails/{email}', ShowController::class)->name('show');
        Route::post('/{contact}/emails', StoreController::class)->name('store');
        Route::put('{contact}/emails/{email}', UpdateController::class)->name('update');
        Route::delete('/{contact}/emails/{email}', DeleteController::class)->name('delete');
    });
