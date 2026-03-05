<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image_url'
    ];

    public function getImageUrlAttribute($value)
    {
        return str_replace('\\', '/', $value);
    }
}