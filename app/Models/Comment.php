<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'message',
        'parent_id',
        'avatar'
    ];

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
                    ->with('replies', 'reactions')
                    ->orderBy('created_at', 'asc');
    }

    public function reactions()
    {
        return $this->hasMany(CommentReaction::class);
    }
}
