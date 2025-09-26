<?php

namespace App\Http\Controllers\Web\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::latest('id')->first();
        return view('backend.layouts.portfolio.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = About::first();
        try {
            $about = About::firstOrNew();

            if ($request->hasFile('image')) {
                $about->image = uploadImage($request->file('image'), 'about_images');

                if ($data && $data->image) {
                    $previousImagePath = public_path($data->image);
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }
            } else {
                $about->image = $data->image ?? null;
            }

            $about->description = $request->description;
            $about->save();

            return back()->with('t-success', 'About section updated successfully');
        } catch (Exception) {
            return back()->with('t-error', 'Failed to update About section');
        }
    }
}
