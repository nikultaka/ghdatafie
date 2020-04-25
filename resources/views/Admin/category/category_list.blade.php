@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Category')
@section('pageHeadTitle','Category')
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Category List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#ins_category"> Create New Category </button>
                    </div>
                </div>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <p id="msg_main"></p>
              </div>
                <div class="box-body  table-responsive">
                    <table class="table table-bordered table-striped with-check category-table table-hover" style="width: 100%;">
                        <thead>

                        <th>Name</th>
                        <th>Description</th>
                        <th>status</th>
                        <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@include('Admin.category.addcategory')

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/category.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.category.initialize();
    });
</script>  
@endsection