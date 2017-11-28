<!-- Confirm remove friend from the tagged friends list -->
<!-- Modal -->
<div id="v-remove-friend-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-remove-friend" style="display:none;"></div>
<div class="modal fade" id="v-remove-friend" tabindex="-1" role="dialog" aria-labelledby="removefriend" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="removefriend">Confirmation</h4>
            </div>

            <div class="modal-body"><span id="remove_friend_message"></span></div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">

                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_remove_this_tagged_friend();">Yes</span>
                <span class="btn btn-default" data-dismiss="modal">No</span>

            </div>
        </div>
    </div>
</div>

