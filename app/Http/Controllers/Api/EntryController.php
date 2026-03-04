<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Entry::latest()->get()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data' => Entry::findOrFail($id)
        ]);
    }
}
