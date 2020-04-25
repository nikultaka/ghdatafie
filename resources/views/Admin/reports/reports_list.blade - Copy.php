@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Reports List')
@section('pageHeadTitle','Reports List')

@section('content')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reports List</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url(ADMIN.'/reports')}}" class="btn btn-info btn-sm">Create New Reports Page</a>
                    </div>
                </div>
                <p id="msg_main"></p>
                <div class="box-body">
                    <table class="display nowrap table table-hover table-striped table-bordered reports-table table-hover" cellspacing="0" width="100%">
                        <thead>
                        <!--<th>ID</th>-->
                        <th>Title</th>
                        <th>Category</th>
                        <th>Short Desc</th>
                        <th>Price</th>
                        <th>Pages</th>
                        <th>Language</th>
                        <th>Release Date</th>
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


<!--        modal-->
<form class="form-horizontal" id="" name="" action="" method="post" onsubmit="return false;">
    <div class="modal fade" id="report_info" role="report_info">
        <div class="modal-dialog">
            <input type="hidden" id="user_id" name="user_id" value="">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create new Info</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <p id="msg"></p>
                        {{ csrf_field() }}
                        
                          

                    </div>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary sub_user" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>



<!--<button id="add_input">Add input</button>-->

<!--<div class="txtbox_grp">
    
</div>-->

<!--<div class="form-group" class="add_group">
    <div class="col-sm-12" style="display: flex;">
        <input type="text" class="form-control" name="add_input" id=""/> <button class="btn_add" onclick="hidediv(5)"> + </button>
    </div>
    <div class="col-sm-12" class="show_div" style="display: none;">
        <input type="text" class="form-control" name="add_input" id=""/>
    </div>
</div>-->




<div class="col-sm-12">

    <div class="input-group text1">
            <input id="mc-answer-1" type="text" class="form-control mc-field" name="answer-1" >
            <button type="button" class="close" aria-label="Close" onclick="hidediv(1)">&times;</button>
    </div>

    <div class="input-group text2">
            <input id="mc-answer-2" type="text" class="form-control mc-field" name="answer-2" >
            <button type="button" class="close" aria-label="Close" onclick="hidediv(2)">&times;</button>
    </div>

    <div class="input-group text3">
            <input id="mc-answer-3" type="text" class="form-control mc-field" name="answer-3" >
            <button type="button" class="close" aria-label="Close" onclick="hidediv(3)">&times;</button>
    </div>

    <div class="input-group text4">
            <input id="mc-answer-4" type="text" class="form-control mc-field" name="answer-4" >
            <button type="button" class="close" aria-label="Close" onclick="hidediv(4)">&times;</button>
    </div>

    <div class="input-group text5">
            <input id="mc-answer-5" type="text" class="form-control mc-field" name="answer-5" >
            <button type="button" class="close" aria-label="Close" onclick="hidediv(5)">&times;</button>
    </div>
    
    <div class="input-group">
        <button type="button" class="add_div" aria-label="Close" onclick="adddiv()" style="display: none;">Add+..</button>
    </div>
</div>

<style>
/*    .input-group .close{
        background-color: white;
        min-height: 100%;
        width: 30px;
    }*/
    .hide_div{
        display: none;
    }
</style>
<script>
    
    function hidediv(no){
        var i;
        for (i = 5; i > 0; i--) {
          if($(".text"+i+":visible").length == 1){
                $(".text"+i).addClass('hide_div');
                break;
          }
        }
        
        if($(".hide_div").length < 5){
            $(".add_div").show();
        } else {
            $(".add_div").hide();
        }
        
    }
    
    function adddiv(){
        var i;
        for (i = 1; i < 6; i++) {
            
          if($(".text"+i+":visible").length < 1){
                $(".text"+i).removeClass('hide_div');
                if($(".hide_div").length == 0){
                    $(".add_div").hide();
                }
                break;
          }
        } 
    }
 

</script>







@endsection

@section('bottomscript')
<script src="{!! asset(ASSET.'js/Admin/reports.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        admin.reports.initialize();
    });
</script>
@endsection