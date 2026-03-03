<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use App\Models\Profile;
use App\Models\Certification;
use App\Models\Headline;
// Jika kamu punya model Comment, import juga di sini
// use App\Models\Comment; 

class HomeController extends Controller
{
    public function index()
    {
        // Ambil Profile
        $profile = Profile::first();

        // PERBAIKAN DI SINI: Gunakan true (tanpa kutip) 
        // PostgreSQL butuh boolean murni, bukan integer 1
        $headlines = Headline::where('is_active', '=', true)
            ->orderBy('order', 'asc')
            ->pluck('text');

        $projects = Project::where('is_active', '=', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $certifications = Certification::where('is_active', '=', true)
            ->orderBy('year', 'desc')
            ->get();

        // Skills tidak pakai filter is_active jadi aman
        $allSkills = Skill::all();
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
