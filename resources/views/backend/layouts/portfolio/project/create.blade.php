@extends('backend.app')

@section('title', 'Create Project')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-4">
                <div class="card card-body">
                    <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="input-style-1 mt-4">
                            <label for="title">Project Title:</label>
                            <input type="text" placeholder="Enter Title" id="title"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-style-1 mt-4">
                            <label for="description">Description:</label>
                            <textarea placeholder="Enter Description" id="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-style-1 mt-4">
                            <label for="image">Project Image:</label>
                            <input type="file" id="image"
                                class="form-control dropify @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-style-1 mt-4">
                            <label for="link">Project Link:</label>
                            <input type="text" placeholder="Enter link" id="link"
                                class="form-control @error('link') is-invalid @enderror" name="link"
                                value="{{ old('link') }}">
                            @error('link')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-style-1 mt-4">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
