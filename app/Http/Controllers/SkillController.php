<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all(); // untuk mengambil semua data skills
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

        if (Storage::disk('public')->exists('skills/' . $filename)) {
            return redirect()->back()
                ->with('error', 'File icon untuk skill ini sudah ada.');
        }

        $path = $request->file('icon')->storeAs('skills', $filename, 'public');

        Skill::create([
            'name' => $request->name,
            'icon' => $path,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan');
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

        if ($request->hasFile('icon')) {
            //Hapus file lama
            if (Storage::disk('public')->exists($skill->icon)) {
                Storage::disk('public')->delete($skill->icon);
            }


            //Simpan file baru dengan nama costum
            $extension = $request->file('icon')->getClientOriginalExtension();
            $filename = 'logo_' . strtolower(str_replace(' ', '_', $request->input('name'))) . '.' . $extension;

            //Cek kalau file sudah ada (hindari overwrite)
            if (Storage::disk('public')->exists('skills/' . $filename)) {
                return redirect()->back()
                    ->with('error', 'File icon untuk skill ini sudah ada. Ganti nama skill atau hapus dulu file lama.');
            }

            //Simpan file baru dengan nama costum
            $path = $request->file('icon')->storeAs('skills', $filename, 'public');
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
        if (Storage::disk('public')->exists($skill->icon)) {
            Storage::disk('public')->delete($skill->icon);
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
