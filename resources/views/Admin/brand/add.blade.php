@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Add Brand')
@section('pageHeadTitle','Brand')

@section('content')


<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add Brand</h3>

      <div class="box-tools pull-right">
          <a href="{{url(ADMIN.'/brand/list')}}" class="btn btn-info btn-sm">Brand List</a>
      </div>
      <p id="msg_main"></p>
    </div>
    <div class="box-body">
        <form class="form-horizontal" role="form" method="post" id="frm_brand" name="frm_brand" onsubmit="return false" enctype="multipart/form-data"> 
                        {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="id" id="id" value="<?php echo isset($brand->id) ? $brand->id : '' ?>">
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="title" class="col-sm-2">Brand Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($brand->title) ? $brand->title : '' ?>" name="title" id="title" data-validation="required" />
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="slug" class="col-sm-2">Brand Slug</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo isset($brand->slug_url) ? $brand->slug_url : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="description" class="col-sm-2">Brand Description</label>
                                <div class="col-sm-8">
                                    <textarea id="description" class="form-control" class="editor" name="description" rows="10" cols="80"><?php echo isset($brand->description) ? $brand->description : '' ?></textarea>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="meta_title" class="col-sm-2">Meta Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo isset($brand->meta_title) ? $brand->meta_title : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="meta_keyword" class="col-sm-2">Meta Keyword</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="<?php echo isset($brand->meta_keyword) ? $brand->meta_keyword : '' ?>" data-validation="required"/>
                                </div>
                                <div class="col-sm-1"></div>
                            </div> 
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="editor" class="col-sm-2">Meta Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="meta_description" name="meta_description" cols="50" rows="5"><?php echo isset($brand->meta_description) ? $brand->meta_description : '' ?></textarea>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="exampleInputFile" class="col-sm-2">Brand Logo</label>
                                <div class="col-sm-4">
                                    <input type="file" id="brand_logo" name="brand_logo">
                                </div>
                                <div class="col-sm-4">
                                    <?php 
                                    if(isset($brand->logo) && $brand->logo != '' ){ 
                                      $url =   ASSET.'upload/image/thumbnail/'.$brand->logo;
                                    }else{
                                        $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
                                    } 
                                    ?>
                                    <img id="brand_logo_priview" style="width: 50px;" src="{{url($url)}}">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="status" class="col-sm-2">Status</label>
                                <div class="col-sm-8">
                                    <select id="status" class="form-control" name="status" data-validation="required">
                                        <option value="">----Select Status----</option>
                                        <option value="1" <?php if(isset($brand->status)){ if($brand->status == '1'){echo 'selected';}} ?>>Active</option>
                                        <option value="0" <?php if(isset($brand->status)){ if($brand->status == '0'){echo 'selected';}} ?>>Inactive</option>
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
<script src="{!! asset(ASSET.'js/Admin/brand.js')!!}"></script>
<script type="text/javascript">
                    $(document).ready(function () {
                        admin.brand.initialize();
                        CKEDITOR.replace('description', { customConfig: "{!! asset(ASSET.'js/custom_config.js')!!}"})
                    });
</script>
@endsection