@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Testimonial List')
@section('pageHeadTitle','Testimonial')
@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Testimonial List</h3>

      <div class="box-tools pull-right">
          <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#ins_tes"> Create Testimonial </button>
      </div>
      <p id="msg_main"></p>
    </div>
    <div class="box-body  table-responsive">
        <table class="table table-bordered table-striped with-check test-table table-hover" width="100%">
            <thead>
            <!--<th>ID</th>-->
            <th>Customer</th>
            <th>Feedback</th>
            <th>User Photo</th>
            <th>status</th>
            <th>Action</th>
            </thead>
        </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->


@include('Admin.testimonial.testimonial')

@endsection

@section('bottomscript')

<script src="{!! asset(ASSET.'js/Admin/testimonial.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.testimonial.initialize();
    });
</script> 
@endsection