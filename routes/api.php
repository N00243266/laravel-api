<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EntryController;

Route::get('/entries', [EntryController::class, 'index']);
Route::get('/entries/{id}', [EntryController::class, 'show']);