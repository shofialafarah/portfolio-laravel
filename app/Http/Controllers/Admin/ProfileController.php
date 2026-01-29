<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        // Validasi
        $request->validate([
            'name'  => 'required|string|max:255',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update text
        $profile->name  = $request->name;
        $profile->about = $request->about;

        // Update foto (jika ada)
        if ($request->hasFile('photo')) {

            // hapus foto lama
            if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }

            // simpan foto baru
            $profile->photo = $request->file('photo')
                ->store('profile', 'public');
        }

        // Simpan ke database
        $profile->save();

        return redirect()->back()
            ->with('success', 'Profile berhasil diperbarui');
    }
}
