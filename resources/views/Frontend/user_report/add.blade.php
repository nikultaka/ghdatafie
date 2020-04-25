

@extends('Frontend.new_layouts.inner_main')



@section('pageTitle',$title)

@section('pageHeadTitle',$title)



@section('content')



<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance:textfield;
    }
</style>

<!-- Main content -->

<section class="content">



    <!-- Default box -->

    <div class="container">

        <?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>

        <div class="box m-4">

            <div class="box-header with-border">

                <h3 class="box-title text-center">Add Reports</h3>



                <p id="msg_main"></p>

            </div>

            <div class="box-body">

                <form class="form-horizontal" role="form" method="post" id="frm_reports" name="frm_reports" enctype="multipart/form-data" onsubmit="return false;"> 

                    {{ csrf_field() }}

                    <div class="card-body">

                        <input type="hidden" name="id" id="id" value="<?php echo isset($reports->id) ? $reports->id : '' ?>">

                        <div class="row form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <div class="row form-group">
                                    <label for="title" class="col-sm-3">Category</label>
                                    <div class="col-sm-9">
                                        <select id="sub_category_id" name="sub_category_id" class="form-control" data-validation="required">
                                            <option value="">----Select Category----</option>
                                            <?php
                                            if (!empty($sub_category)) {
                                                foreach ($sub_category as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $value->id; ?>" <?php
                                                    if (isset($reports->sub_category_id)) {
                                                        if ($reports->sub_category_id == $value->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>><?php echo $value->name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="title" class="col-sm-3">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo isset($reports->title) ? $reports->title : '' ?>" name="title" id="title" data-validation="required" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="title_on_book_icon" class="col-sm-3">Title on Book Icon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title_on_book_icon" id="title_on_book_icon" data-validation="required" value="<?php echo isset($reports->title_on_book) ? $reports->title_on_book : '' ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="font_size_on_book_icon" class="col-sm-3">Font Size of Title on Book Icon</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="font_size_on_book_icon" id="font_size_on_book_icon" onkeypress="return isNumberKey(event)" placeholder="By Default 10" value="<?php echo isset($reports->font_size_on_book) ? $reports->font_size_on_book : '' ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <?php
                                        if (isset($reports->book_icon) && $reports->book_icon != '') {
                                            $url = ASSET . 'upload/reports/books_icon/' . $reports->book_icon;
                                        } else {
                                            $url = ASSET . 'new_frontend/img/common_book_image.png';
                                        }
                                        ?>
                                        <img id="book_icon_priview" src="{{url($url)}}">
                                        <input type="hidden" id="book_icon" name="book_icon" value="<?= isset($reports->book_icon) ? $reports->book_icon : '' ?>"/>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="short_desc" class="col-sm-2">Short Description</label>

                            <div class="col-sm-8">

                                <textarea id="short_desc" class="form-control" name="short_desc" rows="5" cols="80" data-validation="required"><?php echo isset($reports->short_desc) ? $reports->short_desc : '' ?></textarea>

                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="description" class="col-sm-2">Description Editor</label>

                            <div class="col-sm-8">

                                <textarea id="description" class="form-control" class="editor" name="description" rows="10" cols="80"><?php echo isset($reports->description) ? $reports->description : '' ?></textarea>

                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="price" class="col-sm-2">Price</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="price" id="price" value="<?php echo isset($reports->price) ? $reports->price : '' ?>" data-validation="required" data-validation="number" data-validation-allowing="float"/>

                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="pages" class="col-sm-2">Pages</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="pages" id="pages" value="<?php echo isset($reports->pages) ? $reports->pages : '' ?>" data-validation="required" data-validation="number" data-validation-allowing="float"/>

                            </div>

                            <div class="col-sm-1"></div>

                        </div> 

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="language" class="col-sm-2">Language</label>

                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="language" id="language" value="<?php echo isset($reports->language) ? $reports->language : '' ?>" data-validation="required"/>

                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="release_date" class="col-sm-2">Release Date</label>

                            <div class="col-sm-8">

                                <input type="date" class="form-control" name="release_date" id="release_date" value="<?php echo isset($reports->release_date) ? $reports->release_date : '' ?>" data-validation="required"/>

                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">

                            <div class="col-sm-1"></div>

                            <label for="report_doc" class="col-sm-2">Report Docs</label>

                            <div class="col-sm-4">

                                <input type="file" class="form-control" accept=".ppt,.pptx,.pdf" name="report_doc" id="report_doc" 

                                       data-validation="mime size" 

                                       data-validation-allowing="pdf,pptx"

                                       data-validation-max-size="2M">

                            </div>

                            <div class="col-sm-4">
                                <?php echo isset($reports->report_doc) ? $reports->report_doc : ''; ?>
                            </div>

                            <div class="col-sm-1"></div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-1"></div>
                            <label for="inphographic_image" class="col-sm-2">Inphographic</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" accept="image/*" name="inphographic_image" id="inphographic_image" 
                                       data-validation="mime size" 
                                       data-validation-allowing="jpg, png, gif"
                                       data-validation-max-size="2M"
                                       data-validation-error-msg-mime="You can only upload images" >
                            </div>
                            <div class="col-sm-4">
                                <?php
                                if (isset($reports->infographic_image) && $reports->infographic_image != '') {
                                    $url = ASSET . 'upload/reports/infographic/' . $reports->infographic_image;
                                } else {
                                    $url = ASSET . 'upload/' . NO_IMAGE_AVAILABLE;
                                }
                                ?>
                                <img id="inphographic_image_priview" style="width: 50px;" src="{{url($url)}}">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>



                    </div>

                    <div class="p-4">

                        <center><button type="submit" class="btn btn-primary sub-reports">Submit</button></center>

                    </div>

                </form>

            </div>

            <!-- /.box-body -->



        </div>

        <!-- /.box -->

    </div>

</section>

<!-- /.content -->



@endsection

@section('bottomscript')

<script src="{!!asset(ASSET.'bower_components/datatables.net/js/jquery.dataTables.min.js')!!}"></script>

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>



<!--<script src="{!! asset('js/ckeditor.js')!!}"></script>-->



<script src="{!! asset(ASSET.'js/frontend/reports.js')!!}"></script>

<script type="text/javascript">

                                                    $(document).ready(function () {

                                                frontend.reports.initialize();

                                                CKEDITOR.replace('description');

                                            });

</script>

@endsection