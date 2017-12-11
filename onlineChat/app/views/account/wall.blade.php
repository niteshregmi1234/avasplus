@extends("layouts.layout")
@section("content")
    <div id="vas-main-body" style="background-color:#E9EAED;">
        <section id="" style="width:90%; min-height:1000px; border-left:1px solid #E6E6E6;border-right:1px solid #E6E6E6; margin:0 auto;background-color:#E9EAED !important;margin-bottom:0px !important; padding-bottom:0px !important;">
            <div class="vasplus_containers">
                <br clear="all">

                <div class="the_row" style="height:100% !important;">



                    <!-- OUTER BOX STARTS-->
                    <div class="vpb_wall_body_wrapers">


                        <!-- LEFT BOX STARTS -->
                        <div class="vpb_wall_body_left">
                            <?php if($username!=Session::get('username')){

                           echo " <div class=\"vpb_profile_name\" onmouseover=\"vpb_get_user_onmouseover_data('page_owner$username','$fullname','$country','img/avatar.gif');\" onmouseout=\"vpb_get_user_mouseout_data('page_owner$username','$fullname','$country','img/avatar.gif');\"><span id=\"p_page_name\">$fullname</span></div>";
                            }else{
                        echo "<div class=\"vpb_profile_name\" ><span id=\"p_page_name\">$fullname</span></div>";
                        }?>
                                <!-- Load User Details Starts -->
                            <div style="margin-left:120px; position: absolute; z-index:99;">    <div class="dropdown open v_load_user_detail" onmouseover="vpb_get_user_onmouseover_datas();" onmouseout="vpb_get_user_mouseout_datas();" id="vpb_load_user_page_owner{{$username}}" style="text-align:left !important; margin:0px !important;padding:0px !important;">

                                    <ul class="dropdown-menu bullet" style="border-radius:0px !important; display:block; margin:15px; z-index:9999;text-align:left !important;margin-top:10px;">

                                        <div class="dropdown-header" style="padding:10px !important;text-align:left !important; border:0px solid !important;margin:0px !important;">
                                            <div class="input-group vpb-wall-load-user-detail-wrap">
    <span class="input-group-addon vpb-wall-load-user-detail-photo" style="cursor:pointer;" onclick="window.location.href='/wall/{{$username}}';">
    <span id="vpb_load_user_photo_page_owner{{$username}}"></span>
    </span>
                                                <div class="vpb-wall-load-user-detail-others">
                                                    <span class="vpb-wall-load-user-detail-fullname" onclick="window.location.href='/wall/{{$username}}';"><span id="vpb_load_user_fullname_page_owner{{$username}}"></span></span><br>
                                                    <span style="font-weight:normal !important;" id="vpb_load_user_country_page_owner{{$username}}"></span>

                                                    <input type="hidden" id="vpb_friendship_uid_page_owner{{$username}}" value={{Session::get('username')}}>
                                                    <input type="hidden" id="vpb_friendship_fid_page_owner{{$username}}" value="{{$username}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <div class="modal-footer" style="padding:10px !important; background-color:#F6F6F6; margin:0px;">
                                            <span id="vpb_load_friendship_page_owner{{$username}}"></span>

                                            <span style="margin-left:16px !important;" class="cbt_friendship" onclick="window.location.href='/wall/{{$username}}';"><i class="fa fa-user"></i> Profile</span>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <div id="updateProfilePic">
                                <div class="profilephoto_wrap">
                                    <?php if(empty($profile_pic_name)){?>
                                        <div class="vprofilephoto" style="background-image: url('/img/avatar.gif');" onClick="vpb_popup_photo_box('{{$username}}', '1', '1', '/img/avatar.gif');">
                                    <?php } else {?>
                                        <div class="vprofilephoto" style="background-image: url('/users/{{$username}}/profilePictures/{{$profile_pic_name}}');" onClick="vpb_popup_photo_box('{{$username}}', '1', '1', '/users/{{$username}}/profilePictures/{{$profile_pic_name}}');">
                                    <?php }?>
                                    </div>
                                    <div class="vprofilephoto_editer" data-backdrop="static" data-toggle="modal" data-target="#add-profile-photo"><i class="fa fa-camera"></i> Update Photo</div>

                                </div>
                            </div>



                            <!-- Display About the Page Owner -->
                            <br clear="all">
                            <div class="vprofile_o_detail" style="border-bottom:0px solid;">
                                <div class="vprofile_o_title" style="padding:0px;"><div style="float:left; padding:10px;"><i class="fa fa-user v_the_iconed"></i> About</div>
                                    <div style="float:right; padding:10px;">

        <span id="view_or_edit_button">
        <i class="fa fa-link v_the_iconed"></i> <span class="vpb_hover vview_item" onclick="vpb_show_about_page_owner_details('normal');">View details</span>
            @if($username==Session::get('username'))
                <span class="vbreaker_item">|</span> <span class="vedit_item vasplus_tooltip_left" title="Edit" onclick="vpb_show_about_page_owner_details('edit');"><i class="fa fa-pencil"></i></span>
               @endif
                </span>
                                    </div><div style="clear:both;"></div></div>
                                <br clear="all"><br clear="all">
                            </div>



                            <!-- Display Group Details -->
                            <br clear="all">
                            <div class="vprofile_o_detail" style="border-bottom:0px solid;">
                                <div class="vprofile_o_title" style="padding:0px;"><div style="float:left; padding:10px;"><i class="fa fa-group v_the_iconed"></i> Groups</div>
                                    <div style="float:right; padding:10px;">

        <span id="view_or_edit_buttonD">
        <i class="fa fa-plus-square v_the_iconed"></i> <span class="vpb_hover vview_item" onclick="vpb_reset_current_group_details();"> Create Group</span>

        </span>

                                    </div><div style="clear:both;"></div></div>

                                <div id="vpb_get_all_the_user_groups"><div style="padding:10px;" title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div></div>

                                <input type="hidden" id="group_uid" value="poiuyt123">
                                <br clear="all"><br clear="all">
                            </div>


                            <!-- Display Page Owner's Friends -->
                            <div id="view_all_frnds">
                                <div class="vprofile_o_detail">
                                    <div class="vprofile_o_title"><div style="float:left;"><i class="fa fa-users v_the_iconed"></i> Friends · <span class="vtotals">1</span></div><div style="float:right;">


                                        </div><div style="clear:both;"></div></div>
                                    <div id="vpb_get_all_the_user_friends"><div style="padding:10px;" title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div></div>
                                </div>
                                <br clear="all"><br clear="all">
                            </div>


                            <!-- Display Page Owner's Photos -->
                            <br clear="all">
                            <div class="vprofile_o_detail">
                                <div class="vprofile_o_title"><i class="fa fa-camera v_the_iconed"></i> Photos · <span class="vtotals">0</span></div>
                                <div id="vpb_get_all_the_user_photos"><div style="padding:10px;" title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div></div>

                            </div>

                            <!-- Display Page Owner's Videos -->
                            <br clear="all"><br clear="all"><br clear="all">
                            <div class="vprofile_o_detail">
                                <div class="vprofile_o_title"><i class="fa fa-video-camera v_the_iconed"></i> Videos · <span class="vtotals">0</span></div>
                                <div id="vpb_get_all_the_user_videos"><div style="padding:10px;" title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div></div>


                            </div>

                        </div>
                        <!-- LEFT BOX ENDS -->




                        <!-- CENTER BOX STARTS -->
                        <div class="vpb_wall_body_center">
                            <div class="inner_center">


                                <!-- Display All Friend Requests Starts -->
                                <div class="vmiddle_other" id="vasplus_wall_friend_requests">
                                    <div class="vmiddle_other_title vprofile_o_title">
                                        <div style="float:left;">Friend Requests</div>
                                        <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                            <button type="button" class="close vasplus_tooltip_photo_e" style="margin:0px !important;" title="Close" onClick="vpb_show_status_updates();">×</button>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="padding:10px;" id="vpb_display_wall_friend_requests"></div>
                                </div>
                                <!-- Display All Friend Requests Ends -->


                                <!-- Display Find Friend Box Starts -->
                                <div class="vmiddle_other" style="border-bottom:0PX solid !important;" id="vasplus_wall_find_friends">
                                    <div class="vmiddle_other_title vprofile_o_title" style="border-bottom:0px solid;">
                                        <div style="float:left;">Find Friend</div>
                                        <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                            <button type="button" class="close vasplus_tooltip_photo_e" style="margin:0px !important;" title="Close" onClick="vpb_show_status_updates();">×</button>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>

                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-plus-plus" name="vfrnds_data" id="vfrnds_data" value="" placeholder="Search..." autocomplete="off" style=" border-left:0px solid !important;" onKeyUp="vpb_search_friends();" onKeyDown="vpb_search_friends();">
                                        <span class="input-group-addon input-group-addon-plus" onClick="vpb_search_friends();" style="border-radius:0px !important; border-right:0px solid;"><i class="fa fa-search"></i></span>

                                    </div>

                                    <div style="padding:10px;" id="vpb_display_wall_find_friends"></div>
                                </div>
                                <!-- Display Find Friend Box Ends -->


                                <!-- Display All Page Owner's Friends Starts -->
                                <div class="vmiddle_other" id="vasplus_page_owners_friends">
                                    <div class="vmiddle_other_title vprofile_o_title">
                                        <div style="float:left;">Friends · <span class="vtotals">1</span></div>
                                        <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                            <button type="button" class="close vasplus_tooltip_photo_e" style="margin:0px !important;" title="Close" onClick="vpb_show_status_updates();">×</button>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>


                                    <div id="vpb_get_all_the_users_friends"><div style="padding:10px;padding-bottom:0px;" title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div></div>
                                    <div style="padding:10px;" id="vpb_display_page_owners_friends"></div>
                                </div>
                                <!-- Display All Page Owner's Friends Ends -->


                                <!-- Display About the Page Owner Details Starts -->
                                <div class="vmiddle_other enable_this_box" id="vasplus_about_page_owner">
                                    <div class="vmiddle_other_title vprofile_o_title">
                                        <div style="float:left;">Details</div>
                                        <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                            <button type="button" class="close vasplus_tooltip_photo_e" style="margin:0px !important;" title="Close" onClick="vpb_show_status_updates();">×</button>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="padding:10px;" id="vpb_display_about_page_owner"></div>
                                </div>
                                <!-- Display About the Page Owner Details Ends -->


                                <!-- Display All Notifications Details Starts -->
                                <div class="vmiddle_other enable_this_box" id="vasplus_notifications">
                                    <div class="vmiddle_other_title vprofile_o_title">
                                        <div style="float:left;">Notifications</div>
                                        <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                            <button type="button" class="close vasplus_tooltip_photo_e" style="margin:0px !important;" title="Close" onClick="vpb_show_status_updates();">×</button>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="padding:10px;" id="vpb_display_vnotifications"></div>
                                </div>
                                <!-- Display All Notifications Details Ends -->


                                <!-- Display Status Updates -->
                                <div id="vasplus_wall_status_updates" style="width:100%;" class="vmiddle_others">

                                    <div id="vpb_status_update_wraps">
                                        <div id="v_status_update_box" class="modal-dialog v_wrapper">

                                            <input type="hidden" id="vpb_is_process_running" value="0">
                                            <input type="hidden" id="vpb_start" value="0">
                                            <input type="hidden" id="page_id" value="wall">
                                            <input type="hidden" id="viewed_post_id" value="">
                                            <input type="hidden" id="vpb_total_per_load" value="5">
                                            <input type="hidden" id="vpb_total_comments_per_load" value="10">
                                            <input type="hidden" id="vpb_total_replies_per_load" value="10">
                                            <input type="hidden" id="vpb_total_friends_per_load" value="20">
                                            <input type="hidden" id="vpb_total_group_members_per_load" value="20">
                                            <input type="hidden" id="vpb_total_groups_per_load" value="16">
                                            <input type="hidden" id="vpb_total_group_videos_per_load" value="15">
                                            <input type="hidden" id="vtotal_status_updates" value="0">
                                            <input type="hidden" id="vtotal_status_updates_by_comments" value="0">
                                            <input type="hidden" id="session_uid" value="{{$username}}">
                                            <input type="hidden" id="from_username_identity" value="poiuyt123" />
                                            <input type="hidden" id="vpb_page_owner" value="{{$username}}">
                                            <input type="hidden" id="vpb_page_identifier" value="wallfeeds">

                                            <?php if($username!=Session::get('username')){
                                                if(!empty($profile_pic_name))
                                               {
                                                echo "<input type=\"hidden\" id=\"vpb_session_pic_page_owner$username\" value=\"/users/$username/profilePictures/$profile_pic_name\" />";
                                            }else{
                                                echo "<input type=\"hidden\" id=\"vpb_session_pic_page_owner$username\" value=\"/img/avatar.gif\" />";
                                               }
                                            }?>

                                            {{--<input type="hidden" id="vpb_session_pic_page_owner{{$username}}" value="http://www.vasplus.info/photos/1511856000440826458.png" />--}}


                                            <input type="hidden" id="wall_video_action" value="">
                                            <input type="hidden" id="v_wall_is_dlt" value="">
                                            <input type="hidden" id="v_wall_is_dltype" value="">
                                            <input type="hidden" id="invalid_friends_to_share_with_field" value="Please start typing in the field specified to select a desired friend to share this update with.">
                                            <input type="hidden" id="the_status_update_was_successfully_shared_message" value="The update has been shared successfully">
                                            <input type="hidden" id="hidden_post_introduction" value="When you set a post, comment or reply to hidden, that item will remain hidden from you but accessible to others unless you Unhide the item then you can begin to see it again.<br /><br />When you delete a post, comment or reply, that item will no longer to accessible to anyone.">
                                            <input type="hidden" id="vpb_empty_field_error" value="When you set a post, comment or reply to hidden, that item will remain hidden from you but accessible to others unless you Unhide the item then you can begin to see it again.<br /><br />When you delete a post, comment or reply, that item will no longer to accessible to anyone.">
                                            <input type="hidden" id="general_system_error" value="Sorry, there was an error while trying to complete your request.<br />Please try again or contact us to report the issue should the problem persist.">
                                            <input type="hidden" id="empty_url_to_fetch_field" value="Please enter your URL in the required field to proceed.">
                                            <input type="hidden" id="invalid_url_to_fetch" value="Your URL is invalid, please enter a valid URL to proceed.">
                                            <input type="hidden" id="v_confirmation_message" value="Do you really mean to remove: ">
                                            <input type="hidden" id="invalid_status_update_field" value="Your status update field seems to be blank.<br>Please write something or attach a photo to update your status.">
                                            <input type="hidden" id="invalid_file_attachment" value="Sorry, you added an invalid file type.<br>The extension of files allowed are jpg, jpeg, gif and png image files.">
                                            <input type="hidden" id="invalid_comment_update_field" value="Your comment field seems to be blank.<br>Please write something or attach a photo to post your comment.">
                                            <input type="hidden" id="invalid_reply_update_field" value="Your reply field seems to be blank.<br>Please write something or attach a photo to post your reply.">
                                            <input type="hidden" id="the_edit_history_info_text" value="This is visible to anyone who can see this">
                                            <input type="hidden" id="items_del_confirm_text" value="Are you sure you want to delete this ">
                                            <input type="hidden" id="successfully_updated_profile_photo_text" value="Your profile photo has been updated successfully">
                                            <input type="hidden" id="birthday_missing_fields_text" value="You seem to have missed some fields for your date of birth.">
                                            <input type="hidden" id="started_high_school_missing_fields_text" value="You seem to have missed some fields for the date you started your high school.<br />You need to select the day, month and year fields or leave the three fields blank.">
                                            <input type="hidden" id="ended_high_school_missing_fields_text" value="You seem to have missed some fields for the date you ended your high school.<br />You need to select the day, month and year fields or leave the three fields blank."><input type="hidden" id="started_college_missing_fields_text" value="You seem to have missed some fields for the date you started your college.<br />You need to select the day, month and year fields or leave the three fields blank.">
                                            <input type="hidden" id="ended_college_missing_fields_text" value="You seem to have missed some fields for the date you ended your college.<br />You need to select the day, month and year fields or leave the three fields blank.">
                                            <input type="hidden" id="current_user_password_field_blank_text" value="Please enter your current password in the required field to proceed.">
                                            <input type="hidden" id="new_user_password_field_blank_text" value="Please enter a new password of your choice in the required field to continue." />
                                            <input type="hidden" id="report_send_successfully_message" value="Your report has been sent successfully.<br />We will respond to it as soon as possible.<br />Thank you." />
                                            <input type="hidden" id="verify_new_user_password_field_blank_text" value="Please verity your provided new password in the field specified to go.">
                                            <input type="hidden" id="verify_and_new_user_password_field_not_match_text" value="Passwords did not match. Please be sure that the new password and verify password field entries are the same and try again.">
                                            <input type="hidden" id="empty_fullname_field" value="Please enter your fullname in the required field to proceed.">
                                            <input type="hidden" id="invalid_fullname_field" value="Please enter a valid fullname  in the required field to proceed.">
                                            <input type="hidden" id="empty_username_field" value="Please enter your username in the required field to proceed.">
                                            <input type="hidden" id="invalid_username_field" value="Please enter a valid username  in the required field to proceed.">
                                            <input type="hidden" id="empty_email_field" value="Please enter your email address in the required field to proceed.">
                                            <input type="hidden" id="invalid_email_field" value="Please enter a valid email address in the required field to proceed.">
                                            <input type="hidden" id="empty_reporting_post_field_text" value="Please enter the reason why you want to make a report in the field specified to proceed.">

                                            <input type="hidden" id="successfully_updated_group_photo_text" value="The group photo has been updated successfully">
                                            <input type="hidden" id="saved_group_details_successfully_text" value="The group information have been saved successfully.">
                                            <input type="hidden" id="empty_group_name_text" value="Please enter your desired group name in the field specified to proceed.">
                                            <input type="hidden" id="empty_group_members_name_text" value="Please start typing a name to see some suggested people who you can click on to add them in the group to proceed.">
                                            <input type="hidden" id="group_leave_message_text" value="Are you really sure to leave the group ">
                                            <input type="hidden" id="group_delete_message_text" value="Are you really sure to delete ">
                                            <input type="hidden" id="group_has_no_photo_text" value="group does not have any new photo to display at the moment.">
                                            <input type="hidden" id="empty_group_photo_text" value="Please click on the browse button to select a photo for the group to proceed.">
                                            <input type="hidden" id="empty_group_type_text" value="Please click on a privacy option for the group such as Public or Secret to proceed.">
                                            <input type="hidden" id="empty_group_desc_text" value="Please enter a brief description about the group to proceed.">
                                            <input type="hidden" id="group_photo_title_text" value="Group Photo">

                                            <input type="hidden" id="not_enough_reporting_post_field_text" value="Sorry, that's not enough reason to make a report.<br />Please enter the reason why you want to make a report to proceed.">
                                            <input type="hidden" id="vpb_current_image_id" value="0" />
                                            <input type="hidden" id="no_video_link_message" value="Please enter a valid supported video link in the field specified to proceed.">

                                            <input type='hidden' id='v_loading_btn' value='<div title="Loading..." class="btn_loading">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div>'>

                                            <input type='hidden' id='v_loadings_btn' value='<div title="Loading..." class="btn_loadings">Loading<span class="dots"><span>.</span><span>.</span><span>.</span></span></div>'>

                                            <input type='hidden' id='v_sending_btn' value='<div title="Please wait..." class="btn_loading">Please wait<span class="dots"><span>.</span><span>.</span><span>.</span></span></div>'>

                                            <input type='hidden' id='v_removing_btn' value='<div title="Removing..." class="btn_loading">Removing<span class="dots"><span>.</span><span>.</span><span>.</span></span></div>'>

                                            <input type="hidden" id="vpb_loading_image_gif" value='<br clear="all" /><center><div onMouseDown="return false;" onMouseMove="return false;" onMouseUp="return false;" onselectstart="return false;" class="vpb_loading_rounds" align="center"><img src="/img/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/><br><div align="center" style="margin-top:15px;">Please wait</div></div></center>' />

                                            <input type="hidden" id="vpb_loading_c_image_gif" value='<center><div onMouseDown="return false;" onMouseMove="return false;" onMouseUp="return false;" onselectstart="return false;" class="vpb_loading_c_rounds" align="center"><img src="/img/loadings.gif" alt="Loading...." align="absmiddle" title="Loading...."/><br><div align="center" style="margin-top:15px;">Loading</div></div></center>' />


                                            <input type="hidden" id="admin_ban_user_account_text" value="Are you sure that you really want to ban the account of ">
                                            <input type="hidden" id="admin_unban_user_account_text" value="Are you sure that you really want to un-ban the account of ">
                                            <input type="hidden" id="admin_delete_user_account_text" value="Are you sure that you really want to delete the account of ">
                                            <input type="hidden" id="admin_users_management_text" value="Users Management">
                                            <input type="hidden" id="admin_settings_text" value="Settings">
                                            <input type="hidden" id="admin_website_save_deails_empty_fields_text" value="Please enter site name, email address, short description and keywords to save your changes.">

                                            <input type='hidden' id='v_previous_security_setting' value='<i class="fa fa-certificate"></i> Public <span class="caret"></span>'>

                                            <input type='hidden' id='v_current_security_setting' value='<i class="fa fa-certificate"></i> Public <span class="caret"></span>'>

                                            <div class="modal-content vasplus_a enable_this_box" id="vpb_status_update_box">

                                                <div class="modal-header heading">
                                                    <div class="vasplus_aa" onClick="vpb_update_status_clicked();"><i class="fa fa-pencil-square vasplus_aaa"></i> Update Status</div>

                                                    <button id="vpb_close_post_box" type="button" class="close vasplus_tooltip_notify" style="position:absolute;top:10px; right:15px; cursor:pointer; display:none;" original-title="Close" onclick="vpb_close_post_box();">×</button>

                                                    <div class="vasplus_bb">&nbsp;</div>
                                                    <div class="vasplus_aa" onClick="vpb_hide_other_boxes();document.getElementById('v-add-photos-box').click();document.getElementById('tagged_list').style.display='none';document.getElementById('user_selected_this_location').style.display='none';"><i class="fa fa-file-image-o vasplus_aab"></i> Add Photo</div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="vasplus_c">

                                                        <div class="textarea_top_arrow-a"></div>
                                                        <div class="textarea_top_arrow-b"></div>

                                                        <!-- Status Update Textarea Box -->
                                                        <div class="input-group" style="vertical-align:top;">
                                                            <span class="input-group-addon stay-up" style="">
                                                                <a href="/wall/{{Session::get("username")}}">
                                                                    <span id="vp_profile_wall_photo" title="{{Session::get("fullname")}}">
                                                                        <?php if(empty(Session::get("profilePicName"))){?>
                                                                            <img src="/img/avatar.gif" width="40" height="40" border="0">
                                                                        <?php } else { ?>
                                                                            <img src="/users/{{Session::get("email")}}/profilePictures/{{Session::get("profilePicName")}}" width="40" height="40" border="0">
                                                                        <?php }?>
                                                                    </span>
                                                                </a>
                                                            </span>
                                                            <textarea id="vpb_wall_post_data" class="form-control vpb-textarea" placeholder="What's on your mind?" onClick="vpb_show_post_bg();vpb_hide_other_boxes();vpb_show_added_details();" onKeyUp="vpb_show_added_details();"></textarea>
                                                        </div>


                                                        <!-- Display Fetched URL contents -->
                                                        <div class="input-group vpb-tagged-list-wrap" id="url_content_wrapper">
                                                            <span id="fetched_url_content"></span>
                                                        </div>
                                                        <input type="hidden" id="vpb_link_to_fetch" value="">



                                                    </div>
                                                </div>





                                                <!-- Tagging Box starts -->

                                                <!-- Tag people in post input box -->
                                                <div class="vpb-wall-options-wrap" id="start_typing_name">
                                                    <div class="input-group" style="">
                                                        <span class="input-group-addon vpb_wall_left_text_label">With</span>
                                                        <input onKeyUp="vpb_friends_suggestion(this.value);" onClick="vpb_friends_suggestion(this.value);" type="text" id="vpb-tag" class="form-control vpb-wall-input-top-box" style="padding-top:5px !important;" placeholder="Who are you with?">
                                                        <input type="hidden" id="friend-username-to-remove-from-tagged-list" value="">
                                                        <input type="hidden" id="friend-fullname-to-remove-from-tagged-list" value="">
                                                    </div>
                                                </div>


                                                <!-- Display suggested friends for tagging purpose -->
                                                <span id="vpb-tagged-people-in-post-server-response"></span>

                                                <!-- Display friends in tagged list -->
                                                <div class="input-group vpb-tagged-list-wrap" style="" id="tagged_list">
                                                    <div><span class="v_wall_tag_with">With: </span><span id="the_tagged_friends"><span id="new_tags"></span></span></div><span id="new_tags_loading"></span>
                                                </div>
                                                <!-- Tagging Box ends --><div style="clear:both;"></div>


                                                <!-- Added Location Starts -->
                                                <!-- Location input box -->
                                                <div class="vpb-wall-options-wrap" id="user_is_at_this_location">
                                                    <div class="input-group">
                                                        <span class="input-group-addon vpb_wall_left_text_label">At</span>
                                                        <input onKeyUp="vpb_location_suggestions(this.value);" onClick="vpb_location_suggestions(this.value);" type="text" id="vpb-location" class="form-control vpb-wall-input-top-box" style="padding-top:5px !important;" placeholder="Where are you?">
                                                    </div>
                                                </div>

                                                <span id="vpb-location-server-response"></span>


                                                <!-- Display selected Location by a user -->
                                                <div class="vpb-wall-options-wrap" id="user_selected_this_location">
                                                    <input type="hidden" id="vpb-selected-location" value="">
                                                    <div class="input-group">
    <span class="input-group-addon vpb_wall_left_text_label">
    <span class="v_wall_position_info_left">At <span id="the_selected_location"></span></span>
    <span class="v_wall_position_info_right" onclick="vpb_wall_location_box('remove');" data-toggle="tooltip" title="Remove">x</span><div style="clear:both;"></div>

    </span>
                                                    </div>
                                                </div>
                                                <!-- Add Location Ends --><div style="clear:both;"></div>







                                                <!-- Photo Preview -->
                                                <div id="vpb_added_photos" class="vasinfo"><div class="row"><span id="vpb_photos"></span></div>
                                                    <div id="all_added_photos_button" class="vhover vhide" onClick="vpb_show_added_photos();">See all added photos</div>
                                                    <div id="part_added_photos_button" class="vhover vhide" onClick="vpb_hide_part_added_photos();">Collapse</div>
                                                </div>

                                                <!-- Video Preview -->
                                                <div id="vpb_added_videos" class="vasinfo"><div class="row vpb_ninety_eight_percent"><span id="vpb_video"></span></div></div>

                                                <!-- Links Preview -->
                                                <div id="vpb_added_link" class="vasinfo"></div>

                                                <div class="modal-footer vfooter">

                                                    <span id="add_a_photo_button" title="Add photos to your post" class="vfooter_wraper vasplus_tooltip_icons" onClick="vpb_hide_other_boxes();document.getElementById('v-add-photos-box').click();document.getElementById('tagged_list').style.display='none';document.getElementById('user_selected_this_location').style.display='none';"><i class="fa fa-camera vfooter_icon"></i></span>

                                                    <span id="add_a_video_button" title="Add video to your post" class="vfooter_wraper vasplus_tooltip_icons" onClick="vpb_hide_other_boxes();document.getElementById('v-add-videos-box').click();document.getElementById('tagged_list').style.display='none';document.getElementById('user_selected_this_location').style.display='none';document.getElementById('wall_video_action').value='popup';"><i class="fa fa-youtube-play vfooter_icon"></i></span>

                                                    <span title="Tag people in your post" class="vfooter_wraper vasplus_tooltip_icons" id="tag_people_button" onClick="vpb_tag_people_in_post();"><i class="fa fa-user-plus vfooter_icon"></i></span>

                                                    <span title="Add what you're doing or how you're feeling" class="vfooter_wraper vasplus_tooltip_icons" id="add_smile_button" onClick="vpb_wall_smiley_box();"><i class="fa fa-smile-o vfooter_icon"></i></span>

                                                    <span title="Add a location to your post" class="vfooter_wraper vasplus_tooltip_icons" id="add_location_button" onClick="vpb_wall_location_box('none');"><i class="fa fa-map-marker vfooter_icon"></i></span>

                                                    <!--<span data-toggle="tooltip" data-placement="top" title="Set date and time of your post" class="vfooter_wraper"><i class="fa fa-clock-o vfooter_icon"></i></span>-->

                                                    <div class="vpb_top_line"></div>

                                                    <ul class="dropdown-menu" id="vpb_the_wall_smiley_box" style="border-radius:0px !important;">
                                                        <li class="dropdown-header vpb_wall_li_bottom_border">
                                                            <span class="v_wall_position_info_left">What is your current mood?</span> <span class="v_wall_position_info_right" onclick="vpb_wall_smiley_box();">x</span><div style="clear:both;"></div></li>
                                                        <li><span id="vpb_smiley_box"></span></li>
                                                    </ul>

                                                    <div class="btn-group vfooter_wraper_b">
                                                        <button type="button" class="btn btn-success btn-wall-post" onClick="vpb_submit_status_update();">Post</button>
                                                    </div>

                                                    <div class="dropdown btn-group vfooter_wraper_b" id="selected_option_with_title" data-toggle="tooltip" data-placement="top" title="Public">

                                                        <button type="button" class="btn btn-default dropdown-toggle btn-wall-post-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onClick="vpb_hide_popup();">
           <span id="selected_option_">
           <i class="fa fa-certificate"></i> Public <span class="caret"></span>
           </span>
                                                        </button>

                                                        <input type="hidden" id="selected_security_option_" value="public">


                                                        <ul class="dropdown-menu" style="border-radius:0px !important;">
                                                            <li class="dropdown-header">Who should see this?</li>
                                                            <li>
                                                                <a onClick="vpb_selected_security_option('Public', 'public_', 'public', 'fa-certificate');">
                                                                    <span class="vpb_option_icons_space"> <i id="public_" class="fa fa-check  vasplus_ticker"></i> </span>
                                                                    <span class="vpb_option_icons_space"> <i class="fa fa-certificate"></i> </span> <b>Public</b><br>
                                                                    <span class="vpb_option_text">Anyone can see it</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a onClick="vpb_selected_security_option('Friends', 'friends_', 'friends', 'fa-user-plus');">
                                                                    <span class="vpb_option_icons_space"> <i id="friends_" class="fa fa-check v_hiddens vasplus_ticker"></i> </span>
                                                                    <span class="vpb_option_icons_space"> <i class="fa fa-user-plus"></i> </span> <b>Friends</b><br>
                                                                    <span class="vpb_option_text">Only your friend can see it</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a onClick="vpb_selected_security_option('Private', 'private_', 'private', 'fa-lock');">
                                                                    <span class="vpb_option_icons_space"> <i id="private_" class="fa fa-check v_hiddens vasplus_ticker"></i> </span>
                                                                    <span class="vpb_option_icons_space"> <i class="fa fa-lock"></i> </span> <b>Private</b><br>
                                                                    <span class="vpb_option_text">Only you can see it</span>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                        <div style="clear:both;"></div>
                                                    </div>

                                                    <div style="clear:both;"></div>

                                                </div>

                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div style="clear:both;"></div>
                                    <div id="v_sorting_box" class="dropdown v_wall_wrapper" style="border-top:22px solid #E9EAED;border-bottom:12px solid #E9EAED;margin: 0px !important;display:none;">
                                        <div id="sort_wrap" align="right">
                                            <span class="vpb_sorted_text" id="vpb_sorted_txt">Default</span>
                                            <span id="wrap_both_sort" class="the_sorting_button" onclick="vpb_sorting_box();">
   <span class="vpb_sort_icon"><i class="fa fa-angle-down"></i></span>
   <span id="vpb_sorting_text" class="vpb_sort_text">Sort</span><br clear="all">
  </span>
                                            <br clear="all">
                                        </div>

                                        <ul class="dropdown-menu" id="vpb_sorting_box" style="border-radius:0px !important;right: -1px; left: auto; top:24px;" aria-labelledby="wrap_both_sort">
                                            <li><a onClick="vpb_sort_the_status_updates('default', 'Sorted by latest Posts');"><span class="vpb_option_icons_space"> <i id="default_" class="fa fa-check vsorted_checked"></i> </span> Sort by latest Posts</a></li>
                                            <li><a onClick="vpb_sort_the_status_updates('sort_updates_by_latest_comments', 'Sorted by Posts with latest Comments');"><span class="vpb_option_icons_space"> <i id="sort_updates_by_latest_comments_" class="fa fa-check v_hiddens vsorted_checked"></i> </span> Sort by Posts with latest Comments</a></li>
                                        </ul>
                                        <input type="hidden" id="vpb_sort_option" value="default" />
                                        <input type="hidden" id="vpb_sorted_option" value="Default" />
                                    </div>

                                    <!-- Displays wall posts -->
                                    <div id="vpb_status_updated"></div>
                                    <div id="vpb_loading_status_updates"></div>
                                </div>
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



                                <!-- Show tagged friends when called -->
                                <div id="v-wall-g-data-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-wall-gdata" style="display:none;"></div>
                                <div class="modal fade" id="v-wall-gdata" tabindex="-1" role="dialog" aria-labelledby="vwallgdata" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="vwallgdata"><span id="vpb_system_data_title">Information</span></h4>
                                            </div>
                                            <div class="modal-body vpb_popup_tagged_box_e" align="center"><span id="vpb_display_wall_gen_data"></span></div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span id="v_wall_bottom_left_info" style="text-align:left;float:left; padding-top:7px; font-family:arial; font-size:13px; color:#888;"></span>
                                                <span class="btn btn-default" style="float:right;" data-dismiss="modal">Close</span><div style="clear:both;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="v-like-g-data-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-like-gdata" style="display:none;"></div>
                                <div class="modal fade" id="v-like-gdata" tabindex="-1" role="dialog" aria-labelledby="vlikegdata" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#FFF !important;">
                                                <h4 class="modal-title" id="vlikegdata"><span id="vpb_system_like_title">Information</span></h4>
                                            </div>
                                            <div class="modal-body vpb_popup_tagged_box_e" align="center"><span id="vpb_display_like_gen_data"></span></div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span id="v_wall_bottom_left_info" style="text-align:left;float:left; padding-top:7px; font-family:arial; font-size:13px; color:#888;"></span>
                                                <span class="btn btn-default" style="float:right;" data-dismiss="modal">Close</span><div style="clear:both;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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

                                <!-- Add Video Modal -->
                                <div id="v-add-videos-box" data-backdrop="static" data-toggle="modal" data-target="#v-add-videos" style="display:none;"></div>

                                <div class="modal fade" id="v-add-videos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-add-video" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="v-add-video"><i class="fa fa-video-camera"></i> Add Video</h4>
                                            </div>
                                            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">
                                                <div class="v_bodyTxt">Supported Videos are: <b>YouTube</b>, <b>Vimeo</b>, <b>Metacafe</b>, <b>Dailymotion</b> and <b>Flickr</b>.<br />
                                                    Please enter any of the supported video link in the field specified below and click on the fetch button to get the video then finally click on the continue button to proceed to your post.</div><br>
                                                <div class="row vpb_ninety_eight_percent">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-link"></i></span>
                                                        <input type="hidden" id="added_video_url" value="">
                                                        <input type="text" class="form-control" id="add_video_url" placeholder="Enter a video link...">
                                                        <span class="input-group-btn">
                <button class="btn btn-default" type="button" onClick="vpb_fetch_video();">Fetch</button>
              </span>
                                                    </div><!-- /input-group -->
                                                </div><!-- /.row -->

                                                <br><div class="row vpb_ninety_eight_percent"><div id="vpb-display-video"></div></div>

                                            </div>
                                            <div class="modal-footer">

                                                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_continue_with_video();">Continue</span>
                                                <span id="close_video_popup_button" class="btn btn-default" data-dismiss="modal" onClick="document.getElementById('add_video_url').value='';document.getElementById('vpb-display-video').innerHTML='';document.getElementById('wall_video_action').value='';">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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





                                <!-- Share post Modal -->
                                <div id="v-wall-share-this-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-wall-share-this-post" style="display:none;"></div>
                                <div class="modal fade enable_this_box" id="v-wall-share-this-post" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="vwallsharethispost" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" id="v_top_share_this_" style="display:none;">

                                                <h4 class="modal-title">

                                                    <div class="dropdown v_share_this_" style=" z-index:6;">

                                                        <button id="v_share_this_menu_" type="button" class="btn btn-default dropdown-toggle btn-wall-post-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span id="selected_option_share_option">
       <i class="fa fa-pencil-square"></i> Share on my own wall&nbsp;&nbsp;<span class="caret"></span>
       </span>
                                                        </button>

                                                        <input type="hidden" id="selected_option_shared_" value="mywall">
                                                        <input type="hidden" id="selected_friend_to_share_with" value="">
                                                        <input type="hidden" id="the_post_to_share_id" value="">
                                                        <input type="hidden" id="selected_option_shared_privacy_" value="public">
                                                        <ul class="dropdown-menu" style="border-radius:0px !important;" aria-labelledby="v_share_this_menu_">
                                                            <li class="dropdown-header">Where do you want to share this?</li>
                                                            <li>
                                                                <a id="on_my_wall_button" onClick="vpb_set_selected_share_option('Share on my own wall', 'mywall_', 'mywall', 'fa-pencil-square');">
                                                                    <span class="vpb_option_icons_space"> <i id="mywall_" class="fa fa-check vasplus_area_ticker"></i> </span>
                                                                    <span class="vpb_option_icons_space"> <i class="fa fa-pencil-square"></i> </span> Share on my own wall        </a>
                                                            </li>

                                                            <li>
                                                                <a onClick="vpb_set_selected_share_option('Share on my friend\'s wall', 'myfriend_', 'myfriend', 'fa-users');">
                                                                    <span class="vpb_option_icons_space"> <i id="myfriend_" class="fa fa-check v_hiddens vasplus_area_ticker"></i> </span>
                                                                    <span class="vpb_option_icons_space"> <i class="fa fa-users"></i> </span> Share on my friend's wall        </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div class="modal-body" style="margin:0 auto !important; text-align:center; padding:0px !important;" align="center">

                                                <div id="vfriends_suggestion_box" style="min-width:100% !important; max-width:100% !important;width:100% !important; display:none;">
                                                    <div class="input-group" style="border-radius:0px !important;">
                                                        <span class="input-group-addon vpb_share_textarea">Friends:</span>

                                                        <span class="input-group-addon vpb_share_textarea" style="display:none;min-width:100%; max-width:100%;width:100%; padding:9px !important;" id="selected_for_shares">
            <div style="float:left; text-align:left;"><span id="search_to_select_friend_for_shares"></span></div>
            <div style="float:right; text-align:right; margin-right:-3px; margin-top:-2px;">
            <span class="vpb__close_this" data-toggle="tooltip" title="Remove" onclick="vpb_removal_this_friend();">x</span>
            </div><div style="clear:both;"></div>
            </span>


                                                        <span style="width:100%;" class="search_to_select_for_shares" id="un_selected_for_shares">
             <input onKeyUp="vpb_suggest_friends_for_shares(this.value);" onKeyDown="vpb_suggest_friends_for_shares(this.value);" onClick="vpb_suggest_friends_for_shares(this.value);" type="text" class="form-control vpb_share_textarea" id="vfriends_name_suggested" placeholder="Start typing friend's name...">
              </span>

                                                    </div>
                                                    <!-- Display suggested friends for tagging purpose -->
                                                    <span id="vpb-suggested-friends-for-shares-server-response"></span>
                                                </div>

                                                <div id="v_say_something_about_this_share_box" style="min-width:100% !important; max-width:100% !important;width:100% !important; padding:10px; display:none;">
                                                    <textarea id="vpb_wall_share_post_data" onkeyup="vpb_resize_this(event);" style="padding:0px !important; padding-bottom:15px !important;" class="form-control vpb-textarea" placeholder="Say something about this..."></textarea>

                                                </div>


                                                <span id="v_share_this_conts"></span>
                                            </div>
                                            <div class="modal-footer">

                                                <div style="display:inline-block; margin-right:20px;"><span id="sharing_update_status"></span></div>

                                                <!-- Privacy Settings Begin -->
                                                <div class="dropdown dropup v_share_this_" id="vpb_share_privacy_box" style="display:none; margin-right:16px;" title="Public">

                                                    <button id="v_share_this_privacy_menu_" type="button" class="btn btn-default dropdown-toggle btn-wall-post-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span id="selected_privacy_option_share_option">
        <i class="fa fa-pencil-square"></i> Public&nbsp;&nbsp;<span class="caret"></span>
        </span>
                                                    </button>

                                                    <ul class="dropdown-menu" style="border-radius:0px !important;" aria-labelledby="v_share_this_privacy_menu_">
                                                        <li class="dropdown-header">Who should see this?</li>
                                                        <li>
                                                            <a id="v_share_publicly_button" onClick="vpb_set_selected_share_option_privacy('Public', 'public_privacy_', 'public', 'fa-certificate');">
                                                                <span class="vpb_option_icons_space"> <i id="public_privacy_" class="fa fa-check vasplus_share_privacy_ticker"></i> </span>
                                                                <span class="vpb_option_icons_space"> <i class="fa fa-certificate"></i> </span> <b>Public</b><br>
                                                                <span class="vpb_option_text">Anyone can see it</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a onClick="vpb_set_selected_share_option_privacy('Friends', 'friends_privacy_', 'friends', 'fa-user-plus');">
                                                                <span class="vpb_option_icons_space"> <i id="friends_privacy_" class="fa fa-check v_hiddens vasplus_share_privacy_ticker"></i> </span>
                                                                <span class="vpb_option_icons_space"> <i class="fa fa-user-plus"></i> </span> <b>Friends</b><br>
                                                                <span class="vpb_option_text">Only your friend can see it</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a onClick="vpb_set_selected_share_option_privacy('Private', 'private_privacy_', 'private', 'fa-lock');">
                                                                <span class="vpb_option_icons_space"> <i id="private_privacy_" class="fa fa-check v_hiddens vasplus_share_privacy_ticker"></i> </span>
                                                                <span class="vpb_option_icons_space"> <i class="fa fa-lock"></i> </span> <b>Private</b><br>
                                                                <span class="vpb_option_text">Only you can see it</span>
                                                            </a>
                                                        </li>

                                                    </ul>

                                                </div>
                                                <!-- Privacy Settings Ends -->
                                                <span class="cbtn" style="margin:0px; padding:4px 14px;" id="v_cancel_sharing_this_update" onclick="vpb_cancel_post_sharing();" data-dismiss="modal">Cancel</span>
                                                <button type="button" class="btn btn-success btn-wall-post" id="v_share_now_button" style="display:none;" onClick="vpb_submit_share_status_update();">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
                                                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_update_passwd('poiuyt123');">Save changes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Report a post Modal -->
                                <div class="modal fade enable_this_box" id="report-this-post" tabindex="-1" role="dialog" aria-labelledby="reportpost" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="reportpost">Help Us Understand What's Happening</h4>
                                            </div>
                                            <input type="hidden" id="the_posterFullname" />
                                            <input type="hidden" id="the_posterUsername" />
                                            <input type="hidden" id="the_posterEmail" />
                                            <input type="hidden" id="the_pageUsernamed" />
                                            <input type="hidden" id="the_postID" />
                                            <div class="modal-body">

                                                <div class="input-group">
                                                    <span class="input-group-addon" style="vertical-align:top; padding-top:10px !important;">Report</span>
                                                    <textarea class="form-control" id="report_post_data" style="min-height:250px !important;resize:none;"  placeholder="What is the issue with the post?"></textarea>
                                                </div>

                                                <div id="report_post_status" style="margin:0 auto;" align="center"></div>

                                            </div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="$('#report_post_data').val('');$('#report_post_status').html('');">Close</span>
                                                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_report_the_post('Poiuyt123 poiuyt123', 'poiuyt123', 'niteshregmi143@gmail.com');">Submit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="logout-confirmation" tabindex="-1" role="dialog" aria-labelledby="logoutconfirmation" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="logoutconfirmation">Confirmation</h4>
                                            </div>

                                            <div class="modal-body">Are you really sure that you want to log out from the system?</div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;">No</span>
                                                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_log_user_off('http://www.vasplus.info/logout');">Yes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Update Profile Photo Modal -->
                                <div class="modal fade" id="add-profile-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-camera vfooter_icon"></i> Update Profile Photo</h4>
                                            </div>

                                            <div class="modal-body" align="center" style="text-align:center;">

                                                <div style="width:100%; margin:0 auto;border: solid 0px #cbcbcb;font-family:arial; font-size:13px;" align="center">

                                                    <div id="vpb-display-profile-photo-preview"></div>

                                                    <input style="display:none;" type="file" id="profile_pic" onChange="document.getElementById('profile_pics').title = vpb_basename_only(this.value);vpb_profile_photo_preview(this);" />
                                                    <div id="profile_pics" class="btn btn-default" onClick="document.getElementById('profile_pic').click();" align="center"><i class="fa fa-link"></i> Browse photo</div>

                                                    <div style=" clear:both;"></div>

                                                    <center>
                                                        <div class="vpb_progress_outer_bar">
                                                            <div class="vpb_progress_inner_bar"></div >
                                                            <div class="vpb_progress_percentage">0%</div>
                                                        </div>
                                                    </center>

                                                    <div class="meter animate">
                                                        <span style="width: 50%"><span></span></span>
                                                    </div>

                                                    <center><span id="vpb_adding_profile_photo_status"></span></center>

                                                </div>

                                            </div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="document.getElementById('profile_pics').title = '';">Close</span>
                                                <span class="btn btn-default btn btn-success btn-wall-continue"  style="padding-top:5px; padding-bottom:7px;" onClick="vpb_update_profile_picture('{{$username}}');">Save changes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Default Photo Enlargement Modal -->
                                <div class="modal fade" style="z-index:999999999999;" id="vpb_photo_viewer_display_box" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="photo_viewer_box_title" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><i class="fa fa-file-image-o"></i> <span id="photo_viewer_box_title">Photo</span></h4>
                                            </div>
                                            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center"><span id="photo_viewed_contents"></span></div>
                                            <div class="modal-footer">
                                                <span class="btn btn-default" data-dismiss="modal">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Information Modal -->
                                <div id="v-wall-alert-box" data-backdrop="static" data-toggle="modal" data-target="#v-wall-information-alert" style="display:none;"></div>
                                <div class="modal fade" style="z-index:999999999999;" id="v-wall-information-alert" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-wall-info" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="v-wall-info">Information</h4>
                                            </div>
                                            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">
                                                <span id="v-wall-message"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <span id="vclose_info_box_button" class="btn btn-default" data-dismiss="modal">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Time Zone Modal -->
                                <div class="modal fade" id="vasplus_timezone_box" tabindex="-1" role="dialog" aria-labelledby="vasplustimezonebox" aria-hidden="true" style="display:none;" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title" id="vasplustimezonebox">My Timezone</h4></div>
                                            <div class="modal-body" style="text-align:left !important; line-height:28px;">
                                                <div id="timezone_show">
                                                    <span id="default_timezone_label">It appears there is no active time zone set for your browser. Please select your time zone from the given options below and click on the save button.</span><br><br>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">Time Zone</span>
                                                        <select id="my_timezone" name="my_timezone" style="min-width:100%; text-align:left !important;">
                                                            <option value="">Select your time zone.</option>
                                                            <option value="Africa/Abidjan">Africa/Abidjan  [ +0:00 ]</option>
                                                            <option value="Africa/Accra">Africa/Accra  [ +0:00 ]</option>
                                                            <option value="Africa/Addis_Ababa">Africa/Addis_Ababa  [ +3:00 ]</option>
                                                            <option value="Africa/Algiers">Africa/Algiers  [ +1:00 ]</option>
                                                            <option value="Africa/Asmara">Africa/Asmara  [ +3:00 ]</option>
                                                            <option value="Africa/Bamako">Africa/Bamako  [ +0:00 ]</option>
                                                            <option value="Africa/Bangui">Africa/Bangui  [ +1:00 ]</option>
                                                            <option value="Africa/Banjul">Africa/Banjul  [ +0:00 ]</option>
                                                            <option value="Africa/Bissau">Africa/Bissau  [ +0:00 ]</option>
                                                            <option value="Africa/Blantyre">Africa/Blantyre  [ +2:00 ]</option>
                                                            <option value="Africa/Brazzaville">Africa/Brazzaville  [ +1:00 ]</option>
                                                            <option value="Africa/Bujumbura">Africa/Bujumbura  [ +2:00 ]</option>
                                                            <option value="Africa/Cairo">Africa/Cairo  [ +2:00 ]</option>
                                                            <option value="Africa/Casablanca">Africa/Casablanca  [ +0:00 ]</option>
                                                            <option value="Africa/Ceuta">Africa/Ceuta  [ +1:00 ]</option>
                                                            <option value="Africa/Conakry">Africa/Conakry  [ +0:00 ]</option>
                                                            <option value="Africa/Dakar">Africa/Dakar  [ +0:00 ]</option>
                                                            <option value="Africa/Dar_es_Salaam">Africa/Dar_es_Salaam  [ +3:00 ]</option>
                                                            <option value="Africa/Djibouti">Africa/Djibouti  [ +3:00 ]</option>
                                                            <option value="Africa/Douala">Africa/Douala  [ +1:00 ]</option>
                                                            <option value="Africa/El_Aaiun">Africa/El_Aaiun  [ +0:00 ]</option>
                                                            <option value="Africa/Freetown">Africa/Freetown  [ +0:00 ]</option>
                                                            <option value="Africa/Gaborone">Africa/Gaborone  [ +2:00 ]</option>
                                                            <option value="Africa/Harare">Africa/Harare  [ +2:00 ]</option>
                                                            <option value="Africa/Johannesburg">Africa/Johannesburg  [ +2:00 ]</option>
                                                            <option value="Africa/Kampala">Africa/Kampala  [ +3:00 ]</option>
                                                            <option value="Africa/Khartoum">Africa/Khartoum  [ +3:00 ]</option>
                                                            <option value="Africa/Kigali">Africa/Kigali  [ +2:00 ]</option>
                                                            <option value="Africa/Kinshasa">Africa/Kinshasa  [ +1:00 ]</option>
                                                            <option value="Africa/Lagos">Africa/Lagos  [ +1:00 ]</option>
                                                            <option value="Africa/Libreville">Africa/Libreville  [ +1:00 ]</option>
                                                            <option value="Africa/Lome">Africa/Lome  [ +0:00 ]</option>
                                                            <option value="Africa/Luanda">Africa/Luanda  [ +1:00 ]</option>
                                                            <option value="Africa/Lubumbashi">Africa/Lubumbashi  [ +2:00 ]</option>
                                                            <option value="Africa/Lusaka">Africa/Lusaka  [ +2:00 ]</option>
                                                            <option value="Africa/Malabo">Africa/Malabo  [ +1:00 ]</option>
                                                            <option value="Africa/Maputo">Africa/Maputo  [ +2:00 ]</option>
                                                            <option value="Africa/Maseru">Africa/Maseru  [ +2:00 ]</option>
                                                            <option value="Africa/Mbabane">Africa/Mbabane  [ +2:00 ]</option>
                                                            <option value="Africa/Mogadishu">Africa/Mogadishu  [ +3:00 ]</option>
                                                            <option value="Africa/Monrovia">Africa/Monrovia  [ +0:00 ]</option>
                                                            <option value="Africa/Nairobi">Africa/Nairobi  [ +3:00 ]</option>
                                                            <option value="Africa/Ndjamena">Africa/Ndjamena  [ +1:00 ]</option>
                                                            <option value="Africa/Niamey">Africa/Niamey  [ +1:00 ]</option>
                                                            <option value="Africa/Nouakchott">Africa/Nouakchott  [ +0:00 ]</option>
                                                            <option value="Africa/Ouagadougou">Africa/Ouagadougou  [ +0:00 ]</option>
                                                            <option value="Africa/Porto-Novo">Africa/Porto-Novo  [ +1:00 ]</option>
                                                            <option value="Africa/Sao_Tome">Africa/Sao_Tome  [ +0:00 ]</option>
                                                            <option value="Africa/Tripoli">Africa/Tripoli  [ +2:00 ]</option>
                                                            <option value="Africa/Tunis">Africa/Tunis  [ +1:00 ]</option>
                                                            <option value="Africa/Windhoek">Africa/Windhoek  [ +2:00 ]</option>
                                                            <option value="America/Adak">America/Adak  [ -10:00 ]</option>
                                                            <option value="America/Anchorage">America/Anchorage  [ -9:00 ]</option>
                                                            <option value="America/Anguilla">America/Anguilla  [ -4:00 ]</option>
                                                            <option value="America/Antigua">America/Antigua  [ -4:00 ]</option>
                                                            <option value="America/Araguaina">America/Araguaina  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Buenos_Aires">America/Argentina/Buenos_Aires  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Catamarca">America/Argentina/Catamarca  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Cordoba">America/Argentina/Cordoba  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Jujuy">America/Argentina/Jujuy  [ -3:00 ]</option>
                                                            <option value="America/Argentina/La_Rioja">America/Argentina/La_Rioja  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Mendoza">America/Argentina/Mendoza  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Rio_Gallegos">America/Argentina/Rio_Gallegos  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Salta">America/Argentina/Salta  [ -3:00 ]</option>
                                                            <option value="America/Argentina/San_Juan">America/Argentina/San_Juan  [ -3:00 ]</option>
                                                            <option value="America/Argentina/San_Luis">America/Argentina/San_Luis  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Tucuman">America/Argentina/Tucuman  [ -3:00 ]</option>
                                                            <option value="America/Argentina/Ushuaia">America/Argentina/Ushuaia  [ -3:00 ]</option>
                                                            <option value="America/Aruba">America/Aruba  [ -4:00 ]</option>
                                                            <option value="America/Asuncion">America/Asuncion  [ -3:00 ]</option>
                                                            <option value="America/Atikokan">America/Atikokan  [ -5:00 ]</option>
                                                            <option value="America/Bahia">America/Bahia  [ -3:00 ]</option>
                                                            <option value="America/Barbados">America/Barbados  [ -4:00 ]</option>
                                                            <option value="America/Belem">America/Belem  [ -3:00 ]</option>
                                                            <option value="America/Belize">America/Belize  [ -6:00 ]</option>
                                                            <option value="America/Blanc-Sablon">America/Blanc-Sablon  [ -4:00 ]</option>
                                                            <option value="America/Boa_Vista">America/Boa_Vista  [ -4:00 ]</option>
                                                            <option value="America/Bogota">America/Bogota  [ -5:00 ]</option>
                                                            <option value="America/Boise">America/Boise  [ -7:00 ]</option>
                                                            <option value="America/Cambridge_Bay">America/Cambridge_Bay  [ -7:00 ]</option>
                                                            <option value="America/Campo_Grande">America/Campo_Grande  [ -4:00 ]</option>
                                                            <option value="America/Cancun">America/Cancun  [ -6:00 ]</option>
                                                            <option value="America/Caracas">America/Caracas  [ -4:-30 ]</option>
                                                            <option value="America/Cayenne">America/Cayenne  [ -3:00 ]</option>
                                                            <option value="America/Cayman">America/Cayman  [ -5:00 ]</option>
                                                            <option value="America/Chicago">America/Chicago  [ -6:00 ]</option>
                                                            <option value="America/Chihuahua">America/Chihuahua  [ -7:00 ]</option>
                                                            <option value="America/Costa_Rica">America/Costa_Rica  [ -6:00 ]</option>
                                                            <option value="America/Cuiaba">America/Cuiaba  [ -4:00 ]</option>
                                                            <option value="America/Curacao">America/Curacao  [ -4:00 ]</option>
                                                            <option value="America/Danmarkshavn">America/Danmarkshavn  [ +0:00 ]</option>
                                                            <option value="America/Dawson">America/Dawson  [ -8:00 ]</option>
                                                            <option value="America/Dawson_Creek">America/Dawson_Creek  [ -7:00 ]</option>
                                                            <option value="America/Denver">America/Denver  [ -7:00 ]</option>
                                                            <option value="America/Detroit">America/Detroit  [ -5:00 ]</option>
                                                            <option value="America/Dominica">America/Dominica  [ -4:00 ]</option>
                                                            <option value="America/Edmonton">America/Edmonton  [ -7:00 ]</option>
                                                            <option value="America/Eirunepe">America/Eirunepe  [ -4:00 ]</option>
                                                            <option value="America/El_Salvador">America/El_Salvador  [ -6:00 ]</option>
                                                            <option value="America/Fortaleza">America/Fortaleza  [ -3:00 ]</option>
                                                            <option value="America/Glace_Bay">America/Glace_Bay  [ -4:00 ]</option>
                                                            <option value="America/Godthab">America/Godthab  [ -3:00 ]</option>
                                                            <option value="America/Goose_Bay">America/Goose_Bay  [ -4:00 ]</option>
                                                            <option value="America/Grand_Turk">America/Grand_Turk  [ -5:00 ]</option>
                                                            <option value="America/Grenada">America/Grenada  [ -4:00 ]</option>
                                                            <option value="America/Guadeloupe">America/Guadeloupe  [ -4:00 ]</option>
                                                            <option value="America/Guatemala">America/Guatemala  [ -6:00 ]</option>
                                                            <option value="America/Guayaquil">America/Guayaquil  [ -5:00 ]</option>
                                                            <option value="America/Guyana">America/Guyana  [ -4:00 ]</option>
                                                            <option value="America/Halifax">America/Halifax  [ -4:00 ]</option>
                                                            <option value="America/Havana">America/Havana  [ -5:00 ]</option>
                                                            <option value="America/Hermosillo">America/Hermosillo  [ -7:00 ]</option>
                                                            <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis  [ -5:00 ]</option>
                                                            <option value="America/Indiana/Knox">America/Indiana/Knox  [ -6:00 ]</option>
                                                            <option value="America/Indiana/Marengo">America/Indiana/Marengo  [ -5:00 ]</option>
                                                            <option value="America/Indiana/Petersburg">America/Indiana/Petersburg  [ -5:00 ]</option>
                                                            <option value="America/Indiana/Tell_City">America/Indiana/Tell_City  [ -6:00 ]</option>
                                                            <option value="America/Indiana/Vevay">America/Indiana/Vevay  [ -5:00 ]</option>
                                                            <option value="America/Indiana/Vincennes">America/Indiana/Vincennes  [ -5:00 ]</option>
                                                            <option value="America/Indiana/Winamac">America/Indiana/Winamac  [ -5:00 ]</option>
                                                            <option value="America/Inuvik">America/Inuvik  [ -7:00 ]</option>
                                                            <option value="America/Iqaluit">America/Iqaluit  [ -5:00 ]</option>
                                                            <option value="America/Jamaica">America/Jamaica  [ -5:00 ]</option>
                                                            <option value="America/Juneau">America/Juneau  [ -9:00 ]</option>
                                                            <option value="America/Kentucky/Louisville">America/Kentucky/Louisville  [ -5:00 ]</option>
                                                            <option value="America/Kentucky/Monticello">America/Kentucky/Monticello  [ -5:00 ]</option>
                                                            <option value="America/La_Paz">America/La_Paz  [ -4:00 ]</option>
                                                            <option value="America/Lima">America/Lima  [ -5:00 ]</option>
                                                            <option value="America/Los_Angeles">America/Los_Angeles  [ -8:00 ]</option>
                                                            <option value="America/Maceio">America/Maceio  [ -3:00 ]</option>
                                                            <option value="America/Managua">America/Managua  [ -6:00 ]</option>
                                                            <option value="America/Manaus">America/Manaus  [ -4:00 ]</option>
                                                            <option value="America/Marigot">America/Marigot  [ -4:00 ]</option>
                                                            <option value="America/Martinique">America/Martinique  [ -4:00 ]</option>
                                                            <option value="America/Mazatlan">America/Mazatlan  [ -7:00 ]</option>
                                                            <option value="America/Menominee">America/Menominee  [ -6:00 ]</option>
                                                            <option value="America/Merida">America/Merida  [ -6:00 ]</option>
                                                            <option value="America/Mexico_City">America/Mexico_City  [ -6:00 ]</option>
                                                            <option value="America/Miquelon">America/Miquelon  [ -3:00 ]</option>
                                                            <option value="America/Moncton">America/Moncton  [ -4:00 ]</option>
                                                            <option value="America/Monterrey">America/Monterrey  [ -6:00 ]</option>
                                                            <option value="America/Montevideo">America/Montevideo  [ -2:00 ]</option>
                                                            <option value="America/Montreal">America/Montreal  [ -5:00 ]</option>
                                                            <option value="America/Montserrat">America/Montserrat  [ -4:00 ]</option>
                                                            <option value="America/Nassau">America/Nassau  [ -5:00 ]</option>
                                                            <option value="America/New_York">America/New_York  [ -5:00 ]</option>
                                                            <option value="America/Nipigon">America/Nipigon  [ -5:00 ]</option>
                                                            <option value="America/Nome">America/Nome  [ -9:00 ]</option>
                                                            <option value="America/Noronha">America/Noronha  [ -2:00 ]</option>
                                                            <option value="America/North_Dakota/Center">America/North_Dakota/Center  [ -6:00 ]</option>
                                                            <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem  [ -6:00 ]</option>
                                                            <option value="America/Panama">America/Panama  [ -5:00 ]</option>
                                                            <option value="America/Pangnirtung">America/Pangnirtung  [ -5:00 ]</option>
                                                            <option value="America/Paramaribo">America/Paramaribo  [ -3:00 ]</option>
                                                            <option value="America/Phoenix">America/Phoenix  [ -7:00 ]</option>
                                                            <option value="America/Port-au-Prince">America/Port-au-Prince  [ -5:00 ]</option>
                                                            <option value="America/Port_of_Spain">America/Port_of_Spain  [ -4:00 ]</option>
                                                            <option value="America/Porto_Velho">America/Porto_Velho  [ -4:00 ]</option>
                                                            <option value="America/Puerto_Rico">America/Puerto_Rico  [ -4:00 ]</option>
                                                            <option value="America/Rainy_River">America/Rainy_River  [ -6:00 ]</option>
                                                            <option value="America/Rankin_Inlet">America/Rankin_Inlet  [ -6:00 ]</option>
                                                            <option value="America/Recife">America/Recife  [ -3:00 ]</option>
                                                            <option value="America/Regina">America/Regina  [ -6:00 ]</option>
                                                            <option value="America/Resolute">America/Resolute  [ -5:00 ]</option>
                                                            <option value="America/Rio_Branco">America/Rio_Branco  [ -4:00 ]</option>
                                                            <option value="America/Santarem">America/Santarem  [ -3:00 ]</option>
                                                            <option value="America/Santiago">America/Santiago  [ -3:00 ]</option>
                                                            <option value="America/Santo_Domingo">America/Santo_Domingo  [ -4:00 ]</option>
                                                            <option value="America/Sao_Paulo">America/Sao_Paulo  [ -3:00 ]</option>
                                                            <option value="America/Scoresbysund">America/Scoresbysund  [ -1:00 ]</option>
                                                            <option value="America/Shiprock">America/Shiprock  [ -7:00 ]</option>
                                                            <option value="America/St_Barthelemy">America/St_Barthelemy  [ -4:00 ]</option>
                                                            <option value="America/St_Johns">America/St_Johns  [ -3:-30 ]</option>
                                                            <option value="America/St_Kitts">America/St_Kitts  [ -4:00 ]</option>
                                                            <option value="America/St_Lucia">America/St_Lucia  [ -4:00 ]</option>
                                                            <option value="America/St_Thomas">America/St_Thomas  [ -4:00 ]</option>
                                                            <option value="America/St_Vincent">America/St_Vincent  [ -4:00 ]</option>
                                                            <option value="America/Swift_Current">America/Swift_Current  [ -6:00 ]</option>
                                                            <option value="America/Tegucigalpa">America/Tegucigalpa  [ -6:00 ]</option>
                                                            <option value="America/Thule">America/Thule  [ -4:00 ]</option>
                                                            <option value="America/Thunder_Bay">America/Thunder_Bay  [ -5:00 ]</option>
                                                            <option value="America/Tijuana">America/Tijuana  [ -8:00 ]</option>
                                                            <option value="America/Toronto">America/Toronto  [ -5:00 ]</option>
                                                            <option value="America/Tortola">America/Tortola  [ -4:00 ]</option>
                                                            <option value="America/Vancouver">America/Vancouver  [ -8:00 ]</option>
                                                            <option value="America/Whitehorse">America/Whitehorse  [ -8:00 ]</option>
                                                            <option value="America/Winnipeg">America/Winnipeg  [ -6:00 ]</option>
                                                            <option value="America/Yakutat">America/Yakutat  [ -9:00 ]</option>
                                                            <option value="America/Yellowknife">America/Yellowknife  [ -7:00 ]</option>
                                                            <option value="Antarctica/Casey">Antarctica/Casey  [ +11:00 ]</option>
                                                            <option value="Antarctica/Davis">Antarctica/Davis  [ +5:00 ]</option>
                                                            <option value="Antarctica/DumontDUrville">Antarctica/DumontDUrville  [ +10:00 ]</option>
                                                            <option value="Antarctica/Mawson">Antarctica/Mawson  [ +5:00 ]</option>
                                                            <option value="Antarctica/McMurdo">Antarctica/McMurdo  [ +13:00 ]</option>
                                                            <option value="Antarctica/Palmer">Antarctica/Palmer  [ -3:00 ]</option>
                                                            <option value="Antarctica/Rothera">Antarctica/Rothera  [ -3:00 ]</option>
                                                            <option value="Antarctica/South_Pole">Antarctica/South_Pole  [ +13:00 ]</option>
                                                            <option value="Antarctica/Syowa">Antarctica/Syowa  [ +3:00 ]</option>
                                                            <option value="Antarctica/Vostok">Antarctica/Vostok  [ +6:00 ]</option>
                                                            <option value="Arctic/Longyearbyen">Arctic/Longyearbyen  [ +1:00 ]</option>
                                                            <option value="Asia/Aden">Asia/Aden  [ +3:00 ]</option>
                                                            <option value="Asia/Almaty">Asia/Almaty  [ +6:00 ]</option>
                                                            <option value="Asia/Amman">Asia/Amman  [ +2:00 ]</option>
                                                            <option value="Asia/Anadyr">Asia/Anadyr  [ +12:00 ]</option>
                                                            <option value="Asia/Aqtau">Asia/Aqtau  [ +5:00 ]</option>
                                                            <option value="Asia/Aqtobe">Asia/Aqtobe  [ +5:00 ]</option>
                                                            <option value="Asia/Ashgabat">Asia/Ashgabat  [ +5:00 ]</option>
                                                            <option value="Asia/Baghdad">Asia/Baghdad  [ +3:00 ]</option>
                                                            <option value="Asia/Bahrain">Asia/Bahrain  [ +3:00 ]</option>
                                                            <option value="Asia/Baku">Asia/Baku  [ +4:00 ]</option>
                                                            <option value="Asia/Bangkok">Asia/Bangkok  [ +7:00 ]</option>
                                                            <option value="Asia/Beirut">Asia/Beirut  [ +2:00 ]</option>
                                                            <option value="Asia/Bishkek">Asia/Bishkek  [ +6:00 ]</option>
                                                            <option value="Asia/Brunei">Asia/Brunei  [ +8:00 ]</option>
                                                            <option value="Asia/Choibalsan">Asia/Choibalsan  [ +8:00 ]</option>
                                                            <option value="Asia/Chongqing">Asia/Chongqing  [ +8:00 ]</option>
                                                            <option value="Asia/Colombo">Asia/Colombo  [ +5:30 ]</option>
                                                            <option value="Asia/Damascus">Asia/Damascus  [ +2:00 ]</option>
                                                            <option value="Asia/Dhaka">Asia/Dhaka  [ +7:00 ]</option>
                                                            <option value="Asia/Dili">Asia/Dili  [ +9:00 ]</option>
                                                            <option value="Asia/Dubai">Asia/Dubai  [ +4:00 ]</option>
                                                            <option value="Asia/Dushanbe">Asia/Dushanbe  [ +5:00 ]</option>
                                                            <option value="Asia/Gaza">Asia/Gaza  [ +2:00 ]</option>
                                                            <option value="Asia/Harbin">Asia/Harbin  [ +8:00 ]</option>
                                                            <option value="Asia/Ho_Chi_Minh">Asia/Ho_Chi_Minh  [ +7:00 ]</option>
                                                            <option value="Asia/Hong_Kong">Asia/Hong_Kong  [ +8:00 ]</option>
                                                            <option value="Asia/Hovd">Asia/Hovd  [ +7:00 ]</option>
                                                            <option value="Asia/Irkutsk">Asia/Irkutsk  [ +8:00 ]</option>
                                                            <option value="Asia/Jakarta">Asia/Jakarta  [ +7:00 ]</option>
                                                            <option value="Asia/Jayapura">Asia/Jayapura  [ +9:00 ]</option>
                                                            <option value="Asia/Jerusalem">Asia/Jerusalem  [ +2:00 ]</option>
                                                            <option value="Asia/Kabul">Asia/Kabul  [ +4:30 ]</option>
                                                            <option value="Asia/Kamchatka">Asia/Kamchatka  [ +12:00 ]</option>
                                                            <option value="Asia/Karachi">Asia/Karachi  [ +5:00 ]</option>
                                                            <option value="Asia/Kashgar">Asia/Kashgar  [ +8:00 ]</option>
                                                            <option value="Asia/Kathmandu">Asia/Kathmandu  [ +5:45 ]</option>
                                                            <option value="Asia/Kolkata">Asia/Kolkata  [ +5:30 ]</option>
                                                            <option value="Asia/Krasnoyarsk">Asia/Krasnoyarsk  [ +7:00 ]</option>
                                                            <option value="Asia/Kuala_Lumpur">Asia/Kuala_Lumpur  [ +8:00 ]</option>
                                                            <option value="Asia/Kuching">Asia/Kuching  [ +8:00 ]</option>
                                                            <option value="Asia/Kuwait">Asia/Kuwait  [ +3:00 ]</option>
                                                            <option value="Asia/Macau">Asia/Macau  [ +8:00 ]</option>
                                                            <option value="Asia/Magadan">Asia/Magadan  [ +11:00 ]</option>
                                                            <option value="Asia/Makassar">Asia/Makassar  [ +8:00 ]</option>
                                                            <option value="Asia/Manila">Asia/Manila  [ +8:00 ]</option>
                                                            <option value="Asia/Muscat">Asia/Muscat  [ +4:00 ]</option>
                                                            <option value="Asia/Nicosia">Asia/Nicosia  [ +2:00 ]</option>
                                                            <option value="Asia/Novokuznetsk">Asia/Novokuznetsk  [ +6:00 ]</option>
                                                            <option value="Asia/Novosibirsk">Asia/Novosibirsk  [ +6:00 ]</option>
                                                            <option value="Asia/Omsk">Asia/Omsk  [ +6:00 ]</option>
                                                            <option value="Asia/Oral">Asia/Oral  [ +5:00 ]</option>
                                                            <option value="Asia/Phnom_Penh">Asia/Phnom_Penh  [ +7:00 ]</option>
                                                            <option value="Asia/Pontianak">Asia/Pontianak  [ +7:00 ]</option>
                                                            <option value="Asia/Pyongyang">Asia/Pyongyang  [ +9:00 ]</option>
                                                            <option value="Asia/Qatar">Asia/Qatar  [ +3:00 ]</option>
                                                            <option value="Asia/Qyzylorda">Asia/Qyzylorda  [ +6:00 ]</option>
                                                            <option value="Asia/Rangoon">Asia/Rangoon  [ +6:30 ]</option>
                                                            <option value="Asia/Riyadh">Asia/Riyadh  [ +3:00 ]</option>
                                                            <option value="Asia/Sakhalin">Asia/Sakhalin  [ +10:00 ]</option>
                                                            <option value="Asia/Samarkand">Asia/Samarkand  [ +5:00 ]</option>
                                                            <option value="Asia/Seoul">Asia/Seoul  [ +9:00 ]</option>
                                                            <option value="Asia/Shanghai">Asia/Shanghai  [ +8:00 ]</option>
                                                            <option value="Asia/Singapore">Asia/Singapore  [ +8:00 ]</option>
                                                            <option value="Asia/Taipei">Asia/Taipei  [ +8:00 ]</option>
                                                            <option value="Asia/Tashkent">Asia/Tashkent  [ +5:00 ]</option>
                                                            <option value="Asia/Tbilisi">Asia/Tbilisi  [ +4:00 ]</option>
                                                            <option value="Asia/Tehran">Asia/Tehran  [ +3:30 ]</option>
                                                            <option value="Asia/Thimphu">Asia/Thimphu  [ +6:00 ]</option>
                                                            <option value="Asia/Tokyo">Asia/Tokyo  [ +9:00 ]</option>
                                                            <option value="Asia/Ulaanbaatar">Asia/Ulaanbaatar  [ +8:00 ]</option>
                                                            <option value="Asia/Urumqi">Asia/Urumqi  [ +8:00 ]</option>
                                                            <option value="Asia/Vientiane">Asia/Vientiane  [ +7:00 ]</option>
                                                            <option value="Asia/Vladivostok">Asia/Vladivostok  [ +10:00 ]</option>
                                                            <option value="Asia/Yakutsk">Asia/Yakutsk  [ +9:00 ]</option>
                                                            <option value="Asia/Yekaterinburg">Asia/Yekaterinburg  [ +5:00 ]</option>
                                                            <option value="Asia/Yerevan">Asia/Yerevan  [ +4:00 ]</option>
                                                            <option value="Atlantic/Azores">Atlantic/Azores  [ -1:00 ]</option>
                                                            <option value="Atlantic/Bermuda">Atlantic/Bermuda  [ -4:00 ]</option>
                                                            <option value="Atlantic/Canary">Atlantic/Canary  [ +0:00 ]</option>
                                                            <option value="Atlantic/Cape_Verde">Atlantic/Cape_Verde  [ -1:00 ]</option>
                                                            <option value="Atlantic/Faroe">Atlantic/Faroe  [ +0:00 ]</option>
                                                            <option value="Atlantic/Madeira">Atlantic/Madeira  [ +0:00 ]</option>
                                                            <option value="Atlantic/Reykjavik">Atlantic/Reykjavik  [ +0:00 ]</option>
                                                            <option value="Atlantic/South_Georgia">Atlantic/South_Georgia  [ -2:00 ]</option>
                                                            <option value="Atlantic/St_Helena">Atlantic/St_Helena  [ +0:00 ]</option>
                                                            <option value="Atlantic/Stanley">Atlantic/Stanley  [ -3:00 ]</option>
                                                            <option value="Australia/Adelaide">Australia/Adelaide  [ +10:30 ]</option>
                                                            <option value="Australia/Brisbane">Australia/Brisbane  [ +10:00 ]</option>
                                                            <option value="Australia/Broken_Hill">Australia/Broken_Hill  [ +10:30 ]</option>
                                                            <option value="Australia/Currie">Australia/Currie  [ +11:00 ]</option>
                                                            <option value="Australia/Darwin">Australia/Darwin  [ +9:30 ]</option>
                                                            <option value="Australia/Eucla">Australia/Eucla  [ +8:45 ]</option>
                                                            <option value="Australia/Hobart">Australia/Hobart  [ +11:00 ]</option>
                                                            <option value="Australia/Lindeman">Australia/Lindeman  [ +10:00 ]</option>
                                                            <option value="Australia/Lord_Howe">Australia/Lord_Howe  [ +11:00 ]</option>
                                                            <option value="Australia/Melbourne">Australia/Melbourne  [ +11:00 ]</option>
                                                            <option value="Australia/Perth">Australia/Perth  [ +8:00 ]</option>
                                                            <option value="Australia/Sydney">Australia/Sydney  [ +11:00 ]</option>
                                                            <option value="Europe/Amsterdam">Europe/Amsterdam  [ +1:00 ]</option>
                                                            <option value="Europe/Andorra">Europe/Andorra  [ +1:00 ]</option>
                                                            <option value="Europe/Athens">Europe/Athens  [ +2:00 ]</option>
                                                            <option value="Europe/Belgrade">Europe/Belgrade  [ +1:00 ]</option>
                                                            <option value="Europe/Berlin">Europe/Berlin  [ +1:00 ]</option>
                                                            <option value="Europe/Bratislava">Europe/Bratislava  [ +1:00 ]</option>
                                                            <option value="Europe/Brussels">Europe/Brussels  [ +1:00 ]</option>
                                                            <option value="Europe/Bucharest">Europe/Bucharest  [ +2:00 ]</option>
                                                            <option value="Europe/Budapest">Europe/Budapest  [ +1:00 ]</option>
                                                            <option value="Europe/Chisinau">Europe/Chisinau  [ +2:00 ]</option>
                                                            <option value="Europe/Copenhagen">Europe/Copenhagen  [ +1:00 ]</option>
                                                            <option value="Europe/Dublin">Europe/Dublin  [ +0:00 ]</option>
                                                            <option value="Europe/Gibraltar">Europe/Gibraltar  [ +1:00 ]</option>
                                                            <option value="Europe/Guernsey">Europe/Guernsey  [ +0:00 ]</option>
                                                            <option value="Europe/Helsinki">Europe/Helsinki  [ +2:00 ]</option>
                                                            <option value="Europe/Isle_of_Man">Europe/Isle_of_Man  [ +0:00 ]</option>
                                                            <option value="Europe/Istanbul">Europe/Istanbul  [ +2:00 ]</option>
                                                            <option value="Europe/Jersey">Europe/Jersey  [ +0:00 ]</option>
                                                            <option value="Europe/Kaliningrad">Europe/Kaliningrad  [ +2:00 ]</option>
                                                            <option value="Europe/Kiev">Europe/Kiev  [ +2:00 ]</option>
                                                            <option value="Europe/Lisbon">Europe/Lisbon  [ +0:00 ]</option>
                                                            <option value="Europe/Ljubljana">Europe/Ljubljana  [ +1:00 ]</option>
                                                            <option value="Europe/London">Europe/London  [ +0:00 ]</option>
                                                            <option value="Europe/Luxembourg">Europe/Luxembourg  [ +1:00 ]</option>
                                                            <option value="Europe/Madrid">Europe/Madrid  [ +1:00 ]</option>
                                                            <option value="Europe/Malta">Europe/Malta  [ +1:00 ]</option>
                                                            <option value="Europe/Mariehamn">Europe/Mariehamn  [ +2:00 ]</option>
                                                            <option value="Europe/Minsk">Europe/Minsk  [ +2:00 ]</option>
                                                            <option value="Europe/Monaco">Europe/Monaco  [ +1:00 ]</option>
                                                            <option value="Europe/Moscow">Europe/Moscow  [ +3:00 ]</option>
                                                            <option value="Europe/Oslo">Europe/Oslo  [ +1:00 ]</option>
                                                            <option value="Europe/Paris">Europe/Paris  [ +1:00 ]</option>
                                                            <option value="Europe/Podgorica">Europe/Podgorica  [ +1:00 ]</option>
                                                            <option value="Europe/Prague">Europe/Prague  [ +1:00 ]</option>
                                                            <option value="Europe/Riga">Europe/Riga  [ +2:00 ]</option>
                                                            <option value="Europe/Rome">Europe/Rome  [ +1:00 ]</option>
                                                            <option value="Europe/Samara">Europe/Samara  [ +4:00 ]</option>
                                                            <option value="Europe/San_Marino">Europe/San_Marino  [ +1:00 ]</option>
                                                            <option value="Europe/Sarajevo">Europe/Sarajevo  [ +1:00 ]</option>
                                                            <option value="Europe/Simferopol">Europe/Simferopol  [ +2:00 ]</option>
                                                            <option value="Europe/Skopje">Europe/Skopje  [ +1:00 ]</option>
                                                            <option value="Europe/Sofia">Europe/Sofia  [ +2:00 ]</option>
                                                            <option value="Europe/Stockholm">Europe/Stockholm  [ +1:00 ]</option>
                                                            <option value="Europe/Tallinn">Europe/Tallinn  [ +2:00 ]</option>
                                                            <option value="Europe/Tirane">Europe/Tirane  [ +1:00 ]</option>
                                                            <option value="Europe/Uzhgorod">Europe/Uzhgorod  [ +2:00 ]</option>
                                                            <option value="Europe/Vaduz">Europe/Vaduz  [ +1:00 ]</option>
                                                            <option value="Europe/Vatican">Europe/Vatican  [ +1:00 ]</option>
                                                            <option value="Europe/Vienna">Europe/Vienna  [ +1:00 ]</option>
                                                            <option value="Europe/Vilnius">Europe/Vilnius  [ +2:00 ]</option>
                                                            <option value="Europe/Volgograd">Europe/Volgograd  [ +3:00 ]</option>
                                                            <option value="Europe/Warsaw">Europe/Warsaw  [ +1:00 ]</option>
                                                            <option value="Europe/Zagreb">Europe/Zagreb  [ +1:00 ]</option>
                                                            <option value="Europe/Zaporozhye">Europe/Zaporozhye  [ +2:00 ]</option>
                                                            <option value="Europe/Zurich">Europe/Zurich  [ +1:00 ]</option>
                                                            <option value="Indian/Antananarivo">Indian/Antananarivo  [ +3:00 ]</option>
                                                            <option value="Indian/Chagos">Indian/Chagos  [ +6:00 ]</option>
                                                            <option value="Indian/Christmas">Indian/Christmas  [ +7:00 ]</option>
                                                            <option value="Indian/Cocos">Indian/Cocos  [ +6:30 ]</option>
                                                            <option value="Indian/Comoro">Indian/Comoro  [ +3:00 ]</option>
                                                            <option value="Indian/Kerguelen">Indian/Kerguelen  [ +5:00 ]</option>
                                                            <option value="Indian/Mahe">Indian/Mahe  [ +4:00 ]</option>
                                                            <option value="Indian/Maldives">Indian/Maldives  [ +5:00 ]</option>
                                                            <option value="Indian/Mauritius">Indian/Mauritius  [ +4:00 ]</option>
                                                            <option value="Indian/Mayotte">Indian/Mayotte  [ +3:00 ]</option>
                                                            <option value="Indian/Reunion">Indian/Reunion  [ +4:00 ]</option>
                                                            <option value="Pacific/Apia">Pacific/Apia  [ -11:00 ]</option>
                                                            <option value="Pacific/Auckland">Pacific/Auckland  [ +13:00 ]</option>
                                                            <option value="Pacific/Chatham">Pacific/Chatham  [ +13:45 ]</option>
                                                            <option value="Pacific/Easter">Pacific/Easter  [ -5:00 ]</option>
                                                            <option value="Pacific/Efate">Pacific/Efate  [ +11:00 ]</option>
                                                            <option value="Pacific/Enderbury">Pacific/Enderbury  [ +13:00 ]</option>
                                                            <option value="Pacific/Fakaofo">Pacific/Fakaofo  [ -10:00 ]</option>
                                                            <option value="Pacific/Fiji">Pacific/Fiji  [ +12:00 ]</option>
                                                            <option value="Pacific/Funafuti">Pacific/Funafuti  [ +12:00 ]</option>
                                                            <option value="Pacific/Galapagos">Pacific/Galapagos  [ -6:00 ]</option>
                                                            <option value="Pacific/Gambier">Pacific/Gambier  [ -9:00 ]</option>
                                                            <option value="Pacific/Guadalcanal">Pacific/Guadalcanal  [ +11:00 ]</option>
                                                            <option value="Pacific/Guam">Pacific/Guam  [ +10:00 ]</option>
                                                            <option value="Pacific/Honolulu">Pacific/Honolulu  [ -10:00 ]</option>
                                                            <option value="Pacific/Johnston">Pacific/Johnston  [ -10:00 ]</option>
                                                            <option value="Pacific/Kiritimati">Pacific/Kiritimati  [ +14:00 ]</option>
                                                            <option value="Pacific/Kosrae">Pacific/Kosrae  [ +11:00 ]</option>
                                                            <option value="Pacific/Kwajalein">Pacific/Kwajalein  [ +12:00 ]</option>
                                                            <option value="Pacific/Majuro">Pacific/Majuro  [ +12:00 ]</option>
                                                            <option value="Pacific/Marquesas">Pacific/Marquesas  [ -9:-30 ]</option>
                                                            <option value="Pacific/Midway">Pacific/Midway  [ -11:00 ]</option>
                                                            <option value="Pacific/Nauru">Pacific/Nauru  [ +12:00 ]</option>
                                                            <option value="Pacific/Niue">Pacific/Niue  [ -11:00 ]</option>
                                                            <option value="Pacific/Norfolk">Pacific/Norfolk  [ +11:30 ]</option>
                                                            <option value="Pacific/Noumea">Pacific/Noumea  [ +11:00 ]</option>
                                                            <option value="Pacific/Pago_Pago">Pacific/Pago_Pago  [ -11:00 ]</option>
                                                            <option value="Pacific/Palau">Pacific/Palau  [ +9:00 ]</option>
                                                            <option value="Pacific/Pitcairn">Pacific/Pitcairn  [ -8:00 ]</option>
                                                            <option value="Pacific/Ponape">Pacific/Ponape  [ +11:00 ]</option>
                                                            <option value="Pacific/Port_Moresby">Pacific/Port_Moresby  [ +10:00 ]</option>
                                                            <option value="Pacific/Rarotonga">Pacific/Rarotonga  [ -10:00 ]</option>
                                                            <option value="Pacific/Saipan">Pacific/Saipan  [ +10:00 ]</option>
                                                            <option value="Pacific/Tahiti">Pacific/Tahiti  [ -10:00 ]</option>
                                                            <option value="Pacific/Tarawa">Pacific/Tarawa  [ +12:00 ]</option>
                                                            <option value="Pacific/Tongatapu">Pacific/Tongatapu  [ +13:00 ]</option>
                                                            <option value="Pacific/Truk">Pacific/Truk  [ +10:00 ]</option>
                                                            <option value="Pacific/Wake">Pacific/Wake  [ +12:00 ]</option>
                                                            <option value="Pacific/Wallis">Pacific/Wallis  [ +12:00 ]</option>
                                                            <option value="UTC">UTC  [ +0:00 ]</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" id="timezone_info_text" value="To update your time zone, please select your time zone from the given options below and click on the save button." />
                                                    <br clear="all">
                                                </div>
                                                <div id="timezone_hide" style="display:none; font:arial; font-size:16px; font-weight:bold;" align="center">
                                                    Thank you for setting up your time zone!      </div>
                                            </div>
                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px; text-align:center;">

                                                <span id="timezone_settled" onClick="vpb_save_timezone();" class="btn btn-default btn btn-success btn-wall-continue" style="margin-top:0px; margin-right:10px; padding-top:4px; padding-bottom:4px; margin-left:20px;">Save</span>

                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-left:10px;">Close</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <!-- Create Group Modal -->
                                <div id="v-create-group-box" data-backdrop="static" data-toggle="modal" data-target="#v-create-group" style="display:none;"></div>

                                <div class="modal fade" id="v-create-group" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-create-groups" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="v-create-groups"><i class="fa fa-plus-square-o"></i> Create New Group</h4>
                                            </div>
                                            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">

                                                <div class="row vpb_ninety_eight_percent">

                                                    <div style="padding:20px; padding-bottom:0px;">

                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:transparent !important; border:0px solid; padding-left:0px !important; cursor:pointer; min-width:120px;text-align:right;" onClick="document.getElementById('vgroup_name').select().focus();">Group Name</span>
                                                            <input type="text" id="vgroup_name" class="form-control form-control-plus-pms" style="font-weight:normal !important; padding-left:10px; padding-right:10px;" placeholder="">
                                                        </div><br clear="all">


                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:transparent !important; border:0px solid; padding-left:0px !important; cursor:pointer; min-width:120px;text-align:right; vertical-align:top;" onClick="document.getElementById('vgroup_description').focus();">Description</span>
                                                            <textarea id="vgroup_description" class="form-control form-control-plus-pms" style="font-weight:normal !important; padding-left:10px; padding-right:10px; resize:none; overflow-y:auto; min-height:60px;" placeholder="Tell members about the group and its purpose..."></textarea>
                                                        </div><br clear="all">



                                                        <div class="input-group">

                                                            <span class="input-group-addon" style="background-color:transparent !important; border:0px solid; padding-left:0px !important;min-width:120px;text-align:right; cursor:pointer;" onClick="document.getElementById('vpb_wall_members_data').focus();">Members</span>

                                                            <span class="v_added_u_sers_span form-control form-control-plus-pms" style="display:table; padding-left:6px; padding-right:6px; text-align:left;" onClick="document.getElementById('vpb_wall_members_data').focus();">

            <span class="vpb-added-users-wraper"><span id="vpb_added_wall_users_box"></span>

              <textarea id="vpb_wall_members_data" style=" display:inline-table; vertical-align:middle;" class="vpb-input" placeholder="Start typing name..." autocomplete="off" onclick="vpb_show_prev_suggested_searched_user();"></textarea></span>
              <div style="clear:both;"></div>
              </span>

                                                            <br clear="all">
                                                            <div style="position:relative; width:100%;">
                                                                <ul id="v_suggested_wall_users_box" class="dropdown-menu pull_vwalls pull-center v_suggested_to_u_box" aria-labelledby="vpb_pms_to_data">
                                                                    <li class="v_suggested_to_u_inner_box"><div id="vpb_suggested_users_displayer"></div></li>
                                                                </ul>
                                                            </div>
                                                            <div style="clear:both;"></div>

                                                        </div><br clear="all">




                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:transparent !important; border:0px solid; padding-left:0px !important;min-width:120px; text-align:right;">Group Photo</span>

                                                            <span title="No file is chosen" onClick="document.getElementById('vgroup_picture').click();" id="vgrouppicture" class="btn btn-default" style="padding:4px 12px !important; float:left;"><i class="fa fa-link"></i> Browse</span>
                                                            <input type="file" style="display:none;" onChange="document.getElementById('vgrouppicture').title=this.value;" id="vgroup_picture" />

                                                            <div class="vpb_group_photo_wraper"><span id="vpb_display_wall_group_photo"></span></div>
                                                            <div style="clear:both;"></div>
                                                        </div> <br clear="all">



                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="background-color:transparent !important; border:0px solid; padding-left:0px !important;min-width:120px;text-align:right; vertical-align:top !important;">Privacy</span>

                                                            <div style="display:inline-block; width:100%;text-align:left;" class="vwall_radio_wrap">
               <span style="float:left; min-width:100px; text-align:left !important;">
               <input id="public_group" type="radio" name="the_vgroups" value="Yes"><label for="public_group"><span><span></span></span><i class="fa fa-certificate"></i> Public</label>
               </span>


                                                                <div style=" padding-left:28px;float:left; text-align:left; margin-top:-6px;color:#999;">
                                                                    <label for="public_group" style="font-family:arial !important; font-size:13px !important; font-weight:normal !important; cursor:pointer;">Anyone can see the group, its members and their posts.</label>
                                                                </div>
                                                                <div style="clear:both;"></div>
                                                            </div>

                                                            <br /><br />

                                                            <div style="display:inline-block; width:100%;text-align:left;" class="vwall_radio_wrap">
               <span style="float:left; min-width:100px; text-align:left !important;">
               <input id="secret_group" type="radio" name="the_vgroups" value="Yes"><label for="secret_group"><span><span></span></span><i class="fa fa-lock"></i> Secret</label>
               </span>


                                                                <div style=" padding-left:28px;float:left; text-align:left; margin-top:-6px; color:#999;">
                                                                    <label for="secret_group" style="font-family:arial !important; font-size:13px !important; font-weight:normal !important; cursor:pointer;">Only members can find the group and see posts.</label>
                                                                </div>
                                                                <div style="clear:both;"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div><!-- /.row -->
                                                <div class="row vpb_ninety_eight_percent"><div id="vpb_display_group_status"></div></div>

                                            </div>
                                            <div class="modal-footer">

                                                <div style="display:inline-block; padding-right:20px;" id="vplease_wait_loading"></div>

                                                <span id="save_group_changes_button" class="btn btn-default btn btn-success btn-wall-continue" onClick="vpb_save_wall_group_details('save');" style="display:none;">Save Changes</span>

                                                <span id="create_group_button" class="btn btn-default btn btn-success btn-wall-continue" onClick="vpb_save_wall_group_details('create');">Create</span>

                                                <span class="btn btn-default" data-dismiss="modal" onclick="$('#vpb_display_group_status').html('');">Cancel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Update Group Photo Modal -->
                                <div class="modal fade" id="add-group-photo" tabindex="-1" role="dialog" aria-labelledby="addgroupphoto" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                                                <h4 class="modal-title" id="addgroupphoto"><i class="fa fa-camera vfooter_icon"></i> Update Group Photo</h4>
                                            </div>

                                            <div class="modal-body" align="center" style="text-align:center;">

                                                <div style="width:100%; margin:0 auto;border: solid 0px #cbcbcb;font-family:arial; font-size:13px;" align="center">

                                                    <div id="vpb-display-group-photo-preview"></div>

                                                    <input style="display:none;" type="file" id="group_pic" onChange="document.getElementById('group_pics').title = vpb_basename_only(this.value);vpb_group_photo_preview(this);" />

                                                    <div id="group_pics" class="btn btn-default" onClick="document.getElementById('group_pic').click();" align="center"><i class="fa fa-link"></i> Browse photo</div>

                                                    <div style=" clear:both;"></div>

                                                    <center>
                                                        <div class="vpb_progress_outer_bar">
                                                            <div class="vpb_progress_inner_bar"></div >
                                                            <div class="vpb_progress_percentage">0%</div>
                                                        </div>
                                                    </center>

                                                    <div class="meter animate">
                                                        <span style="width: 50%"><span></span></span>
                                                    </div>

                                                    <center><span id="vpb_adding_group_photo_status"></span></center>

                                                </div>

                                            </div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">

                                                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_update_group_picture('poiuyt123');">Save changes</span>
                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-left:20px;" onclick="document.getElementById('group_pics').title = '';">Close</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>


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

                                <!-- Report a group Modal -->
                                <div class="modal fade enable_this_box" id="report-this-group" tabindex="-1" role="dialog" aria-labelledby="reportgroup" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="reportgroup">Help Us Understand What's Happening</h4>
                                            </div>
                                            <input type="hidden" id="the_groupNamed" />
                                            <input type="hidden" id="the_groupID" />
                                            <div class="modal-body">

                                                <div class="input-group">
                                                    <span class="input-group-addon" style="vertical-align:top; padding-top:10px !important;">Report</span>
                                                    <textarea class="form-control" id="report_group_data" style="min-height:250px !important;resize:none;"  placeholder="What is the issue with the group?"></textarea>
                                                </div>

                                                <div id="report_group_status" style="margin:0 auto;" align="center"></div>

                                            </div>

                                            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                                                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="$('#report_group_data').val('');$('#report_group_status').html('');">Close</span>
                                                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_report_the_group('Poiuyt123 poiuyt123', 'poiuyt123', 'niteshregmi143@gmail.com');">Submit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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


                                <input type="hidden" id="ban_or_unban_status" />
                                <input type="hidden" id="vasplus_programming_blog_hidden_item_id" />    <div class="vbottom_padding"></div>
                            </div>
                        </div>
                        <!-- CENTER BOX ENDS -->


                        <!-- RIGHT BOX STARTS -->
                        <div class="vpb_wall_body_right">

                            <!-- Display Group Details -->
                            <div class="vprofile_o_detail" style="border-bottom:0px solid !important;">
                                <div class="vprofile_o_title" style="padding:0px;">
                                    <div style="float:left; padding:10px;">
                                        &nbsp;
                                    </div>
                                    <div style="float:right; padding:10px;">


                                        <span class="create_btn" onclick="vpb_reset_current_group_details();"><i class="fa fa-plus" style="font-weight:normal !important;"></i> Create Group</span>


                                    </div><div style="clear:both;"></div></div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="clear:both;"></div>

                            <div id="vpb_get_all_the_users_groups"></div>

                            <br clear="all">
                        </div>
                        <!-- RIGHT BOX ENDS -->


                    </div>
                    <!-- OUTER BOX ENDS -->


                </div><div style="clear:both;"></div>

            </div>
        </section>
    </div>
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
    <input type="hidden" id="vpb_session_uphoto" value="photos/1511856000440826458.png">
    <input type="hidden" id="session_fname" value="Poiuyt123 Poiuyt123">
    <input type="hidden" id="vchat_sessions_uid" value="poiuyt123">

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
@stop