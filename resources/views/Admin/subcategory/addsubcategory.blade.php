<!--        modal-->
<form class="form-horizontal" id="frm_subcategory" name="frm_subcategory" method="post" onsubmit="return false;">
    <div class="modal fade" id="ins_subcategory" role="dialog">
        <div class="modal-dialog">
            <input type="hidden" id="subcategory_id" name="subcategory_id" value="">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create new Sub Category</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <p id="msg"></p>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category_id" class="col-sm-3 control-label" >Category</label>
                            <div class="col-sm-9">
                                <select id="category_id" name="category_id" class="form-control" data-validation="required">
                                    <option value="">----Select Category----</option>
                                <?php 
                                    if(!empty($category)){
                                        foreach ($category as $key => $value) { ?>
                                            <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                <?php   } 
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subcategory_name" class="col-sm-3 control-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" data-validation="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea id="description" class="form-control" name="description" rows="5" cols="80" data-validation="required" ></textarea>
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
                    <button type="submit" class="btn btn-primary sub_subcategory" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

