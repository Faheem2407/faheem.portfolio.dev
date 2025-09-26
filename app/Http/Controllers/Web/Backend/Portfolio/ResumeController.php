<?php

namespace App\Http\Controllers\Web\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function edit()
    {
        $data = Resume::first();
        return view('backend.layouts.portfolio.resume.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $resume = Resume::first();

        $request->validate([
            'title'        => 'required|string|max:255',
            'sub_title'    => 'required|string|max:255',
            'updated_year' => 'required|string|max:10',
            'file'         => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['title', 'sub_title', 'updated_year']);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('resumes', 'public');
            $data['file'] = $filePath;
        }

        $resume->update($data);

        return redirect()->back()->with('success', 'Resume updated successfully.');
    }
}
