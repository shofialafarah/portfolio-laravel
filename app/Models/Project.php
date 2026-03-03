<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'is_active',
        'link_deploy',
        'link_github',
        'tech_stack',
    ];
    // Tambahkan ini agar Laravel otomatis konversi tipe data
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
