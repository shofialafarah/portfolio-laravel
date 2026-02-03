<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certification extends Model
{
    protected $fillable = [
        'title',
        'issuer',
        'year',
        'image',
        'is_active'
    ];
}
