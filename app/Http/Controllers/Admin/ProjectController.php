<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $projects = Project::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->orderBy('created_at', 'desc')->get(); // Diubah desc supaya yang terbaru di atas

        return view('admin.projects.index', compact('projects', 'category'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:web,design',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'link_deploy' => 'nullable|url',
            'link_github' => 'nullable|url',
            'tech_stack' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            // Nama file: thumb_timestamp_judul.jpg
            $filename = 'thumb_' . time() . '_' . Str::slug($request->title) . '.' . $extension;
            
            // Simpan ke S3 folder 'projects'
            $path = $request->file('image')->storeAs('projects', $filename, 's3');
            $validated['image'] = $path;
        }

        // Paksa is_active true agar langsung muncul di landing page
        $validated['is_active'] = true;

        Project::create($validated);

        return redirect()->route('admin.projects.index', ['category' => $request->category])
            ->with('success', 'Project berhasil ditambahkan ke portfolio!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:web,design',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'link_deploy' => 'nullable|url',
            'link_github' => 'nullable|url',
            'tech_stack' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // 1. Hapus image lama dari S3
            if ($project->image && Storage::disk('s3')->exists($project->image)) {
                Storage::disk('s3')->delete($project->image);
            }

            // 2. Simpan image baru
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = 'thumb_' . time() . '_' . Str::slug($request->title) . '.' . $extension;
            
            $path = $request->file('image')->storeAs('projects', $filename, 's3');
            $data['image'] = $path;
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index', ['category' => $project->category])
            ->with('success', 'Informasi project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        // Hapus file dari S3 sebelum hapus record database
        if ($project->image && Storage::disk('s3')->exists($project->image)) {
            Storage::disk('s3')->delete($project->image);
        }

        $project->delete();
        return back()->with('success', 'Project telah dihapus permanen.');
    }
}