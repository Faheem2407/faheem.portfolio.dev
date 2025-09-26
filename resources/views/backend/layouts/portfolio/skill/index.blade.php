@extends('backend.app')

@section('title', 'Skills')

@section('content')
<!--begin::Toolbar-->
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
                <li class="breadcrumb-item text-muted">Skills</li>
            </ul>
        </div>
    </div>
</div>
<!--end::Toolbar-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5 card">
                <div class="card-style mb-30">
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="{{ route('portfolio.skill.create') }}" class="btn btn-primary">Add New Skill</a>
                    </div>
                    <div class="table-wrapper table-responsive">
                        <table id="data-table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
    });

    if (!$.fn.DataTable.isDataTable('#data-table')) {
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('portfolio.skill.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }
});

// Status Change Confirm Alert
function showStatusChangeAlert(id) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to update the status?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => { if (result.isConfirmed) statusChange(id); });
}

// Status Change
function statusChange(id) {
    let url = '{{ route('portfolio.skill.status', ':id') }}';
    $.get(url.replace(':id', id), function(resp) {
        $('#data-table').DataTable().ajax.reload();
        toastr.success(resp.message);
    });
}

// Delete Confirm
function showDeleteConfirm(id) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'This will be deleted permanently.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => { if (result.isConfirmed) deleteItem(id); });
}

// Delete Skill
function deleteItem(id) {
    let url = '{{ route('portfolio.skill.destroy', ':id') }}';
    $.ajax({
        type: 'DELETE',
        url: url.replace(':id', id),
        success: function(resp) {
            $('#data-table').DataTable().ajax.reload();
            toastr.success(resp.message);
        }
    });
}
</script>
@endpush
