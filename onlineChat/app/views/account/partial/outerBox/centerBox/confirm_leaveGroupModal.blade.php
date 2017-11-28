
<!-- Confirm leave group -->
<!-- Modal -->
<div id="v-leave-this-group-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-leave-the-group" style="display:none;"></div>
<div class="modal fade" id="v-leave-the-group" tabindex="-1" role="dialog" aria-labelledby="vleavethegroup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vleavethegroup">Confirmation</h4>
            </div>

            <div class="modal-body"><span id="leave_group_message_text"></span></div>
            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">

                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_leave_this_group_now();">Yes</span>
                <span class="btn btn-default" data-dismiss="modal">No</span>

            </div>
        </div>
    </div>
</div>
