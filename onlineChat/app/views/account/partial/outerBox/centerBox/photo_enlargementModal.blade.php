
<!-- Photo Enlargement Modal -->
<span id="vpb_clicked_enlarge_photos" style="display:none;" data-backdrop="static" data-toggle="modal" data-target="#vpb_enlarge_photos"></span>
<!-- Modal -->
<div class="modal fade" id="vpb_enlarge_photos" tabindex="-1" role="dialog" aria-labelledby="vpb_enlarge_photosLabel" aria-hidden="true">
    <div class="modal-dialog vfullscreen">
        <div class="modal-content vfullscreen_content">
            <div class="modal-header">
                <button type="button" class="close vasplus_tooltip_photo_e" data-dismiss="modal" aria-hidden="true" title="Close" style="position:absolute;top:13px; right:10px;">&times;</button>

                <span class="vp_photo_scrol_counter" style="position:absolute;top:13px; left:49%;"><span id="vp_photo_scrol_counter"><span id="vp_curnt"></span> of <span id="vp_total_phtos"></span></span></span>

                <h4 class="modal-title" id="vpb_enlarge_photosLabel"><i class="fa fa-file-image-o"></i> Photo Enlargement</h4>
            </div>
            <div class="modal-body vpb_modal_body">
                <div style="vertical-align: middle !important;height:100% !important;text-align:center; margin:0 auto;">
                    <div class="input-group" style="height:100%;">
            <span class="input-group-addon vpb_left_and_right_box">
            <i id="vpb_left_a" style="opacity:0.4;" class="fa fa-chevron-circle-left"></i>
            <i id="vpb_left_b" onClick="vpb_scroll_popup_photo_prev();" style="display:none;cursor:pointer;" title="Previous" class="fa fa-chevron-circle-left"></i>
            </span>
                        <span id="_popupText"></span>
                        <span class="vpb_wall_fullscreen_left_view">

             <span class="vholder"></span>
            </span>

                        <span class="input-group-addon vpb_left_and_right_box">
             <i id="vpb_right_a" style="opacity:0.4;" class="fa fa-chevron-circle-right"></i>
             <i id="vpb_right_b" onClick="vpb_scroll_popup_photo_next();" style="display:none;cursor:pointer;" title="Next" class="fa fa-chevron-circle-right"></i>
             </span>
                        <input type="hidden" id="total_photos_to_scroll" value="0">
                        <input type="hidden" id="current_scrolled_photo" value="0">
                        <input type="hidden" id="current_status_id" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



