<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Skill::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $skills = $query->get();

        // JIKA AJAX → BALIKIN PARTIAL
        if ($request->ajax()) {
            return view('admin.skills.partials.skill-cards', compact('skills'))->render();
        }

        // JIKA NORMAL LOAD
        return view('admin.skills.index', compact('skills'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:skills,name',
            'category' => 'required|in:design,web,office',
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $extension = $request->file('icon')->getClientOriginalExtension();
        $filename = $this->makeFilename($request->input('name'), $extension);

        if (Storage::disk('s3')->exists('skills/' . $filename)) {
            return redirect()->back()
                ->with('error', 'File icon untuk skill ini sudah ada.');
        }

        $path = $request->file('icon')->storeAs('skills', $filename, 's3');

        Skill::create([
            'name' => $request->name,
            'category' => $request->category,
            'icon' => $path,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill baru berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:skills,name,' . $skill->id,
            'category' => 'required|in:design,web,office',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        $skill->name = $request->input('name');
        $skill->category = $request->category;

        if ($request->hasFile('icon')) {
            // 1. Buat nama file baru dulu berdasarkan input name
            $extension = $request->file('icon')->getClientOriginalExtension();
            $filename = 'logo_' . strtolower(str_replace(' ', '_', $request->input('name'))) . '.' . $extension;
            $newPath = 'skills/' . $filename; // Gabungkan folder dan filename

            // 2. Cek apakah file baru ini SUDAH ADA di S3
            if (Storage::disk('s3')->exists($newPath) && $newPath !== $skill->icon) {
                return redirect()->back()
                    ->with('error', 'File icon untuk skill ini sudah ada di storage. Gunakan nama lain atau hapus file manual.');
            }

            // 3. Hapus file lama jika ada
            if ($skill->icon && Storage::disk('s3')->exists($skill->icon)) {
                Storage::disk('s3')->delete($skill->icon);
            }

            // 4. Upload file baru
            $path = $request->file('icon')->storeAs('skills', $filename, 's3');
            $skill->icon = $path;
        }
        $skill->save();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);

        //Hapus file icon dari storage
        if (Storage::disk('s3')->exists($skill->icon)) {
            Storage::disk('s3')->delete($skill->icon);
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus');
    }

    private function makeFilename($name, $extension)
    {
        return 'logo_' . strtolower(str_replace(' ', '_', $name)) . '.' . $extension;
    }
}
