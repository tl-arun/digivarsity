<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HeroBackground;

class HomeController extends Controller
{
    public function index()
    {
        $heroBackgrounds = HeroBackground::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact('heroBackgrounds'));
    }

    public function programs()
    {
        $programs = \App\Models\Program::where('is_active', true)
            ->with(['university'])
            ->get();

        $universities = \App\Models\University::where('is_active', true)->get();

        return view('public.programs', compact('programs', 'universities'));
    }

    public function programDetail($id)
    {
        $program = \App\Models\Program::with(['university', 'intent', 'outcome', 'testimonials'])
            ->findOrFail($id);

        return view('public.program-detail', compact('program'));
    }
}
