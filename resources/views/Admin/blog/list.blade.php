@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Blog List')
@section('pageHeadTitle','Blog')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Blog List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/blog')}}" class="btn btn-info btn-sm">Create New Blog</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body  table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered blog-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Title</th>
                        <th>Slug URL</th>
                        <th>Meta Title</th>
                        <th>Meta Keyword</th>
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
<script src="{!! asset(ASSET.'js/Admin/blog.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.blog.initialize();
    });
</script>
@endsection