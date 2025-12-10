<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::orderBy('created_at', 'desc')->get();
        return view('admin.universities.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.universities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('universities', 'public');
            $validated['logo'] = $logoPath;
        }

        $validated['is_active'] = $request->has('is_active');

        University::create($validated);

        return redirect()->route('admin.universities.index')
            ->with('success', 'University created successfully!');
    }

    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($university->logo) {
                Storage::disk('public')->delete($university->logo);
            }
            $logoPath = $request->file('logo')->store('universities', 'public');
            $validated['logo'] = $logoPath;
        }

        $validated['is_active'] = $request->has('is_active');

        $university->update($validated);

        return redirect()->route('admin.universities.index')
            ->with('success', 'University updated successfully!');
    }

    public function destroy(University $university)
    {
        // Delete logo
        if ($university->logo) {
            Storage::disk('public')->delete($university->logo);
        }

        $university->delete();

        return redirect()->route('admin.universities.index')
            ->with('success', 'University deleted successfully!');
    }
}
