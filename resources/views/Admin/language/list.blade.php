@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Language List')
@section('pageHeadTitle','Language List')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Language List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#add_language_model"> Add Language </button>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body  table-responsive" style="height: auto;width: auto; overflow: scroll;">
                    <table class="display nowrap table table-hover table-striped table-bordered language-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <th>Name</th>
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

@include('Admin.language.add')
@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/language.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.language.initialize();
    });
</script>
@endsection