<!-- Load User Details Starts -->
<div style="margin-left:120px; position: absolute; z-index:99;">
    <div class="dropdown open v_load_user_detail" onmouseover="vpb_get_user_onmouseover_datas();" onmouseout="vpb_get_user_mouseout_datas();" id="vpb_load_user_page_owner{{$username}}" style="text-align:left !important; margin:0px !important;padding:0px !important;">

        <ul class="dropdown-menu bullet" style="border-radius:0px !important; display:block; margin:15px; z-index:9999;text-align:left !important;margin-top:10px;">

            <div class="dropdown-header" style="padding:10px !important;text-align:left !important; border:0px solid !important;margin:0px !important;">
                <div class="input-group vpb-wall-load-user-detail-wrap">
    <span class="input-group-addon vpb-wall-load-user-detail-photo" style="cursor:pointer;" onclick="window.location.href='/wall/{{$username}}';">
    <span id="vpb_load_user_photo_page_owner{{$username}}"></span>
    </span>
                    <div class="vpb-wall-load-user-detail-others">
                        <span class="vpb-wall-load-user-detail-fullname" onclick="window.location.href='/wall/{{$username}}';"><span id="vpb_load_user_fullname_page_owner{{$username}}"></span></span><br>
                        <span style="font-weight:normal !important;" id="vpb_load_user_country_page_owner{{$username}}"></span>

                        <input type="hidden" id="vpb_friendship_uid_page_owner{{$username}}" value="{{$username}}" />
                        <input type="hidden" id="vpb_friendship_fid_page_owner{{$username}}" value="{{$username}}" />
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