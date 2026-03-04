<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::latest()->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'issuer'    => 'nullable|string|max:255',
            'year'      => 'nullable|digits:4',
            'image'     => 'required|image|max:2048',
        ]);

        // === BUILD FILE NAME ===
        $title  = Str::slug($request->title);
        $issuer = $request->issuer ? Str::slug($request->issuer) : 'unknown';
        $year   = $request->year ?? 'year';
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = "{$title}_{$issuer}_{$year}_" . time() . ".{$extension}";

        // === STORE TO S3 (SUPABASE) ===
        $path = $request->file('image')->storeAs('certifications', $filename, 's3');

        // === SAVE MANUALLY (SAFE FOR POSTGRESQL) ===
        $certification = new Certification();
        $certification->title = $request->title;
        $certification->issuer = $request->issuer;
        $certification->year = $request->year;
        $certification->image = $path;
        $certification->is_active = true; // Paksa boolean murni
        $certification->save();

        return redirect()
            ->route('admin.certifications.index')
            ->with('success', 'Sertifikat berhasil ditambahkan ke cloud!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'issuer'    => 'nullable|string|max:255',
            'year'      => 'nullable|digits:4',
            'image'     => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file lama dari S3
            if ($certification->image && Storage::disk('s3')->exists($certification->image)) {
                Storage::disk('s3')->delete($certification->image);
            }

            $title  = Str::slug($request->title);
            $issuer = $request->issuer ? Str::slug($request->issuer) : 'unknown';
            $year   = $request->year ?? 'year';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = "{$title}_{$issuer}_{$year}_" . time() . ".{$extension}";

            $path = $request->file('image')->storeAs('certifications', $filename, 's3');
            $certification->image = $path;
        }

        $certification->title = $request->title;
        $certification->issuer = $request->issuer;
        $certification->year = $request->year;
        $certification->is_active = $request->has('is_active') ? true : false;
        $certification->save();

        return redirect()
            ->route('admin.certifications.index')
            ->with('success', 'Sertifikat berhasil diperbarui');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->image && Storage::disk('s3')->exists($certification->image)) {
            Storage::disk('s3')->delete($certification->image);
        }

        $certification->delete();
        return back()->with('success', 'Sertifikat berhasil dihapus');
    }
}
