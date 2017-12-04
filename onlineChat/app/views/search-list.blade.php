<div class="input-group vpb_popup_fb_box">
    <div style="float:left;">
                <?php if(empty($profile_pic_name)){?>
                <div style="display:inline-block;margin-right:10px;"><img src="/img/avatar.gif" border="0" align="absmiddle" onclick="window.location.href='/wall/{{$email}}';"></div>
                    <?php } else {?>
                    <div style="display:inline-block;margin-right:10px;"><img src="/users/{{$email}}/profilePictures/{{$profile_pic_name}}" border="0" align="absmiddle" onclick="window.location.href='/wall/{{$email}}';"></div>
                    <?php }?>
                    <div class="vpb_popup_fb_box_c vpb_hover" title="{{$fullname}}" onclick="window.location.href='/wall/{{$email}}';">{{$fullname}}</div>
        <div style="clear:both;"></div>
    </div>
    <div class="vpb_popup_fb_box_d"><span id="addfriend_12" onclick="vpb_friend_ship('12', 'jeevan', 'addfriend');" class="cbtn"><i class="fa fa-user-plus"></i> Add Friend</span>

        <span style="opacity:0.6;cursor:default;display:none;" id="requestsent_12" class="cbtn"><i class="fa fa-reply"></i> Request Sent</span>

        <span style="display:none;" title="Cancel Request" id="cancelrequest_12" onclick="vpb_friend_ship('12', 'jeevan', 'cancelrequest');" class="cbtn vpb_cbtn"><i class="fa fa-times"></i></span></div>
    <div style="clear:both;"></div>
</div>