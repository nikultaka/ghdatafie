@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Add CMS')
@section('pageHeadTitle','CMS')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add CMS</h3>

      <div class="box-tools pull-right">
          
      </div>
      <p id="msg_main"></p>
    </div>
    <div class="box-body">
        <form class="form-horizontal" role="form" method="post" id="frm_cms" name="frm_cms" onsubmit="return false"> 
                        {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="id" id="id" value="<?php echo isset($cms->id) ? $cms->id : '' ?>">
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="title" class="col-sm-2">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($cms->title) ? $cms->title : '' ?>" name="title" id="title" data-validation="required" />
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="slug" class="col-sm-2">Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo isset($cms->slug_url) ? $cms->slug_url : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="description" class="col-sm-2">Description Editor</label>
                                <div class="col-sm-8">
                                    <textarea id="description" class="form-control" class="editor" name="description" rows="10" cols="80"><?php echo isset($cms->description) ? $cms->description : '' ?></textarea>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="meta_title" class="col-sm-2">Meta Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo isset($cms->meta_title) ? $cms->meta_title : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="meta_keyword" class="col-sm-2">Meta Keyword</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="<?php echo isset($cms->meta_keyword) ? $cms->meta_keyword : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div> 
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="editor" class="col-sm-2">Meta Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="meta_description" name="meta_description" cols="50" rows="5"><?php echo isset($cms->meta_description) ? $cms->meta_description : '' ?></textarea>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="status" class="col-sm-2">Status</label>
                                <div class="col-sm-8">
                                    <select id="status" class="form-control" name="status" data-validation="required">
                                        <option value="">----Select Status----</option>
                                        <option value="1" <?php if(isset($cms->status)){ if($cms->status == '1'){echo 'selected';}} ?>>Active</option>
                                        <option value="0" <?php if(isset($cms->status)){ if($cms->status == '0'){echo 'selected';}} ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>

                        </div>
                        <div class="card-footer ">
                            <center><button type="submit" class="btn btn-primary sub-cms">Submit</button></center>
                        </div>
                    </form>
    </div>
    <!-- /.box-body -->
    
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

@endsection
@section('bottomscript')

<script src="//cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>

<!--<script src="{!! asset('js/ckeditor.js')!!}"></script>-->
<script src="{!! asset(ASSET.'js/Admin/cms.js')!!}"></script>
<script type="text/javascript">
                    $(document).ready(function () {
                        admin.cms.initialize();
                        CKEDITOR.replace('description', { customConfig: "{!! asset(ASSET.'js/custom_config.js')!!}"});
                        CKEDITOR.config.allowedContent = true;
                        CKEDITOR.config.extraAllowedContent ﻿= 'p(*)[*]{*};span(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*}';
                        
                    });
</script>
@endsection