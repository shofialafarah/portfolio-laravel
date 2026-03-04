<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Headline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // --- LOGIKA BIODATA ---

    public function edit()
    {
        $profile = Profile::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Shofia Nabila Elfa Rahma',
                'about' => 'Informatics Engineering Graduate'
            ]
        );

        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $request->validate([
            'name'  => 'required|string|max:255',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $profile->name  = $request->name;
        $profile->about = $request->about;

        if ($request->hasFile('photo')) {
            if ($profile->photo && Storage::disk('s3')->exists($profile->photo)) {
                Storage::disk('s3')->delete($profile->photo);
            }
            $profile->photo = $request->file('photo')->store('profile', 's3');
        }

        $profile->save();
        return redirect()->back()->with('success', 'Profile berhasil diperbarui');
    }

    // --- LOGIKA HEADLINE ---

    public function headlineIndex()
    {
        $headlines = Headline::orderBy('order')->get();
        return view('admin.profiles.headline', compact('headlines'));
    }

    public function headlineStore(Request $request)
    {
        $request->validate(['text' => 'required|string|max:255']);

        Headline::create([
            'text' => $request->text,
            'is_active' => true,
            'order' => Headline::max('order') + 1,
        ]);

        return back()->with('success', 'Headline ditambahkan');
    }

    public function headlineUpdate(Request $request, Headline $headline)
    {
        if ($request->has('toggle')) {
            if ($headline->is_active && Headline::where('is_active', true)->count() === 1) {
                return back()->withErrors('Minimal harus ada 1 headline aktif');
            }
            $headline->update(['is_active' => !$headline->is_active]);
            return back();
        }

        $request->validate(['text' => 'required|string|max:255']);
        $headline->update($request->only('text'));
        return back()->with('success', 'Headline diperbarui');
    }

    public function headlineDestroy(Headline $headline)
    {
        $headline->delete();
        return back()->with('success', 'Headline dihapus');
    }

    public function headlineReorder(Request $request)
{
    $ids = $request->ids;

    if ($ids) {
        foreach ($ids as $index => $id) {
            // Kita update posisi 'order' berdasarkan urutan array yang dikirim JS
            \App\Models\Headline::where('id', $id)->update(['order' => $index + 1]);
        }
        return response()->json(['message' => 'Urutan berhasil diperbarui!'], 200);
    }

    return response()->json(['message' => 'Gagal memperbarui urutan.'], 400);
}
}
