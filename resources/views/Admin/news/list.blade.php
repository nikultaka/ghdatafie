@extends('Admin.layouts.dashboard.main')

@section('pageTitle','News List')
@section('pageHeadTitle','News')

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
                    <h3 class="box-title">News List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/news')}}" class="btn btn-info btn-sm">Create New News</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body  table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered news-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Title</th>
                        <th>Category</th>
                        <th>Short Description</th>
                        <!--<th>Description</th>-->
                        <th>Publish Date</th>
                        <th>Image</th>
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


@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/news.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.news.initialize();
    });
</script>
@endsection