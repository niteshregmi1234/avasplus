
<!-- Add Video Modal -->
<div id="v-add-videos-box" data-backdrop="static" data-toggle="modal" data-target="#v-add-videos" style="display:none;"></div>

<div class="modal fade" id="v-add-videos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="v-add-video" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="v-add-video"><i class="fa fa-video-camera"></i> Add Video</h4>
            </div>
            <div class="modal-body" style="margin:0 auto !important; text-align:center;" align="center">
                <div class="v_bodyTxt">Supported Videos are: <b>YouTube</b>, <b>Vimeo</b>, <b>Metacafe</b>, <b>Dailymotion</b> and <b>Flickr</b>.<br />
                    Please enter any of the supported video link in the field specified below and click on the fetch button to get the video then finally click on the continue button to proceed to your post.</div><br>
                <div class="row vpb_ninety_eight_percent">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-link"></i></span>
                        <input type="hidden" id="added_video_url" value="">
                        <input type="text" class="form-control" id="add_video_url" placeholder="Enter a video link...">
                        <span class="input-group-btn">
                <button class="btn btn-default" type="button" onClick="vpb_fetch_video();">Fetch</button>
              </span>
                    </div><!-- /input-group -->
                </div><!-- /.row -->

                <br><div class="row vpb_ninety_eight_percent"><div id="vpb-display-video"></div></div>

            </div>
            <div class="modal-footer">

                <span class="btn btn-default btn btn-success btn-wall-continue" data-dismiss="modal" onClick="vpb_continue_with_video();">Continue</span>
                <span id="close_video_popup_button" class="btn btn-default" data-dismiss="modal" onClick="document.getElementById('add_video_url').value='';document.getElementById('vpb-display-video').innerHTML='';document.getElementById('wall_video_action').value='';">Close</span>
            </div>
        </div>
    </div>
</div>

