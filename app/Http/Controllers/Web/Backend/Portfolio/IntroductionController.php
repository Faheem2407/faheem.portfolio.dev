<?php

namespace App\Http\Controllers\Web\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntroductionController extends Controller
{
    /**
     * Display the introduction edit page.
     */
    public function index()
    {
        $data = Introduction::latest('id')->first();
        return view('backend.layouts.portfolio.introduction.index', compact('data'));
    }

    /**
     * Update the introduction.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'    => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $intro = Introduction::firstOrNew();
            $intro->title    = $request->title;
            $intro->subtitle = $request->subtitle;
            $intro->description = $request->description;
            $intro->save();

            return back()->with('t-success', 'Introduction updated successfully.');
        } catch (Exception) {
            return back()->with('t-error', 'Failed to update introduction.');
        }
    }
}
