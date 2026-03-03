<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        // 1. SETTING API (Ganti ANON_KEY dengan key asli dari Supabase Settings > API)
        $apiKey = 'sb_publishable_NbcG5ltTWVq8UKEjh_0eOw_sK58koN_'; 
        $baseUrl = 'https://lezkhnvmfrndjyofxbud.supabase.co/rest/v1';

        // 2. AMBIL DATA VIA HTTP (Ini bypass port 5432, jadi pasti jalan di Vercel)
        $headers = [
            'apikey' => $apiKey,
            'Authorization' => 'Bearer ' . $apiKey
        ];

        // Ambil Profile
        $resProfile = Http::withHeaders($headers)->get($baseUrl . '/profiles?select=*');
        $profile = $resProfile->successful() ? ($resProfile->json()[0] ?? null) : null;

        // Ambil Headlines
        $resHeadlines = Http::withHeaders($headers)->get($baseUrl . '/headlines?is_active=eq.true&order=order.asc');
        $headlines = collect($resHeadlines->json())->pluck('text');

        // Ambil Projects
        $resProjects = Http::withHeaders($headers)->get($baseUrl . '/projects?is_active=eq.true&order=created_at.desc');
        $projects = $resProjects->json();

        // Ambil Certifications
        $resCerts = Http::withHeaders($headers)->get($baseUrl . '/certifications?is_active=eq.true&order=year.desc');
        $certifications = $resCerts->json();

        // Ambil Skills
        $resSkills = Http::withHeaders($headers)->get($baseUrl . '/skills?select=*');
        $allSkills = collect($resSkills->json());
        $designSkills = $allSkills->where('category', 'design');
        $webSkills    = $allSkills->where('category', 'web');
        $officeSkills = $allSkills->where('category', 'office');

        // Ambil Comments (Simple Version)
        $resComments = Http::withHeaders($headers)->get($baseUrl . '/comments?parent_id=is.null&order=created_at.desc');
        $comments = $resComments->json();

        // 3. KIRIM KE VIEW
        return view('home', [
            'profile' => (object)$profile, // Cast ke object supaya view tidak error kalau panggil $profile->name
            'headlines' => $headlines,
            'designSkills' => $designSkills,
            'webSkills' => $webSkills,
            'officeSkills' => $officeSkills,
            'projects' => $projects,
            'certifications' => $certifications,
            'comments' => $comments,
        ]);
    }
}