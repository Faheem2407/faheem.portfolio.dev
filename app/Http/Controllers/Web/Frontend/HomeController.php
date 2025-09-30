<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduction;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Resume;

class HomeController extends Controller
{
    public function index() {
        $intro      = Introduction::first();
        $about      = About::first();
        $skills     = Skill::where('status','active')->get();
        $projects   = Project::where('status','active')->get();
        $resume     = Resume::first();

        return view('welcome',compact(['intro','about','skills','projects','resume']));
    }
}
