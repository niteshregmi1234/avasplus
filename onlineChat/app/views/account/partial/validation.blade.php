<input type="hidden" id="vchat_website_link" value="http://www.vasplus.info/">
<input type="hidden" id="vchat_is_disabled" value="0">
<input type="hidden" id="vchat_has_disabled" value="0">
<input type="hidden" id="vchat_close_tab" value="Close tab">
<input type="hidden" id="vchat_minimize" value="Minimize">
<input type="hidden" id="vchat_maximize" value="Maximize">
<input type="hidden" id="write_a_messages_text" value="Write a message...">
<input type="hidden" id="add_a_photo_text" value="Send photos">
<input type="hidden" id="add_a_video_text" value="Send video">
<input type="hidden" id="add_a_file_text" value="Send file">
<input type="hidden" id="add_a_smiley_text" value="Add smiley">
<input type="hidden" id="see_full_conversation" value="See full conversation">
<input type="hidden" id="add_more_friends_to_chat" value="Add more friends to chat">
<input type="hidden" id="compose_new_message_text" value="New Message">
<input type="hidden" id="big_file_size_text" value="The file that you were about to send exceeded the maximum allowed file size of <b>61Mb</b>.<br>Please reduce your file size to at-least <b>61Mb</b> because your current file size is ">

<input type="hidden" id="no_friend_was_found_text" value="Your search brought no result.<br />You may want to rephrase your search term and try again.">
<input type="hidden" id="vchat_side_bar_title_text" value="Chat">
<input type="hidden" id="vchat_hide_side_bar_text" value="Hide Sidebar">
<input type="hidden" id="vchat_options_text" value="Options">
<input type="hidden" id="vchat_set_status_to_online" value="Set status to Online">
<input type="hidden" id="vchat_set_status_to_busy" value="Set status to Busy">
<input type="hidden" id="vchat_turn_off_chat_text" value="Turn off chat">
<input type="hidden" id="vchat_search_place_holder_chat_text" value="Search">
<input type="hidden" id="vchat_new_message_text" value="Open new chat window">
<input type="hidden" id="vchat_conversations_text" value="See previous conversations">
<input type="hidden" id="vchat_users_online_text" value="Click to see who is online">
<input type="hidden" id="vpb_vchat_total_per_load" value="15">
<input type="hidden" id="vpb_smileys_dir_path" value="smileys/">
<input type="hidden" id="vpb_session_uphoto" value="photos/avatar.gif">
<input type="hidden" id="session_fname" value="Abcdefgh123 Abcdefgh123">
<input type="hidden" id="vchat_sessions_uid" value="abcdefgh123">

<input type="hidden" id="vchat_general_systems_error" value="Sorry, there was an error while trying to complete your request.<br />Please try again or contact us to report the issue should the problem persist.">
<input type="hidden" id="vchat_bg_process_running_text" value="Please wait, the system is busy at the moment!">

<input type="hidden" id="vchat_video_action" value="">
<input type="hidden" id="no_vchat_video_link_message" value="Please enter a valid supported video link in the field specified to proceed.">
<input type="hidden" id="no_vchat_user_selected_message" value="Sorry, you have to select or click on who you want to message to proceed.">

<input type="hidden" id="browsed_photos_information" value="If you want to change any of the photo(s) below, please click on the Browse photos button above to select a new photo or multiple photos at a time">
<input type="hidden" id="photo_prev_information" value="Photo Enlargement">


<input type="hidden" id="no_vchat_proper_data_passed" value="Sorry, the process could not be completed due to wrong data received.">

<input type="hidden" id="wrong_vchat_files_added_text" value="Sorry, you selected an invalid file format.<br />You can only add/send files such as pdf, doc, docx, txt and zip">
<input type="hidden" id="wrong_vchat_photos_added_text" value="Sorry, you selected an invalid image file format.<br />You can only add/send images such as jpeg, jpg, gif, and png">

<input type="hidden" id="vchat_long_search_term_text" value="Sorry, your search term is too long. Please reduce your search term and try again.">

