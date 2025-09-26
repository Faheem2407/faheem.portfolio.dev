<?php

namespace App\Http\Controllers\Web\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Skill::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    $checked = $data->status === 'active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input onclick="showStatusChangeAlert(' . $data->id . ')" 
                                       type="checkbox" class="form-check-input" 
                                       id="customSwitch' . $data->id . '" ' . $checked . '>
                                <label class="form-check-label" for="customSwitch' . $data->id . '"></label>
                            </div>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group">
                                <a href="' . route('portfolio.skill.edit', $data->id) . '" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </div>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.portfolio.skill.index');
    }

    public function create()
    {
        return view('backend.layouts.portfolio.skill.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Skill::create([
                'title'  => $request->title,
                'status' => $request->status,
            ]);
            return redirect()->route('portfolio.skill.index')->with('t-success', 'Skill created successfully.');
        } catch (Exception) {
            return redirect()->route('portfolio.skill.index')->with('t-error', 'Skill creation failed.');
        }
    }

    public function edit($id)
    {
        $data = Skill::findOrFail($id);
        return view('backend.layouts.portfolio.skill.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'  => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $skill = Skill::findOrFail($id);
            $skill->update([
                'title'  => $request->title,
                'status' => $request->status,
            ]);
            return redirect()->route('portfolio.skill.index')->with('t-success', 'Skill updated successfully.');
        } catch (Exception) {
            return redirect()->route('portfolio.skill.index')->with('t-error', 'Skill update failed.');
        }
    }

    public function status($id): JsonResponse
    {
        $skill = Skill::findOrFail($id);
        $skill->status = $skill->status === 'active' ? 'inactive' : 'active';
        $skill->save();

        return response()->json([
            'success' => true,
            'message' => $skill->status === 'active' ? 'Activated successfully' : 'Deactivated successfully',
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return response()->json([
            'success' => true,
            'message' => 'Skill deleted successfully',
        ]);
    }
}
