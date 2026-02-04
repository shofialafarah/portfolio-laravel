<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentReaction;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|max:255',
            'message'   => 'required',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create($data);

        return response()->json([
            'html' => view('partials.comment', compact('comment'))->render()
        ]);
    }

    public function reaction(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id'
        ]);

        // Cek apakah IP ini sudah pernah like comment ini
        $exists = CommentReaction::where('comment_id', $request->comment_id)
            ->where('ip_address', $request->ip())
            ->where('reaction', 'like')
            ->first();

        if ($exists) {
            // Jika sudah ada, hapus (unlike)
            $exists->delete();
        } else {
            // Jika belum, tambahkan like
            CommentReaction::create([
                'comment_id' => $request->comment_id,
                'reaction'   => 'like',
                'ip_address' => $request->ip(),
            ]);
        }

        // Hitung total like untuk comment ini
        $count = CommentReaction::where('comment_id', $request->comment_id)
            ->where('reaction', 'like')
            ->count();

        return response()->json([
            'count' => $count
        ]);
    }
}