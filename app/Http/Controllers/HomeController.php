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
        // Ambil Profile pertama
        $profile = Profile::first();

        // Ambil Headlines yang aktif
        $headlines = Headline::where('is_active', true)->orderBy('order', 'asc')->pluck('text');

        // Ambil Projects yang aktif
        $projects = Project::where('is_active', true)->orderBy('created_at', 'desc')->get();

        // Ambil Certifications yang aktif
        $certifications = Certification::where('is_active', true)->orderBy('year', 'desc')->get();

        // Ambil Skills dan bagi per kategori
        $allSkills = Skill::all();
        $designSkills = $allSkills->where('category', 'design');
        $webSkills    = $allSkills->where('category', 'web');
        $officeSkills = $allSkills->where('category', 'office');

        // Ambil Comments (jika ada modelnya)
        // $comments = Comment::whereNull('parent_id')->orderBy('created_at', 'desc')->get();

        return view('home', [
            'profile' => $profile,
            'headlines' => $headlines,
            'designSkills' => $designSkills,
            'webSkills' => $webSkills,
            'officeSkills' => $officeSkills,
            'projects' => $projects,
            'certifications' => $certifications,
            'comments' => collect([]), // Sementara kosongkan jika belum ada modelnya
        ]);
    }
}