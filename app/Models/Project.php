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

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Tambahkan ini: Memaksa nilai menjadi boolean murni sebelum masuk ke Query Builder
    public function setIsActiveAttribute($value)
    {
        // PostgreSQL sangat suka string 'true' atau 'false' jika integer ditolak
        $this->attributes['is_active'] = filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
    }
}
