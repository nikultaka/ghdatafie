@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Reports List')
@section('pageHeadTitle','Reports')

@section('content')

<style>
    .DataTables_Table_0_wrapper{
        overflow: scroll;
    }
</style>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reports List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/reports')}}" class="btn btn-info btn-sm">Create New Report</a>
                    </div>
                </div>
                <p id="msg_main" class="text-center"></p>
                <div class="box-header">
                    <?php if (Auth::user()->role_id == ADMIN_ROLE) { ?>
                        <input type="submit" value="Bulk Approve" class="btn btn-success pull-left selected-report-approved">
                        <input type="submit" value="Bulk Reject" class="btn btn-danger pull-left selected-report-rejected" style="margin-left: 20px;">
                    <?php } ?>
                    <select class="form-control pull-right" style="width: 20%" id="report_filter">
                        <option value="">-- Show All --</option>
                        <option value="<?= APPROVE ?>">Approved</option>
                        <option value="<?= PENDING ?>">Pending</option>
                        <option value="<?= REJECT ?>">Rejected</option>
                    </select>
                </div>

                <div class="box-body  table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered reports-table table-hover" cellspacing="0" width="100%" style="display:none;">
                        <thead>
                        <!--<th>ID</th>-->
                        <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Pages</th>
                        <th>Language</th>
                        <th>Release Date</th>
                        <th>Downloads</th>
                        <th>Views</th>
                        <th>Status</th>
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
<script src="{!! asset(ASSET.'js/Admin/reports.js')!!}"></script>
<script type="text/javascript">
$(document).ready(function () {
    admin.reports.initialize();
});
</script>
@endsection