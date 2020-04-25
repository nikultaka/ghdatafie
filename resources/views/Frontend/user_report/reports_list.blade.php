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



        <div class="box-header" style="display: flex;">

            <h3 class="box-title">Reports List</h3>

            <div class="box-tools pull-right" style="margin-left: auto;">

                <a href="{{url('/user/report/add')}}" class="btn btn-info btn-sm">Create New Reports</a>

            </div>

        </div>

        <p id="msg_main"></p>



        <table class="display table table-hover table-striped table-bordered reports-table table-hover" cellspacing="0" width="100%">

            <thead>
            <th>Title</th>
            <th>Category</th>
            <th>Short Desc</th>
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

</section>



<!-- /.content -->





@endsection



@section('bottomscript')

<script src="{!!asset(ASSET.'bower_components/datatables.net/js/jquery.dataTables.min.js')!!}"></script>

<script src="{!! asset(ASSET.'js/frontend/reports.js')!!}"></script>



<script type="text/javascript">

        $(document).ready(function () {

frontend.reports.initialize();
});

</script>

@endsection