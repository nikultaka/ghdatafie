@extends('Frontend.new_layouts.inner_main')



@section('pageTitle',$title)

@section('pageHeadTitle',$title)



@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

<style>

    .DataTables_Table_0_wrapper{

        overflow: scroll;

    }

</style>

<!-- Main content -->

<section class="content">

    <div class="container" style="min-height: 400px;">

        <?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>

        <!-- Small boxes (Stat box) -->



        <div class="box-header">

            <h3 class="box-title">Order List</h3>

        </div>

        <p id="msg_main"></p>



        <table class="display table table-hover table-striped table-bordered orders-table table-hover" cellspacing="0" width="100%">

            <thead>

            <!--<th>ID</th>-->

            <th>Report Title</th>

            <th>Charge Id</th>

            <th>Amount</th>

            <th>Order Date</th>

            <th>Action</th>

            </thead>

        </table>





    </div>

</section>



<!-- /.content -->





@endsection



@section('bottomscript')

<script src="{!!asset(ASSET.'bower_components/datatables.net/js/jquery.dataTables.min.js')!!}"></script>

<script src="{!! asset(ASSET.'js/frontend/orders.js')!!}"></script>



<script type="text/javascript">

    $(document).ready(function () {

        frontend.orders.initialize();

    });

</script>

@endsection