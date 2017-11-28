
<!-- Add Photo Modal -->
<div id="v-add-photos-box" data-backdrop="static" data-toggle="modal" data-target="#v-add-photos" style="display:none;"></div>
<div class="modal fade" id="v-add-photos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-add-photo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="v-add-photo"><i class="fa fa-camera vfooter_icon"></i> Add Photo</h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">

                <div title="No file is chosen" onClick="document.getElementById('add_photos').click();" id="browsedPhotos" class="btn btn-default"><i class="fa fa-link"></i> Browse photos</div>

                <input type="file" id="add_photos" onChange="vpb_image_preview(this, 'Please click on the continue button below to proceed to your post or click on the Browse photos button above to select a new photo or multiple photos at a time.', 'Photo Enlargement');" class="vpb_file_browser" multiple />

                <div class="row"><div id="vpb-display-attachment-preview"></div></div>

            </div>
            <div class="modal-footer">

                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_continue_image_preview(document.getElementById('add_photos'), 'Please click on the continue button below to proceed to your post or click on the Browse photos button above to select a new photo or multiple photos at a time.', 'Photo Enlargement');">Continue</span>
                <span class="btn btn-default" data-dismiss="modal" onClick="document.getElementById('vpb-display-attachment-preview').innerHTML='';">Close</span>
            </div>
        </div>
    </div>
</div>
