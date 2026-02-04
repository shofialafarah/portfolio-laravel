<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'message' => 'required',
        ]);

        Comment::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}
