<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'issuer',
        'year',
        'image',
        'is_active'
    ];

    // Menambah casting agar Laravel membacanya sebagai boolean
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Memaksa nilai menjadi boolean murni atau string 'true'/'false' 
     * agar PostgreSQL Supabase tidak bingung.
     */
    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}