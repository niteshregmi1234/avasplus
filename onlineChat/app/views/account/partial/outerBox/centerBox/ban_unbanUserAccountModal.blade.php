
<!-- Ban or Unban User Account sModal -->
<div class="modal fade" id="ban-unban-confirmation" tabindex="-1" role="dialog" aria-labelledby="banunbanconfirmation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="banunbanconfirmation">Confirmation</h4>
            </div>
            <div class="modal-body"><span id="ban_or_unban_user_message"></span></div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;">No</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_ban_unban_user_account_confirmation_action('yes');">Yes</span>
                <div id="project_deletion_status"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletion-account-confirmation" tabindex="-1" role="dialog" aria-labelledby="deletionaccountconfirmation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deletionaccountconfirmation">Confirmation</h4>
            </div>

            <div class="modal-body"><span id="delete_account_question"></span></div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;">No</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpblog_user_account_confirmation_action('yes');">Yes</span>
                <div id="project_deletion_status"></div>
            </div>
        </div>
    </div>
</div>

