<div class="input-group vpb_popup_fb_box">
    <div style="float:left;">
                <?php if(empty($profile_pic_name)){?>
                <div style="display:inline-block;margin-right:10px;"><img src="/img/avatar.gif" border="0" align="absmiddle" onclick="window.location.href='/wall/{{$username}}';"></div>
                    <?php } else {?>
                    <div style="display:inline-block;margin-right:10px;"><img src="/users/{{$fullname}}/profilePictures/{{$profile_pic_name}}" border="0" align="absmiddle" onclick="window.location.href='/wall/{{$username}}';"></div>
                    <?php }?>
                    <div class="vpb_popup_fb_box_c vpb_hover" title="{{$fullname}}" onclick="window.location.href='/wall/{{$username}}';">{{$fullname}}</div>
        <div style="clear:both;"></div>
    </div>
    <div class="vpb_popup_fb_box_d" style="padding-top:15px">
       {{--<span style="display:{{$add_friend_display}}" id="addfriend_{{$username}}" onclick="vpb_friend_ship('addfriend');" class="cbtn"><i class="fa fa-user-plus"></i> Add Friend</span>--}}

        {{--<span style="display:{{$cancel_display}};" id="requestsent_12" class="cbtn"><i class="fa fa-reply"></i> Request Sent</span>--}}

        {{--<span style="display:none;" title="Cancel Request" id="cancelrequest_12" onclick="vpb_friend_ship('12', 'jeevan', 'cancelrequest');" class="cbtn "><i class="fa fa-times"></i></span>--}}

        <span style="display:{{$add_friend_display}}" id="addfriend_{{$username}}" onclick="vpb_friend_ship('addfriend');" class="cbtn"><i class="fa fa-user-plus"></i> Add Friend</span>

        <span style="display:{{$cancel_display}}" id="requestsent_{{$username}}" onclick="vpb_friend_ship('cancelrequest');" class="cbtn" title="Cancel Request"><i class="fa fa-times"></i> Request Sent</span>

        <span style="display:{{$unfriend_display}}" id="unfriend_{{$username}}" onclick="vpb_friend_ship('unfriend');" class="cbtn"><i class="fa fa-times"></i> Unfriend</span>

    </div>
    <div style="clear:both;"></div>
</div>