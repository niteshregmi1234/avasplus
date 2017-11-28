<!-- Report a post Modal -->
<div class="modal fade enable_this_box" id="report-this-post" tabindex="-1" role="dialog" aria-labelledby="reportpost" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="reportpost">Help Us Understand What's Happening</h4>
            </div>
            <input type="hidden" id="the_posterFullname" />
            <input type="hidden" id="the_posterUsername" />
            <input type="hidden" id="the_posterEmail" />
            <input type="hidden" id="the_pageUsernamed" />
            <input type="hidden" id="the_postID" />
            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-addon" style="vertical-align:top; padding-top:10px !important;">Report</span>
                    <textarea class="form-control" id="report_post_data" style="min-height:250px !important;resize:none;"  placeholder="What is the issue with the post?"></textarea>
                </div>

                <div id="report_post_status" style="margin:0 auto;" align="center"></div>

            </div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="$('#report_post_data').val('');$('#report_post_status').html('');">Close</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_report_the_post('Abcdefgh123 abcdefgh123', 'abcdefgh123', 'abcdefgh123@gmail.com');">Submit</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="logout-confirmation" tabindex="-1" role="dialog" aria-labelledby="logoutconfirmation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="logoutconfirmation">Confirmation</h4>
            </div>

            <div class="modal-body">Are you really sure that you want to log out from the system?</div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;">No</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_log_user_off('http://www.vasplus.info/logout');">Yes</span>
            </div>
        </div>
    </div>
</div>
