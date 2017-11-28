
<!-- Update Profile Photo Modal -->
<div class="modal fade" id="add-profile-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-camera vfooter_icon"></i> Update Profile Photo</h4>
            </div>

            <div class="modal-body" align="center" style="text-align:center;">

                <div style="width:100%; margin:0 auto;border: solid 0px #cbcbcb;font-family:arial; font-size:13px;" align="center">

                    <div id="vpb-display-profile-photo-preview"></div>

                    <input style="display:none;" type="file" id="profile_pic" onChange="document.getElementById('profile_pics').title = vpb_basename_only(this.value);vpb_profile_photo_preview(this);" />
                    <div id="profile_pics" class="btn btn-default" onClick="document.getElementById('profile_pic').click();" align="center"><i class="fa fa-link"></i> Browse photo</div>

                    <div style=" clear:both;"></div>

                    <center>
                        <div class="vpb_progress_outer_bar">
                            <div class="vpb_progress_inner_bar"></div >
                            <div class="vpb_progress_percentage">0%</div>
                        </div>
                    </center>

                    <div class="meter animate">
                        <span style="width: 50%"><span></span></span>
                    </div>

                    <center><span id="vpb_adding_profile_photo_status"></span></center>

                </div>

            </div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="document.getElementById('profile_pics').title = '';">Close</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_update_profile_picture('abcdefgh123');">Save changes</span>
            </div>
        </div>
    </div>
</div>

