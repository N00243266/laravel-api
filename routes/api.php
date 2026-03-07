<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\EntryController;

Route::get('/entries', [EntryController::class, 'index']);
Route::get('/entries/{id}', [EntryController::class, 'show']);

Route::get('/artwork-file/{file}', function ($file) { // Route to serve artwork files with CORS headers
   $path = public_path('artworks/' . $file);
   if (!file_exists($path)) {
       abort(404);
   }
   return Response::file($path, [
       'Access-Control-Allow-Origin' => '*',
       'Access-Control-Allow-Methods' => 'GET, OPTIONS',
       'Access-Control-Allow-Headers' => 'Origin, Content-Type, Accept, Authorization',
   ]);
})->where('file', '.*');