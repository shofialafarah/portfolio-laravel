<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReaction extends Model
{
    protected $fillable = [
        'comment_id',
        'reaction',
        'ip_address'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
