<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$fullname}}</title>
    {{HTML::style("bootstrap/css/bootstrap.css")}}
    {{HTML::style("css/site-style.css")}}
    {{HTML::style("css/vasplus_select_plugin.css")}}
    {{HTML::style("fonts-font-awesome/css/font-awesome.min.css")}}
    {{HTML::style("css/select2.css")}}
    {{HTML::style("css/wall-script.css")}}
    {{HTML::style("css/tipsy.css")}}
    {{HTML::style("css/jquery.tooltipster.css")}}
    {{HTML::style("css/vasplus_vchat.css")}}
    <link rel="shortcut icon" href="img/nopp.jpg">
    @yield('head', '')
</head>
<body>
<nav class="navbar navbar-default navbar-afixed-top">
    <div class="container">
        <div class="navbar-header navbar-header-plus">

            <div class="navbar-brand navbar-brand-plus"><h2 class="vpb_profile_search_box">

                    <div class="input-group">
                        <a href="http://www.vasplus.info/feeds/" class="input-group-addon" style="box-shadow: inset 0px 0px 0px 0px red !important; text-decoration:none !important;">News Feed</a>
                        <input type="text" class="form-control form-control-plus" name="vfrnd_data" id="vfrnd_data" value="" placeholder="Search..." autocomplete="off" onClick="vpb_show_previous_search_results();vpb_show_status_updates();">
                        <span class="input-group-addon input-group-addon-plus" onClick="vpb_search_for_friends();"><i class="fa fa-search"></i></span>

                        <div id="vpb_display_search_results"></div>


                    </div>

                </h2></div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div style="clear:both;"></div>
        </div>

        <div id="navbar" class="navbar-collapse navbar-collapse-plus collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="user-d-s">
                    <a href="/wall/{{Session::get("email")}}" id="o_p_page_first_name" title="{{Session::get("fullName")}}">
                        <div class="vpb_profile_picture_icon_wrapper">
                            <?php if(empty(Session::get("profilePicName"))){?>
                            <span id="vp_profile_photo"><img src="/img/avatar.gif" border="0" width="30" height="26" align="absmiddle" /></span>
                            <?php } else {?>
                            <span id="vp_profile_photo"><img src="/users/{{Session::get('email')}}/profilePictures/{{Session::get('profilePicName')}}" border="0" width="30" height="26" align="absmiddle" /></span>
                            <?php }?>
                                    <span id="p_page_first_name">{{explode(" ",Session::get("fullName"))[0]}}</span>
                            <div style="clear:both;"></div>
                        </div>
                    </a>
                </li>



                <li>


                    <a style="margin-top:4px;text-decoration:none !important;" class="dropdown open">
                        <i id="v_friend_requests" class="fa fa-users vpb_notifications_icon vasplus_tooltip_notify" title="Friend Requests" onclick="vpb_show_friend_requests_menu();"></i>
                    </a>
                    <span id="friend_requests_counter" class="vpb_notifyCounter" style="display:none;"><span id="totalReq">0</span></span>

                    <ul id="v_friend_requests_box" class="dropdown-menu bullet pull-right vasplus_bosy" style="right: 8px; left: auto; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;min-width:460px !important;max-width:460px !important; width:100% !important;" aria-labelledby="v_friend_requests">
                        <li class="dropdown-header">

                            <div style="float:left;">Friend Requests</div>

                            <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                <span class="vpb_hover_b" onclick="vpb_show_find_new_friends_box('{{$email}}');">Find Friend</span>
                            </div>
                            <div style="clear:both;"></div>
                        </li>

                        <li class="dropdown-header dropdown-header-plus" style="padding-top:0px !important; padding-bottom:0px !important;padding-right:0px !important;"><span id="vpb_display_friend_requests" class="vfriend_inner"></span></li></ul>

                </li>



                <li>
                    <a style="margin-top:4px;text-decoration:none !important;" class="dropdown open">
                        <i id="v_notifications" class="fa fa-bell vpb_notifications_icon vasplus_tooltip_notify" title="Notifications" onclick="vpb_show_notifications_menu();"></i>
                    </a>

                    <span id="notifications_counter" class="vpb_notifyCounter" style="display:none;"><span id="totalNotifi">0</span></span>

                    <ul id="v_notifications_box" class="dropdown-menu bullet pull-right vasplus_bosy" style="right: 8px; left: auto; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;min-width:460px !important;max-width:460px !important; width:100% !important;" aria-labelledby="v_notifications">
                        <li class="dropdown-header">

                            <div style="float:left;">Notifications</div>

                            <div style="float:right; font-weight:normal !important; font-size:13px !important;">
                                <span id="view_all_notifications" style="display:none;" class="vpb_hover_b" onclick="vpb_show_notifications_details('{{$email}}');">View All</span>
                            </div>
                            <div style="clear:both;"></div>
                        </li>

                        <li class="dropdown-header dropdown-header-plus" style="padding-top:0px !important; padding-bottom:0px !important;padding-right:0px !important;">
                            <div id="v_no_new_notification" style="margin:0px !important; margin-left:-8px !important; text-transform: none !important; display:none;" class="vmiddle_about_title">There is no new notification</div>
                            <span id="vpb_display_notifications" class="vfriend_inner"></span></li>

                    </ul>
                </li>







                <li style="margin-right:10px;">
                    <a style="margin-top:4px;text-decoration:none !important;" class="dropdown open">
                        <i id="v_new_messages"  class="fa fa-envelope  vpb_notifications_icon vasplus_tooltip_notify" onclick="vpb_show_message_menu();"></i>
                    </a>

                    <span id="message_counter" class="vpb_notifyCounter" style="display:none;"><span id="totalMessages">0</span></span>

                    <ul id="v_message_box" class="dropdown-menu bullet pull-right vasplus_bosy" style="right: 8px; left: auto; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;min-width:460px !important;max-width:460px !important; width:100% !important; margin:0px !important;" aria-labelledby="v_notifications">
                        <li class="dropdown-header">

                            <div style="float:left;">Messages</div>

                            <div style="float:right; font-weight:normal !important; font-size:13px !important;">

                                <span class="vpb_hover_b" onclick="window.location.href='http://www.vasplus.info/messages/new/';">Compose</span>

                            </div>
                            <div style="clear:both;"></div>
                        </li>



                        <li class="dropdown-header dropdown-header-plus" style="padding:0px !important;">
                            <div id="v_no_new_message" style="margin:0px !important;text-transform: none !important; display:none;" class="vmiddle_about_title">There is no new message</div>

                            <span id="vpb_display_messages" class="vfriend_inner" style="padding:0px;"></span>
                        </li>





                    </ul>
                </li>


                <li><div style="margin-top:19px;" align="center"><select id="vsource" onchange="doGTranslate(this);"><option value="">Language</option><option value="en|en">English</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Deutsch</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div></div></li>

                <li class="vp_ul_wrap"><a style="margin-top:4px;text-decoration:none !important;" class="dropdown open">

                        <i class="fa fa-cog vpb_notifications_icon vasplus_tooltip_menu" title="Menu" id="v_site_menu" onclick="vpb_show_site_menu();"></i>
                        <ul id="v_site_menu_box" class="dropdown-menu bullet pull-right vasplus_bosy" style="right: 6px; left: auto; font-size:13px !important; font-family:arial !important;" aria-labelledby="v_site_menu">

                            <li class="dropdown-header" style="cursor:default;">Site Menu</li>

                            <li><a href="javascript:void(0);"  onclick="vpb_show_about_page_owner_details('edit');"><i class="fa fa-cog"></i> Settings</a></li>

                            <li><a href="http://www.vasplus.info/messages/new/"><i class="fa fa-envelope-o"></i> Messages</a></li>

                            <li><a href="javascript:void(0);" data-backdrop="static" data-toggle="modal" data-target="#update-password" onclick="vpb_hide_profile_popups();"><i class="fa fa-edit"></i> Reset Password</a></li>


                            <li><a href="javascript:void(0);" data-backdrop="static" data-toggle="modal" data-target="#add-profile-photo"onclick="vpb_hide_profile_popups();"><i class="fa fa-camera"></i> Update Photo</a></li>

                            <li><a href="javascript:void(0);" onClick="vpb_show_timezone_box();"><i class="fa fa-clock-o"></i> Update Timezone</a></li>

                            <li><a href="http://www.vasplus.info"><i class="fa fa-home"></i> Go to site home page</a></li>

                            <li><a href="http://www.vasplus.info/wall-script/"><i class="fa fa-sign-in"></i> Go to product page</a></li>




                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);" data-backdrop="static" data-toggle="modal" data-target="#logout-confirmation" onclick="vpb_hide_profile_popups();"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </a></li>
            </ul>
            <input type="hidden" id="enable_or_disable_chat_box" value="0" />		</div>
    </div>
</nav>
<!-- Navigation Ends -->
@yield("content")

{{ HTML::script('jquery/jquery.js') }}
{{ HTML::script('js/jquery.easing.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('js/docs.min.js') }}
{{ HTML::script('js/jquery.tipsy.js') }}
{{ HTML::script('js/jquery.autosize.js') }}
{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}
{{ HTML::script('js/select2.js') }}
{{ HTML::script('js/jquery.livequery.js') }}
{{ HTML::script('js/jquery.tooltipster.js') }}
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
{{ HTML::script('js/vasplus_select_plugin.js') }}
{{--{{ HTML::script('js/vasplus_vchat.js') }}--}}
{{ HTML::script('js/vasplus_wall.js') }}
@yield('pageScripts', '')
<div class="post_box_bg" onClick="vpb_close_post_box();"></div>
</body>
</html>