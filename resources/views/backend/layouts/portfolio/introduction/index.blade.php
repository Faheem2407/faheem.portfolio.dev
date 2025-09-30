@extends('backend.app')

@section('title', 'Introduction')

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
                    <li class="breadcrumb-item text-muted">Introduction</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-4">
                    <div class="card card-body">
                        <form method="POST" action="{{ route('introduction.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="title">Greeting:</label>
                                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" value="{{ $data->title ?? '' }}">
                                        @error('title')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="subtitle">Name:</label>
                                        <input type="text" id="subtitle" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Enter Subtitle" value="{{ $data->subtitle ?? '' }}">
                                        @error('subtitle')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="input-style-1">
                                        <label for="description:">Professional Title:</label>
                                        <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description" value="{{ $data->description ?? '' }}">
                                        @error('description')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