<input type="hidden" id="vchat_hidden_vbutton" value="See <span id='d_total_hidden_vchats'></span> hidden chat window<span class='add_or_remove_s'></span>">
<input type="hidden" id="vchat_hidden_hbutton" value="Hide chat window<span class='add_or_remove_s'></span>">

<input type='hidden' id='vchat_loading_btn' value='<div title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div>'>

<input type="hidden" id="vchat_loading_image_gif" value='<center><div onMouseDown="return false;" onMouseMove="return false;" onMouseUp="return false;" onselectstart="return false;" class="vpb_loading_rounds" align="center"><img src="http://www.vasplus.info/img/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/><br><div align="center" style="margin-top:15px;">Please wait</div></div></center>' />


<input type="hidden" id="current_group_id" value="" />


<!-- Default Photo Enlargement Modal -->
<div class="modal fade" style="z-index:999999999999;" id="vchat_photo_viewer_display_box" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="vchat_photo_viewer_box_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-file-image-o"></i> <span id="vchat_photo_viewer_box_title">Photo</span></h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center"><span id="vchat_photo_views_contents"></span></div>
            <div class="modal-footer">
                <span class="btn btn-default" data-dismiss="modal">Close</span>
            </div>
        </div>
    </div>
</div>

<!-- Information Modal -->
<div id="v-vchat-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-vchat-information-alert" style="display:none;"></div>
<div class="modal fade" style="z-index:999999999999;" id="v-vchat-information-alert" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-vchat-info" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="v-vchat-info">Information</h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">
                <span id="v-vchat-message"></span>
            </div>
            <div class="modal-footer">
                <span id="vchat_close_info_box_button" class="btn btn-default" data-dismiss="modal">Close</span>
            </div>
        </div>
    </div>
</div>

<!-- Add Video Modal -->
<div id="vchat-add-videos-box" data-backdrop="static" data-toggle="modal" data-target="#vchat-add-videos" style="display:none;"></div>
<div class="modal fade" id="vchat-add-videos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="vchat-add-video" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vchat-add-video"><i class="fa fa-video-camera"></i> Add Video</h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">
                <div class="v_bodyTxt">Supported Videos are: <b>YouTube</b>, <b>Vimeo</b>, <b>Metacafe</b>, <b>Dailymotion</b> and <b>Flickr</b>.<br />
                    Please enter any of the supported video link in the field specified below and click on the fetch button to get the video then finally click on the continue button to proceed to your post.</div><br>
                <div class="row vpb_ninety_eight_percent">
                    <div class="input-group">
                        <span class="input-group-addon" id="vsizing-addon2"><i class="fa fa-link"></i></span>
                        <input type="hidden" id="added_vchat_video_url" value="">
                        <input type="text" class="form-control" id="add_vchat_video_url" placeholder="Enter a video link...">
                        <span class="input-group-btn">
                <button class="btn btn-default" type="button" onClick="vpb_vchat_fetch_video();">Fetch</button>
              </span>
                    </div><!-- /input-group -->
                </div><!-- /.row -->

                <br><div class="row vpb_ninety_eight_percent"><div id="vchat-display-video"></div></div>

            </div>
            <div id="vchat_video_modal_footer" class="modal-footer">

                <span id="vchat_video_send_button" style="display:none;" class="btn btn-default btn btn-success btn-pms-continue" data-dismiss="modal" onClick="vpb_vchat_send_the_video();">Send</span>

                <span id="close_vchat_video_popup_button" class="btn btn-default" data-dismiss="modal" onClick="vpb_vchat_remove_added_video();document.getElementById('add_vchat_video_url').value='';document.getElementById('vchat-display-video').innerHTML='';document.getElementById('vchat_video_action').value='';">Cancel</span>
            </div>
        </div>
    </div>
</div>

