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