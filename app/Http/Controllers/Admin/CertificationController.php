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
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'issuer'    => 'nullable|string|max:255',
            'year'      => 'nullable|digits:4',
            'image'     => 'required|image|max:2048',
            'is_active' => 'boolean',
        ]);

        // === BUILD FILE NAME ===
        $title  = Str::slug($request->title);
        $issuer = $request->issuer
            ? Str::slug($request->issuer)
            : 'unknown';
        $year   = $request->year ?? 'year';

        $extension = $request->file('image')->getClientOriginalExtension();

        $filename = "{$title}_{$issuer}_{$year}.{$extension}";

        // === STORE IMAGE ===
        $path = $request->file('image')
            ->storeAs('certifications', $filename, 'public');

        $data['image'] = $path;

        Certification::create($data);

        return redirect()
            ->route('admin.certifications.index')
            ->with('success', 'Sertifikat berhasil ditambahkan');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'issuer'    => 'nullable|string|max:255',
            'year'      => 'nullable|digits:4',
            'image'     => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {

            // hapus file lama
            Storage::disk('public')->delete($certification->image);

            $title  = Str::slug($request->title);
            $issuer = $request->issuer
                ? Str::slug($request->issuer)
                : 'unknown';
            $year   = $request->year ?? 'year';

            $extension = $request->file('image')->getClientOriginalExtension();

            $filename = "{$title}_{$issuer}_{$year}.{$extension}";

            $data['image'] = $request->file('image')
                ->storeAs('certifications', $filename, 'public');
        }

        $certification->update($data);

        return redirect()
            ->route('admin.certifications.index')
            ->with('success', 'Sertifikat berhasil diupdate');
    }

    public function destroy(Certification $certification)
    {
        Storage::disk('public')->delete($certification->image);
        $certification->delete();

        return back()->with('success', 'Sertifikat berhasil dihapus');
    }
}
