@extends('backend.app')

@section('title', 'Edit Skill')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-4">
                <div class="card card-body">
                    <form method="POST" action="{{ route('portfolio.skill.update', $data->id) }}">
                        @csrf
                        <div class="input-style-1 mt-4">
                            <label for="title">Skill Title:</label>
                            <input type="text" placeholder="Enter Title" id="title"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $data->title) }}">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
                            <a href="{{ route('portfolio.skill.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
