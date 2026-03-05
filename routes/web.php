<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/artworks/{file}', function ($file) {
    $path = public_path('artworks/' . $file);

    if (!file_exists($path)) abort(404);

    return Response::file($path, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, OPTIONS',
        'Access-Control-Allow-Headers' => 'Origin, Content-Type, Accept, Authorization',
    ]);
})->where('file', '.*');