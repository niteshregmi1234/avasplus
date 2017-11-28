
<!-- Confirm delete group -->
<!-- Modal -->
<div id="v-delete-this-group-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-delete-the-group" style="display:none;"></div>
<div class="modal fade" id="v-delete-the-group" tabindex="-1" role="dialog" aria-labelledby="vdeletethegroup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vdeletethegroup">Confirmation</h4>
            </div>

            <div class="modal-body"><span id="delete_group_message_text"></span></div>
            <input type="hidden" id="dgroupid" />
            <input type="hidden" id="dgroupmanager" />
            <input type="hidden" id="dgroupname" />
            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">

                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_delete_this_group_now();">Yes</span>
                <span class="btn btn-default" data-dismiss="modal">No</span>

            </div>
        </div>
    </div>
</div>

