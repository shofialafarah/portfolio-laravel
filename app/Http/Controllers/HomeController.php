<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();

        $headlines = \App\Models\Headline::whereRaw('is_active = true')
            ->orderBy('order', 'asc')
            ->pluck('text');

        $projects = \App\Models\Project::whereRaw('is_active = true')
            ->orderBy('created_at', 'desc')
            ->get();

        $certifications = \App\Models\Certification::where('is_active', true)
            ->orderBy('year', 'desc')
            ->get();

        $allSkills = \App\Models\Skill::all();
        $designSkills = $allSkills->where('category', 'design');
        $webSkills    = $allSkills->where('category', 'web');
        $officeSkills = $allSkills->where('category', 'office');

        return view('home', [
            'profile' => $profile,
            'headlines' => $headlines,
            'designSkills' => $designSkills,
            'webSkills' => $webSkills,
            'officeSkills' => $officeSkills,
            'projects' => $projects,
            'certifications' => $certifications,
            'comments' => collect([]),
        ]);
    }
}
