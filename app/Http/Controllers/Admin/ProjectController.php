<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $projects = Project::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->orderBy('created_at', 'asc')->get();

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
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index', ['category' => $request->category])
            ->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required|in:web,design',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'link_deploy' => 'nullable|url',
            'link_github' => 'nullable|url',
            'tech_stack' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index', ['category' => $project->category])
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();
        return back()->with('success', 'Project berhasil dihapus secara permanen!');
    }
}
