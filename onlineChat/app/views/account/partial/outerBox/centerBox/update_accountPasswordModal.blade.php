
<!-- Update Account Password Modal -->
<div class="modal fade" id="update-password" tabindex="-1" role="dialog" aria-labelledby="updatepassword" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updatepassword">Update Password</h4>
            </div>

            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="oldpasswd"  data-placement="top" placeholder="Current Password" autocomplete="off" required>
                </div>
                <br clear="all">

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="newpasswd"  data-placement="top" placeholder="New Password" autocomplete="off" required>
                </div>
                <br clear="all">

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="verifynewpasswd"  data-placement="top" placeholder="Verify New Password" autocomplete="off" required>
                </div>

                <div id="update_passwd_status" style="margin:0 auto;" align="center"></div>

            </div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;">Close</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_update_passwd('abcdefgh123');">Save changes</span>
            </div>
        </div>
    </div>
</div>

