@extends('layouts.master')

@section('title') Sign Up @stop

@section("content")
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand"  style="text-decoration:none; float:left;"><h2 class="vpb_wall_logo"><img src="logo/logo-vasplus.png" border="0" title="Nepal Chat" alt="npChat"></h2></a>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div style="clear:both;"></div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="later_hide">&nbsp;</li>
                <li><div style="margin-top:15px;" align="center"><select id="vsource" onchange="doGTranslate(this);"><option value="">Language</option><option value="en|en">English</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Deutsch</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|ne">Nepali</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div></div></li>

                <li><a href="login"><i class="fa fa-sign-in"></i> Login</a></li><li><a href="#"><i class="fa fa-home"></i> Home</a></li></ul>     		</div>
    </div>
</nav>
<!-- Navigation Ends -->


<div id="vas-main-body">
    <!-- vas-hire-or-find-freelance Grid Section -->
    <section id="" style="width:90%; min-height:600px; border-left:1px solid #E6E6E6;border-right:1px solid #E6E6E6; margin:0 auto;background-color:#FFF !important;">
        <div class="vasplus_containers">
            <br clear="all">
            <div class="the_row"><div class="vpb_top_titles" align="left">
                    <div style="float:left;" align="left"><i class="vpb_sign"></i>  <span style="float:left; margin-top:-4px;">Sign up</span></div>

                    <div style="float:right;" align="right">
                        <div class="cbtn" style="margin:0px; margin-right:5px; line-height:normal; padding:2px; padding-left:5px; padding-right:5px;" onclick="window.location.href='#';" title="Home"><i class="fa fa-home"></i></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>

                <br clear="all"><br><br><br>

                <div class="vpb_left_page" style="float:none; margin:0 auto;margin-bottom:10px;" align="left">
                    <div id="disable_or_enable_this_box" class="enable_this_box">

                        <div style=" padding:15px;" align="center">

                            <div class="input-group">
                                <span class="input-group-addon" style="min-width:136px;">Your Fullname</span>
                                <input type="text" class="form-control" name="sfullname" id="sfullname" value="" placeholder="Enter your fullname here..." data-placement="top" autocomplete="off" required>
                            </div>
                            <br clear="all">

                            <div class="input-group">
                                <span class="input-group-addon" style="min-width:136px;">Your Username</span>
                                <input type="text" class="form-control" name="susername" id="susername" value="" placeholder="Enter a desired username here..." data-placement="top" autocomplete="off" required>
                            </div>
                            <br clear="all">

                            <div class="input-group">
                                <span class="input-group-addon" style="min-width:136px;">Email Address</span>
                                <input type="text" class="form-control" name="semail" id="semail" value="" placeholder="Enter your email address here..." data-placement="top" autocomplete="off" required>
                            </div>
                            <br clear="all">


                            <div class="input-group">
                                <span style="border-radius: 4px 0px 0px 0px;min-width:136px;" class="input-group-addon">Your Password</span>
                                <div id="wrond_details" data-placement="top" align="center" style="width:100%;"></div>
                                <input type="password" style="min-width:100%;border-radius: 0px 4px 0px 0px;" class="form-control" name="spass" id="spass" placeholder="Enter a desired password here..." value="" data-placement="top" autocomplete="off" required>
                            </div>


                            <div class="vpb_submit_data_wrap"  style="margin-right:0px; padding-bottom:15px;">
                                <div class="agreement_terms">
                                    <div class="remember_me">&nbsp;</div>

                                </div>

                                <input type="hidden" id="empty_fullname_field" value="Please enter your fullname in the required field to proceed.">
                                <input type="hidden" id="empty_username_field" value="Please enter a desired username in the required field to proceed.">
                                <input type="hidden" id="empty_email_field" value="Please enter your email address in the required field to proceed.">
                                <input type="hidden" id="invalid_email_field" value="Please enter a valid email address in the required field to proceed.">
                                <input type="hidden" id="invalid_fullname_field" value="Please enter a valid fullname in the required field to proceed.">
                                <input type="hidden" id="empty_password_field" value="Please enter a desired password in the required field to proceed.">
                                <br clear="all">

                                <center>
                                    <div class="vthe_buttons" id="signup_buttons">
                                        <div onClick="vpb_sign_up();" class="sbtn-success vthe_button">Submit</div>

                                        <a href="login" class="sbtn vthe_button">Back to Login</a>

                                    </div>
                                </center>

                                <center>
                                    <div id="sign_up_status"></div>
                                </center>

                                <div style="margin:0 auto; margin-top:0px;">
                                    <div id="this_page_errors" align="center"></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <br clear="all"> <br clear="all">

        </div>
    </section>
</div>
@include("footer.footer")
<input type="hidden" style="text-transform:capitalize;" id="vpb_ucounty" value={{ $country }} />
@stop