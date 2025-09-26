@extends('backend.app')

@section('title', 'Edit Project')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-4">
                <div class="card card-body">
                    <form method="POST" action="{{ route('project.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="input-style-1 mt-4">
                            <label for="title">Project Title:</label>
                            <input type="text" placeholder="Enter Title" id="title"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $data->title) }}">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-style-1 mt-4">
                            <label for="description">Description:</label>
                            <textarea placeholder="Enter Description" id="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $data->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="input-style-1">
                                <label for="image">Project Image:</label>
                                <input type="file" class="dropify @error('image') is-invalid @enderror" name="image" id="image"
                                    data-default-file="@isset($data){{ asset($data->image) }}@endisset" />
                                @error('image')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>


                        <div class="input-style-1 mt-4">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $data->status)=='active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $data->status)=='inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
