@extends('layouts.admin.app')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header align-items-center d-flex">
                                    <div class="col-6">
                                        <h3 class="card-title">List of Categories</h3>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Active</th>
                                                <th>Home</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    DTable = $('#example2').DataTable({
        destroy: true,
        "fnInitComplete": function(oSettings, json) {
            $('.chk_switch').bootstrapToggle({
                onstyle : "success",
                offstyle : "danger",
                height:"10px"
            });

            $('.chk_switch').change(function() {
                status = $(this).prop('checked') ? 1 : 0;
                $.ajax({
                    url : $(this).data('url'),
                    method : "GET",
                    data : {
                        'status' : status
                    },
                    success : function() {
                        toastr.success('status change successfully');
                    },
                    error : function() {
                        toastr.error('something went wrong');
                    }
                })
            });
        },
        "ajax":{
                "url": "{{ route('categories.list') }}",
                "dataType": "json",
            },
        "order": [],
        "columnDefs": [
            { "width": "20%", "targets": 2 }
        ],
        "columns": [
            { "data": "title" },
            { "data": "slug" },
            { "data": "hero_image"},
            { "data": "is_active"},
            { "data": "is_show"},
            { "data": "action" },
        ]
    });
</script>
@endsection