<!-- Add Photo Modal -->
<div id="vchat-add-photos-box" data-backdrop="static" data-toggle="modal" data-target="#vchat-add-photos" style="display:none;"></div>
<div class="modal fade" id="vchat-add-photos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="vchat-add-photo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vchat-add-photo"><i class="fa fa-camera vfooter_icon"></i> Add Photos</h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">

                <div title="No file is chosen" onClick="document.getElementById('add_vchat_photos').click();" id="browsed_vchat_Photos" class="btn btn-default"><i class="fa fa-link"></i> Browse photos</div>

                <input type="file" id="add_vchat_photos" onChange="vchat_image_preview(this, 'If you want to change any of the photo(s) below, please click on the Browse photos button above to select a new photo or multiple photos at a time', 'Photo Enlargement');" style="display:none;" class="vpb_file_browser" multiple />

                <div class="row"><div id="vchat-display-attachment-preview"></div></div>

            </div>
            <div class="modal-footer">

                <span class="btn btn-default btn btn-success btn-pms-continue" data-dismiss="modal" onClick="vchat_send_files(document.getElementById('add_vchat_photos'), 'If you want to change any of the photo(s) below, please click on the Browse photos button above to select a new photo or multiple photos at a time', 'Photo Enlargement');">Send</span>

                <span class="btn btn-default" data-dismiss="modal" onClick="document.getElementById('vchat-display-attachment-preview').innerHTML='';document.getElementById('current_group_id').value='';">Close</span>
            </div>
        </div>
    </div>
</div>




<!-- Photo Enlargement Modal -->
<span id="vchat_clicked_enlarge_photos" style="display:none;" data-backdrop="static" data-toggle="modal" data-target="#vchat_enlarge_photos"></span>
<!-- Modal -->
<div class="modal fade" id="vchat_enlarge_photos" tabindex="-1" role="dialog" aria-labelledby="vchat_enlarge_photosLabel" aria-hidden="true">
    <div class="modal-dialog vfullscreen">
        <div class="modal-content vfullscreen_content">
            <div class="modal-header">
                <button type="button" class="close vasplus_tooltip_photo_e" data-dismiss="modal" aria-hidden="true" title="Close" style="position:absolute;top:13px; right:10px;">&times;</button>

                <span class="vp_photo_scrol_counter" style="position:absolute;top:13px; left:49%;"><span id="vchat_photo_scrol_counter"><span id="vchat_curnt"></span> of <span id="vchat_total_phtos"></span></span></span>

                <h4 class="modal-title" id="vchat_enlarge_photosLabel"><i class="fa fa-file-image-o"></i> Photo Enlargement</h4>
            </div>
            <div class="modal-body vpb_modal_body">
                <div style="vertical-align: middle !important;height:100% !important;text-align:center; margin:0 auto;">
                    <div class="input-group" style="height:100%;">
            <span class="input-group-addon vpb_left_and_right_box">
            <i id="vchat_left_a" style="opacity:0.4;" class="fa fa-chevron-circle-left"></i>
            <i id="vchat_left_b" onClick="vchat_scroll_popup_photo_prev();" style="display:none;cursor:pointer;" title="Previous" class="fa fa-chevron-circle-left"></i>
            </span>
                        <span id="vchat_popup_text"></span>
                        <span class="vpb_wall_fullscreen_left_view">

             <span class="vholder"></span>
            </span>

                        <span class="input-group-addon vpb_left_and_right_box">
             <i id="vchat_right_a" style="opacity:0.4;" class="fa fa-chevron-circle-right"></i>
             <i id="vchat_right_b" onClick="vchat_scroll_popup_photo_next();" style="display:none;cursor:pointer;" title="Next" class="fa fa-chevron-circle-right"></i>
             </span>
                        <input type="hidden" id="total_vchat_photos_to_scroll" value="0">
                        <input type="hidden" id="current_vchat_scrolled_photo" value="0">
                        <input type="hidden" id="current_vchat_status_id" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-footer-colors"><i class="teal"></i><i class="red"></i><i class="green"></i><i class="yellow"></i></div>
<div style="clear:both;"></div>