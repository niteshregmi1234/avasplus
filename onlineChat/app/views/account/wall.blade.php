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

                            <div class="vpb_profile_name" ><span id="p_page_name">{{$fullname}}</span></div>

                        @include('account/partial/outerBox/leftBox/user_details')
                        @include('account/partial/outerBox/leftBox/update_profilePic')
                        @include('account/partial/outerBox/leftBox/display_aboutPageOwner')
                        @include('account/partial/outerBox/leftBox/display_groupDetails')
                        @include('account/partial/outerBox/leftBox/display_pageOwnersFriends')
                        @include('account/partial/outerBox/leftBox/display_pageOwnersPhoto')
                        @include('account/partial/outerBox/leftBox/display_pageOwnersVideos')

                        </div>
                        <!-- LEFT BOX ENDS -->

                        <!-- CENTER BOX STARTS -->
                        <div class="vpb_wall_body_center">
                            <div class="inner_center">
                                @include('account/partial/outerBox/centerBox/display_allFriendRequests')
                                @include('account/partial/outerBox/centerBox/display_findFriend')
                                @include('account/partial/outerBox/centerBox/display_allPageOwnersFriends')
                                @include('account/partial/outerBox/centerBox/display_aboutPageOwnerDetails')
                                @include('account/partial/outerBox/centerBox/display_allNotificationsDetails')
                                @include('account/partial/outerBox/centerBox/display_statusUpdates')
                                @include('account/partial/outerBox/centerBox/confirm_deletePostCommentReplyModal')
                                @include('account/partial/outerBox/centerBox/confirm_removeFriendFromTaggedFriendsList')
                                @include('account/partial/outerBox/centerBox/show_taggedFriendsWhenCalled')
                                @include('account/partial/outerBox/centerBox/add_photoModal')
                                @include('account/partial/outerBox/centerBox/add_videoModal')
                                @include('account/partial/outerBox/centerBox/photo_enlargementModal')
                                @include('account/partial/outerBox/centerBox/share_postModal')
                                @include('account/partial/outerBox/centerBox/update_accountPasswordModal')
                                @include('account/partial/outerBox/centerBox/report_postModal')
                                @include('account/partial/outerBox/centerBox/update_profilePhotoModal')
                                @include('account/partial/outerBox/centerBox/default_photoEnlargementModal')
                                @include('account/partial/outerBox/centerBox/informational_modal')
                                @include('account/partial/outerBox/centerBox/timezone_modal')
                                @include('account/partial/outerBox/centerBox/create_groupModal')
                                @include('account/partial/outerBox/centerBox/update_groupPhotoModal')
                                @include('account/partial/outerBox/centerBox/confirm_deleteGroupModal')
                                @include('account/partial/outerBox/centerBox/confirm_leaveGroupModal')
                                @include('account/partial/outerBox/centerBox/report_groupModal')
                                @include('account/partial/outerBox/centerBox/ban_unbanUserAccountModal')
                                <input type="hidden" id="ban_or_unban_status" />
                                <input type="hidden" id="vasplus_programming_blog_hidden_item_id" />
                                <div class="vbottom_padding"></div>
                            </div>
                        </div>
                        <!-- CENTER BOX ENDS -->

                        <!-- RIGHT BOX STARTS -->
                        <div class="vpb_wall_body_right">
                            @include('account/partial/outerBox/rightBox/display_groupDetails')

                        </div>
                        <!-- RIGHT BOX ENDS -->


                    </div>
                    <!-- OUTER BOX ENDS -->


                </div><div style="clear:both;"></div>

            </div>
        </section>
    </div>
    @include('account/partial/validation')
@stop