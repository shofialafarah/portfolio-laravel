<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $fillable = [
        'text',
        'is_active',
        'order',
    ];

    // Tambahkan ini untuk mengatasi error PostgreSQL tadi
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}