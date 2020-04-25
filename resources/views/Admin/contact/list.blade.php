@extends('Admin.layouts.dashboard.main')


@section('pageTitle','Contact List')
@section('pageHeadTitle','Contact List')

@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Contacts List</h3>
        <p id="msg_main"></p>
    </div>
    <div class="box-body  table-responsive">
        <table class="table table-bordered table-striped with-check contact_us-table table-hover" width="100%">
            <thead>
                <th>ID</th>
                <th>Package name</th>
                <th>Gender</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone no</th>
                <th>Email</th>
                <th>Status</th>
                <th>Reply</th>
                <th>Action</th>
            </thead>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <!--Footer-->
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

@include('Admin.contact.add')

@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/contact_us.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.contact_us.initialize();
    });
</script>
@endsection