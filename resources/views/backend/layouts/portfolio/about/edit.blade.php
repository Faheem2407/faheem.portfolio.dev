@extends('backend.app')

@section('title', 'About Section')

@section('content')
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <h1 class="text-dark fw-bold my-1 fs-2">
                Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-muted">Portfolio</li>
                <li class="breadcrumb-item text-muted">About</li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-4">
                <div class="card card-body">
                    <form method="POST" action="{{ route('portfolio.about.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="input-style-1">
                                    <label for="image">Image:</label>
                                    <input type="file" class="dropify @error('image') is-invalid @enderror" name="image" id="image"
                                        data-default-file="@isset($about){{ asset($about->image) }}@endisset" />
                                    @error('image')
                                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="input-style-1">
                                    <label for="description">Description:</label>
                                    <textarea placeholder="Type here..." id="description" name="description"
                                        class="form-control @error('description') is-invalid @enderror">
                                        {{ $about->description ?? '' }}
                                    </textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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

@push('script')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
