@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Dataset List')
@section('pageHeadTitle','Dataset')

@section('content')

<style>
    table.dataTable.nowrap th, table.dataTable.nowrap td {
        white-space: unset;
    }
</style>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Dataset List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/dataset')}}" class="btn btn-info btn-sm">Create New Dataset</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body  table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered dataset-table table-hover" cellspacing="0" width="100%" style="width: 100%;">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Brand Name</th>
                        <th>Title</th>
                        <th>Short Desc</th>
                        <th>Publisher</th>
                        <th>Maintainer</th>
                        <th>Email</th>
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


@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/dataset.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.dataset.initialize();
    });
</script>
@endsection