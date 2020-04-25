@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Advance Settings List')
@section('pageHeadTitle','Advance Settings')
@section('content')

<!--<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalRegisterForm">Add Filds</button>
                        </div>  
                        <p id="msg_main"></p>
                    </div>
                     /.card-header 
                    <div class="card-body">
                        <table class="table table-bordered table-striped with-check advance_custome_filds_table">    
                            <thead>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Fild Name</th>
                            <th>Fild value</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            </thead>
                        </table>
                    </div>
                     /.card-body 
                </div>
                 /.card 
            </div>
        </div>
    </div>

</section>-->


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Advance Settings List</h3>

      <div class="box-tools pull-right">
          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalRegisterForm">Add Filds</button>
      </div>
      <p id="msg_main"></p>
    </div>
    <div class="box-body  table-responsive">
            <table class="table table-bordered table-striped with-check advance_custome_filds_table table-hover" width="100%">    
                <thead>
                <!--<th>ID</th>-->
                <th>Label</th>
                <th>Fild Name</th>
                <th>Fild value</th>
                <th>Status</th>
                <th>Created Date</th>
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


<!--Model Popup-->
<form class="form-horizontal" id="advance-custom-fild-form" name="advance-custom-fild-form" method="post" action="" onsubmit="return false;" >

    {{ csrf_field() }}
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Custom field</h4>
                </div>
                <div class="modal-body">
                    <p id="msg"></p>
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label class="control-label col-sm-3 control-label">Label</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="adc_label" name="adc_label" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 control-label">Fild name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="adc_fild_name" name="adc_fild_name" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 control-label">Fild Value</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="adc_fild_value" name="adc_fild_value" data-validation="required">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-deep-orange btn-primary add-advance-custom-fild-details">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/advance_fild.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.advance_custom.initialize();
    });
</script>    
@endsection