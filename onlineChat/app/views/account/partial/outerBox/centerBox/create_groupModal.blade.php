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


