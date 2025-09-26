<?php

namespace App\Http\Controllers\Web\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller {

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Project::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($data) {
                    return $data->image ? '<img src="'.asset($data->image).'" width="60"/>' : '-';
                })
                ->addColumn('status', function($data) {
                    $checked = $data->status === 'active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                        <input onclick="showStatusChangeAlert('.$data->id.')" type="checkbox" class="form-check-input" '.$checked.'>
                    </div>';
                })
                ->addColumn('action', function($data) {
                    return '<div class="btn-group btn-group-sm">
                        <a href="'.route('project.edit', $data->id).'" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <a href="#" onclick="showDeleteConfirm('.$data->id.')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['image','status','action'])
                ->make();
        }
        return view('backend.layouts.portfolio.project.index');
    }

    public function create() {
        return view('backend.layouts.portfolio.project.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $project = new Project();
            $project->title = $request->title;
            $project->description = $request->description;
            $project->status = $request->status;

            if ($request->hasFile('image')) {
                $project->image = uploadImage($request->file('image'), 'projects');
            }

            $project->save();
            return redirect()->route('project.index')->with('t-success', 'Project created successfully.');
        } catch (Exception) {
            return redirect()->back()->with('t-error','Failed to create project.');
        }
    }

    public function edit($id) {
        $data = Project::findOrFail($id);
        return view('backend.layouts.portfolio.project.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $project = Project::findOrFail($id);
            $project->title = $request->title;
            $project->description = $request->description;
            $project->status = $request->status;

            if ($request->hasFile('image')) {
                if ($project->image && file_exists(public_path($project->image))) {
                    unlink(public_path($project->image));
                }
                $project->image = uploadImage($request->file('image'), 'projects');
            }

            $project->save();
            return redirect()->route('project.index')->with('t-success', 'Project updated successfully.');
        } catch (Exception) {
            return redirect()->back()->with('t-error','Failed to update project.');
        }
    }

    public function status($id) {
        $project = Project::findOrFail($id);
        $project->status = $project->status === 'active' ? 'inactive' : 'active';
        $project->save();
        return response()->json([
            'success' => true,
            'message' => $project->status === 'active' ? 'Published successfully' : 'Unpublished successfully'
        ]);
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }
        $project->delete();
        return response()->json(['success' => true, 'message' => 'Project deleted successfully']);
    }
}
