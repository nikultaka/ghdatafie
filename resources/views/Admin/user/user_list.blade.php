@extends('Admin.layouts.dashboard.main')

@section('pageTitle','User')
@section('pageHeadTitle','User')
@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#ins_user"> Create New User </button>
                    </div>
                </div>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <p id="msg_main"></p>
              </div>
                <div class="box-body  table-responsive">
                    <table class="table table-bordered table-striped with-check user-table table-hover" width="100%">
                        <thead>

                        <th>Category</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!--<th>Password</th>-->
                        <th>status</th>
                        <th>Action</th>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@include('Admin.user.adduser')

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/user.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.user.initialize();
    });
</script>  
@endsection