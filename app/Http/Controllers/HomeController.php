<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Profile;
use App\Models\Headline;
use App\Models\Project;
use App\Models\Certification;

class HomeController extends Controller
{
    public function index()
    {
        // profile
        $profile = Profile::first();

        // headline untuk animasi teks
        $headlines = Headline::where('is_active', 1)
            ->orderBy('order')
            ->pluck('text');

        // projects
        $projects = Project::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // certifications
        $certifications = Certification::where('is_active', 1)
            ->orderBy('year', 'desc')
            ->get();


        // skills publik (dipisah per kategori)
        $designSkills = Skill::where('category', 'design')->get();
        $webSkills    = Skill::where('category', 'web')->get();
        $officeSkills = Skill::where('category', 'office')->get();

        return view('home', compact(
            'profile',
            'headlines',
            'designSkills',
            'webSkills',
            'officeSkills',
            'projects',
            'certifications'
        ));
    }
}
