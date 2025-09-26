@extends('backend.app')

@section('title', 'Edit Resume')

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bold my-1 fs-2">Dashboard</h1>
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Portfolio</li>
                    <li class="breadcrumb-item text-muted">Resume</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-4">
                    <div class="card card-body">
                        <form method="POST" action="{{ route('resume.update') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="input-style-1 mt-4">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" 
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $data->title ?? '') }}" placeholder="Enter Title">
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-style-1 mt-4">
                                <label for="sub_title">Sub Title:</label>
                                <input type="text" id="sub_title" name="sub_title" 
                                    class="form-control @error('sub_title') is-invalid @enderror"
                                    value="{{ old('sub_title', $data->sub_title ?? '') }}" placeholder="Enter Sub Title">
                                @error('sub_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-style-1 mt-4">
                                <label for="updated_year">Updated Year:</label>
                                <input type="text" id="updated_year" name="updated_year"
                                    class="form-control @error('updated_year') is-invalid @enderror"
                                    value="{{ old('updated_year', $data->updated_year ?? '') }}" placeholder="Enter Year">
                                @error('updated_year')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-style-1 mt-4">
                                <label for="file">Upload Resume (PDF):</label>
                                <input type="file" id="file" name="file" 
                                    class="form-control @error('file') is-invalid @enderror">
                                @if(!empty($data->file))
                                    <p class="mt-2">Current File: <a href="{{ asset('storage/'.$data->file) }}" target="_blank">View</a></p>
                                @endif
                                @error('file')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
