<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'designSkills' => Skill::where('category', 'design')->get(),
            'webSkills'    => Skill::where('category', 'web')->get(),
            'officeSkills' => Skill::where('category', 'office')->get(),
        ]);
    }
}
