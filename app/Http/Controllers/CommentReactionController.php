<?php

namespace App\Http\Controllers;

use App\Models\CommentReaction;
use Illuminate\Http\Request;

class CommentReactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'reaction' => 'required|string|max:20',
        ]);

        CommentReaction::create([
            'comment_id' => $request->comment_id,
            'reaction' => $request->reaction,
            'ip_address' => $request->ip(),
        ]);

        return back();
    }
}
