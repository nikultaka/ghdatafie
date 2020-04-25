@extends('Admin.layouts.dashboard.main')



@section('pageTitle','Add Dataset')

@section('pageHeadTitle','Dataset')



@section('content')



<!-- Main content -->

<section class="content">



  <!-- Default box -->

  <div class="box">

    <div class="box-header with-border">

      <h3 class="box-title">Add Dataset</h3>



      <div class="box-tools pull-right">

         <a href="{{url(ADMIN.'/dataset/list')}}" class="btn btn-info btn-sm">Dataset List</a> 

      </div>

      <p id="msg_main"></p>

    </div>

    <div class="box-body">

        <form class="form-horizontal" role="form" method="post" id="frm_dataset" name="frm_dataset" enctype="multipart/form-data" onsubmit="return false"> 

                        {{ csrf_field() }}

                        <div class="card-body">

                            <input type="hidden" name="id" id="id" value="<?php echo isset($dataset->fld_dataset_id) ? $dataset->fld_dataset_id : '' ?>">

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="title" class="col-sm-2">Brand</label>

                                <div class="col-sm-8">

                                    <select id="category_id" name="category_id" class="form-control" data-validation="required">

                                        <option value="">----Select Category----</option>

                                    <?php 

                                        if(!empty($brand)){

                                            foreach ($brand as $key => $value) { ?>

                                                <option value="<?php echo $value->id;?>" <?php if(isset($dataset->fld_category_id)){ if($dataset->fld_category_id == $value->id){echo 'selected';}} ?>><?php echo $value->title;?></option>

                                    <?php   } 

                                        }

                                    ?>

                                    </select>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="title" class="col-sm-2">Title</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" value="<?php echo isset($dataset->fld_dataset_title) ? $dataset->fld_dataset_title : '' ?>" name="title" id="title" data-validation="required" />

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="short_desc" class="col-sm-2">Short Description</label>

                                <div class="col-sm-8">

                                    <textarea id="short_desc" class="form-control" name="short_desc" rows="5" cols="80" data-validation="required"><?php echo isset($dataset->fld_shortdescription) ? $dataset->fld_shortdescription : '' ?></textarea>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="description" class="col-sm-2">Description</label>

                                <div class="col-sm-8">

                                    <textarea id="description" class="form-control" class="editor" name="description" rows="10" cols="80"><?php echo isset($dataset->fld_dataset_desc) ? $dataset->fld_dataset_desc : '' ?></textarea>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="maintainer_email" class="col-sm-2">Metadata Created Date</label>

                                <div class="col-sm-8">

                                    <input type="date" class="form-control" name="meta_created_date" id="meta_created_date" value="<?php echo isset($dataset->fld_dataset_created_date) ? $dataset->fld_dataset_created_date : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="maintainer_email" class="col-sm-2">Metadata Updated Date</label>

                                <div class="col-sm-8">

                                    <input type="date" class="form-control" name="meta_updated_date" id="meta_updated_date" value="<?php echo isset($dataset->fld_dataset_updated_date) ? $dataset->fld_dataset_updated_date : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="publisher" class="col-sm-2">Publisher</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="publisher" id="publisher" value="<?php echo isset($dataset->fld_dataset_publisher) ? $dataset->fld_dataset_publisher : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="maintainer" class="col-sm-2">Contact Name </label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="maintainer" id="maintainer" value="<?php echo isset($dataset->fld_dataset_maintainer) ? $dataset->fld_dataset_maintainer : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="maintainer_email" class="col-sm-2">Contact Email</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="maintainer_email" id="maintainer_email" value="<?php echo isset($dataset->fld_dataset_maintainer_email) ? $dataset->fld_dataset_maintainer_email : '' ?>" data-validation="email"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="topic" class="col-sm-2">Topic</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="topic" id="topic" value="<?php echo isset($dataset->topic) ? $dataset->topic : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="source_url" class="col-sm-2">Source Url</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="source_url" id="source_url" value="<?php echo isset($dataset->source_url) ? $dataset->source_url : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="language" class="col-sm-2">Language</label>

                                <div class="col-sm-8">

                                    <input type="text" class="form-control" name="dataset_language" id="dataset_language" value="<?php echo isset($dataset->language) ? $dataset->language : '' ?>" data-validation="required"/>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="dataset_image" class="col-sm-2">Metadata Source Doc</label>

                                <div class="col-sm-4">

                                    <input type="file" name="dataset_image" id="dataset_image" class="form-control" 

                                            data-validation="mime size" 

                                            data-validation-allowing="pdf,txt"

                                            data-validation-max-size="2M">

                                </div>

                                <div class="col-sm-4">
                                    <?php echo isset($dataset->fld_dataset_image) ? $dataset->fld_dataset_image : '' ?>
                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="infographic" class="col-sm-2">Infographic Image</label>

                                <div class="col-sm-4">

                                    <input type="file" name="infographic" id="infographic" class="form-control" accept="image/*"

                                            data-validation="mime size" 

                                            data-validation-allowing="jpg, png, gif"

                                            data-validation-max-size="2M"
                                            
                                            data-validation-error-msg-mime="You can only upload images" />

                                   

                                </div>
                                <div class="col-sm-4">
                                    <?php 
                                    if(isset($dataset->fld_infographic) && $dataset->fld_infographic != '' ){ 
                                      $url =   ASSET.'upload/dataset/image/'.$dataset->fld_infographic;
                                    }else{
                                        $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
                                    } 
                                    ?>
                                    <img id="inphographic_image_priview" style="width: 50px;" src="{{url($url)}}">
                                </div>

                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="infographic_dataset" class="col-sm-2">Dataset</label>

                                <div class="col-sm-4">

                                    <input type="file" name="infographic_dataset" id="infographic_dataset" class="form-control"

                                            data-validation="mime size" 

                                            data-validation-allowing="pdf,txt"

                                            data-validation-max-size="2M">

                                </div>
                                <div class="col-sm-4">
                                    <?php echo isset($dataset->infographic_dataset) ? $dataset->infographic_dataset : '' ?>
                                </div>
                                <div class="col-sm-1"></div>

                            </div>

                            

                            <div class="row form-group">

                                <div class="col-sm-1"></div>

                                <label for="status" class="col-sm-2">Status</label>

                                <div class="col-sm-8">

                                    <select id="status" class="form-control" name="status" data-validation="required">

                                        <option value="">----Select Status----</option>

                                        <option value="1" <?php if(isset($dataset->fld_dataset_status)){ if($dataset->fld_dataset_status == '1'){echo 'selected';}} ?>>Active</option>

                                        <option value="0" <?php if(isset($dataset->fld_dataset_status)){ if($dataset->fld_dataset_status == '0'){echo 'selected';}} ?>>Inactive</option>

                                    </select>

                                </div>

                                <div class="col-sm-1"></div>

                            </div>



                        </div>

                        <div class="card-footer ">

                            <center><button type="submit" class="btn btn-primary sub-dataset">Submit</button></center>

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

<script src="{!! asset(ASSET.'js/Admin/dataset.js')!!}"></script>

<script type="text/javascript">

                    $(document).ready(function () {

                        admin.dataset.initialize();

                        CKEDITOR.replace('description', { customConfig: "{!! asset(ASSET.'js/custom_config.js')!!}"})

                    });

</script>

@endsection