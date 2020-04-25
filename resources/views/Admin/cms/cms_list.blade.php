@extends('Admin.layouts.dashboard.main')

@section('pageTitle','CMS List')
@section('pageHeadTitle','CMS')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">CMS List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/cms')}}" class="btn btn-info btn-sm">Create New CMS Page</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body  table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered cms-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Title</th>
                        <th>Slug URL</th>
                        <th>Meta Title</th>
                        <th>Meta Keyword</th>
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
<script src="{!! asset(ASSET.'js/Admin/cms.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.cms.initialize();
    });
</script>
@endsection