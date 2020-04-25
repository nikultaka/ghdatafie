@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Banner List')
@section('pageHeadTitle','Banner')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Banner List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#add_banner_model"> Add Banner </button>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered banner-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Title</th>
                        <th>Page Name</th>
                        <th>Banner</th>
                        <th>Created Date</th>
                        <th>status</th>
                        <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- /.content -->

@include('Admin.banner.add')
@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/banner.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.banner.initialize();
    });
</script>
@endsection