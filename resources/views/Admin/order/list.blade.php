@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Order List')
@section('pageHeadTitle','Order')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Order List</h3>
                </div>
                <p id="msg_main"></p>
                <div class="box-body table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered order-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>User Name</th>
                        <th>Report Name</th>
                        <th>Charge Id</th>
                        <th>Amount</th>
                        <th>Order Date</th>
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
<script src="{!! asset(ASSET.'js/Admin/order.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.order.initialize();
    });
</script>
@endsection