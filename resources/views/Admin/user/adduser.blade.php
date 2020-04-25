<!--        modal-->

<form class="form-horizontal" id="frm_user" name="frm_user" action="user/add" method="post" onsubmit="return false;">

    <div class="modal fade" id="ins_user" role="dialog">

        <div class="modal-dialog">

            <input type="hidden" id="user_id" name="user_id" value="">

            <!--modal content-->

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">Create new User</h4>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <p id="msg"></p>

                        {{ csrf_field() }}

                        <div class="form-group">

                            <label for="u_name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-9">

                                <input type="text" class="form-control" name="u_name" id="u_name" data-validation="required" />

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="email" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-9">

                                <input type="email" class="form-control" name="email" id="email" data-validation="email" />

                            </div>
                            <span class="help-block form-error" id="email_exist_error"></span>

                        </div>

                        <div class="form-group">

                            <label for="password" class="col-sm-3 control-label">Password</label>

                            <div class="col-sm-9">

                                <input type="password" class="form-control" name="password" id="password" data-validation="required" />

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="u_name" class="col-sm-3 control-label">User Role</label>

                            <div class="col-sm-9">

                                <select id="role_name" name="role_name" class="form-control" data-validation="required">

                                    <option value="">----Select User Role----</option>
                                    @if(!empty($user_role))
                                        @foreach($user_role as $user)

                                        <option value="{{ $user->role_id }}">{{ $user->type }}</option>

                                        @endforeach
                                    @endif
                                </select>

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

                    <button type="submit" class="btn btn-primary sub_user" name="submit">Submit</button>

                </div>

            </div>

        </div>

    </div>

</form>



