<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'about',
        'photo',
        'cv_path',
        'instagram',
        'linkedin',
        'github',
        'behance',
    ];
}