<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        require __DIR__ . '/Api/V1/Contacts.php';
        require __DIR__ . '/Api/V1/Emails.php';
        require __DIR__ . '/Api/V1/Numbers.php';
    });
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

