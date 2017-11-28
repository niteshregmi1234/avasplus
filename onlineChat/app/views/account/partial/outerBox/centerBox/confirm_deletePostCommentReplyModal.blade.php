<!-- Confirm deletion of post, comment or reply -->
<!-- Modal -->
<div id="v-delete-wall-item-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-delete-wall-item" style="display:none;"></div>
<div class="modal fade" id="v-delete-wall-item" tabindex="-1" role="dialog" aria-labelledby="vdeletewallitem" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vdeletewallitem">Confirmation</h4>
            </div>
            <div class="modal-body"><span id="v_this_wall_item_del_message"></span></div>
            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_delete_the_wall_item();">Yes</span>
                <span class="btn btn-default" data-dismiss="modal">No</span>

            </div>
        </div>
    </div>
</div>


