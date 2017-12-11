<span style="display:{{$add_friend_display}}" id="addfriend_{{$username}}" onclick="vpb_friend_ship('addfriend');" class="cbt_friendship"><i class="fa fa-user-plus"></i> Add Friend</span>

<span style="opacity: 0.6; cursor: default;display:{{$cancel_display}}" id="requestsent_{{$username}}" class="cbt_friendship"><i class="fa fa-reply"></i> Request Sent</span>

<span style="display:{{$cancel_display}}" title="Cancel Request" id="cancelrequest_{{$username}}" onclick="vpb_friend_ship('cancelrequest');" class="cbt_friendship vpb_cbtn"><i class="fa fa-times"></i></span></span>

<span style="display:{{$unfriend_display}}" id="unfriend_{{$username}}" onclick="vpb_friend_ship('unfriend');" class="cbt_friendship"><i class="fa fa-times"></i> Unfriend</span>