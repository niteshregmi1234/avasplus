<!-- Report a group Modal -->
<div class="modal fade enable_this_box" id="report-this-group" tabindex="-1" role="dialog" aria-labelledby="reportgroup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="reportgroup">Help Us Understand What's Happening</h4>
            </div>
            <input type="hidden" id="the_groupNamed" />
            <input type="hidden" id="the_groupID" />
            <div class="modal-body">

                <div class="input-group">
                    <span class="input-group-addon" style="vertical-align:top; padding-top:10px !important;">Report</span>
                    <textarea class="form-control" id="report_group_data" style="min-height:250px !important;resize:none;"  placeholder="What is the issue with the group?"></textarea>
                </div>

                <div id="report_group_status" style="margin:0 auto;" align="center"></div>

            </div>

            <div class="modal-footer" style="padding-top:10px; padding-bottom:10px;">
                <span class="cbtn" data-dismiss="modal" style=" margin-top:0px; margin-right:20px;" onclick="$('#report_group_data').val('');$('#report_group_status').html('');">Close</span>
                <span class="btn btn-default btn btn-success btn-wall-continue" style="padding-top:5px; padding-bottom:7px;" onClick="vpb_report_the_group('Abcdefgh123 abcdefgh123', 'abcdefgh123', 'abcdefgh123@gmail.com');">Submit</span>
            </div>
        </div>
    </div>
</div>

