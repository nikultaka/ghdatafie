<section class="content">

    <div class="col-xs-12">
        <div class="card card-primary">
            <div class="modal fade" id="reply_email" role="dialog">
                <div class="modal-dialog">

                    <form class="form-horizontal" id="frm_email_send" name="frm_email_send" action="" method="post" onsubmit="return false;">
                    <!--modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Reply to user</h4>
                        </div>
                        <div class="modal-body">
                            <p id="msg"></p>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="" id="">
                                    <label for="em_name" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="em_name" id="em_name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-sm-3 control-label">Subject</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject" id="subject" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reply" class="col-sm-3 control-label">Reply</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="reply" id="reply"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-center" >
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary send" name="submit">Send</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</section>  
