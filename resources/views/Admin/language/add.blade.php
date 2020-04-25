<form class="form-horizontal" id="frm_language" name="frm_language" method="post" onsubmit="return false;">
    <div class="modal fade" id="add_language_model" role="dialog">
        <div class="modal-dialog">
            <!--modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Language</h4>
                </div>
                <div class="modal-body">
                    
                        <p id="msg"></p>
                         {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="title" class="col-sm-2"> Language Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="" name="name" id="name" data-validation="required" />
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-sm-1"></div>
                                <label for="status" class="col-sm-2">Status</label>
                                <div class="col-sm-8">
                                    <select id="status" class="form-control" name="status" data-validation="required">
                                        <option value="">----Select Status----</option>
                                        <option value="1" <?php if(isset($banner->status)){ if($banner->status == '1'){echo 'selected';}} ?>>Active</option>
                                        <option value="0" <?php if(isset($banner->status)){ if($banner->status == '0'){echo 'selected';}} ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>

                        
                    </div>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>