@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Reports Data')
@section('pageHeadTitle','Reports Data')

@section('content')

<style>
    .sortable_h3{
        border: 1px solid #c5c5c5;
        background: #f6f6f6;
        margin: 2px 0 0 0;
        padding: .5em .5em .5em .7em;
        font-size: 100%;
        
    }
    .sortable_div{
        padding: 1em 2.2em;
        border: 1px solid #dddddd;
        
    }
</style>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reports Data</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/reports/list')}}" class="btn btn-info btn-sm">Reports List</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body">
                    <button type="button" class="btn btn-info btn-sm open-modal" data-toggle="modal" data-target="#report_data_modal"> Create New Title </button>
                    
                    <form id="report_sortable_form" action="" method="post" onsubmit="return false;">
                        {{ csrf_field() }}
                        <input type="hidden" id="report_id" name="report_id" value="<?php echo  isset($id) ? $id : "";?>">
                        
                        <div id="list_data">
                            
                        
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- /.content -->

<!--        modal-->
<div class="modal fade" id="report_data_modal" role="dialog">
        <div class="modal-dialog">
            
    <form class="form-horizontal" id="frm_report_data" name="frm_report_data" action="" method="post" onsubmit="return false;">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create new Report Data</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <p id="msg"></p>
                        {{ csrf_field() }}
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="report_id" name="report_id" value="<?php echo  isset($id) ? $id : "";?>">
                        <div class="form-group">
                            <label for="u_name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title_name" id="title_name" data-validation="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="u_name" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title_description" id="title_description" data-validation="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label" >Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control" data-validation="required">
                                    <option value="">----Select Status----</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary sub_rep_data" name="submit">Submit</button>
                </div>
            </div>
    </form>
        </div>
</div>

<!--        modal-->
<div class="modal fade" id="sub_report_data_modal" role="dialog">
        <div class="modal-dialog">
            
    <form class="form-horizontal" id="frm_subreport_data" name="frm_subreport_data" action="" method="post" onsubmit="return false;">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Data</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <p id="msg"></p>
                        {{ csrf_field() }}
                        <input type="hidden" id="sub_id" name="sub_id" value="">
                        <!--<input type="hidden" id="sub_report_id" name="sub_report_id" value="">-->
                        <input type="hidden" id="sub_parent_id" name="sub_parent_id" value="">
                        <input type="hidden" id="sub_report_id" name="sub_report_id">
                        <div class="form-group">
                            <label for="u_name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sub_title_name" id="sub_title_name" data-validation="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label" >Status</label>
                            <div class="col-sm-9">
                                <select id="sub_status" name="sub_status" class="form-control" data-validation="required">
                                    <option value="">----Select Status----</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary sub_subrep_data" name="submit">Submit</button>
                </div>
            </div>
    </form>
        </div>
</div>

@endsection




@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/reports.js')!!}"></script>
<script src="{!! asset(ASSET.'js/Admin/reports_data.js')!!}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript">
    $(document).ready(function () {
        admin.reports.initialize();
    });
</script>
@endsection