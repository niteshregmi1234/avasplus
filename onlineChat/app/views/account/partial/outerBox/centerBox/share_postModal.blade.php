
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

