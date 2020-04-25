@extends('Admin.layouts.dashboard.main')

@section('pageTitle','Add Blog')
@section('pageHeadTitle','Blog')

@section('content')


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Blog</h3>

            <div class="box-tools pull-right">
                <a href="{{url(ADMIN.'/blog/list')}}" class="btn btn-info btn-sm">Blog List</a>
            </div>
            <p id="msg_main"></p>
        </div>
        <div class="box-body">
            <form class="form-horizontal" role="form" method="post" id="frm_blog" name="frm_blog" onsubmit="return false" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                <div class="card-body">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($blog->id) ? $blog->id : '' ?>">
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="title" class="col-sm-2">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo isset($blog->title) ? $blog->title : '' ?>" name="title" id="title" data-validation="required" />
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="slug" class="col-sm-2">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="slug" id="slug" value="<?php echo isset($blog->slug_url) ? $blog->slug_url : '' ?>" data-validation="required"/>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="description" class="col-sm-2">Description</label>
                        <div class="col-sm-8">
                            <textarea id="description" class="form-control" class="editor" name="description" rows="10" cols="80"><?php echo isset($blog->description) ? $blog->description : '' ?></textarea>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="meta_title" class="col-sm-2">Meta Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo isset($blog->meta_title) ? $blog->meta_title : '' ?>" data-validation="required"/>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="meta_keyword" class="col-sm-2">Meta Keyword</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="<?php echo isset($blog->meta_keyword) ? $blog->meta_keyword : '' ?>" data-validation="required"/>
                        </div>
                        <div class="col-sm-1"></div>
                    </div> 
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="editor" class="col-sm-2">Meta Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="meta_description" name="meta_description" cols="50" rows="5"><?php echo isset($blog->meta_description) ? $blog->meta_description : '' ?></textarea>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="exampleInputFile" class="col-sm-2">Image</label>
                        <div class="col-sm-4">
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="col-sm-4">
                            <?php
                            if (isset($blog->image) && $blog->image != '') {
                                $url = ASSET . 'upload/blog/resize/' . $blog->image;
                            } else {
                                $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                            }
                            ?>
                            <img id="image_priview" style="width: 50px;" src="{{url($url)}}">
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-1"></div>
                        <label for="status" class="col-sm-2">Status</label>
                        <div class="col-sm-8">
                            <select id="status" class="form-control" name="status" data-validation="required">
                                <option value="">----Select Status----</option>
                                <option value="1" <?php if (isset($blog->status)) {
                                if ($blog->status == '1') {
                                    echo 'selected';
                                }
                            } ?>>Active</option>
                                <option value="0" <?php if (isset($blog->status)) {
                                if ($blog->status == '0') {
                                    echo 'selected';
                                }
                            } ?>>Inactive</option>
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
<script src="{!! asset(ASSET.'js/Admin/blog.js')!!}"></script>
<script type="text/javascript">
            $(document).ready(function () {
                admin.blog.initialize();
                CKEDITOR.replace('description', { customConfig: "{!! asset(ASSET.'js/custom_config.js')!!}"})
            });
</script>
@endsection