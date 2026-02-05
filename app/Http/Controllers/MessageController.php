<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|min:10',
        ]);

        // Simpan ke database
        $msg = Message::create($data);

        // Kirim email ke admin
        try {
            Mail::raw(
                "Email dari: {$data['email']}\nNo. Telepon: {$data['phone']}\n\nPesan:\n{$data['message']}",
                function ($message) use ($data) {
                    $message->to('shofialafarah@gmail.com')
                            ->subject('Pesan Baru dari Portfolio')
                            ->from($data['email']);
                }
            );
        } catch (\Exception $e) {
            // Jika email gagal, tetap return success karena sudah tersimpan di DB
            Log::error('Email send failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.'
        ]);
    }
}
