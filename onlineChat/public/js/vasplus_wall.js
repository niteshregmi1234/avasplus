/********************************************************************************
* Social Network Website
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: vasplusblog@gmail.com OR info@vasplus.info

*********************************Copyright Info***********************************
* This is a paid script and must not be sold by any client
* Please do not remove this copyright information from the top of this page
* All Copy Rights Reserved by Vasplus Programming Blog
***********************************************************************************/

var vpb_site_url = window.location.protocol + "//" + window.location.host + "/";



function vpb_resize_this(evnt) 
{
	var observe;
	if (window.attachEvent) {
		observe = function (element, event, handler) {
			element.attachEvent('on'+event, handler);
		};
	}
	else {
		observe = function (element, event, handler) {
			element.addEventListener(event, handler, false);
		};
	}

    var text = document.getElementById('vpb_wall_share_post_data');
    var prevHeight = text.offsetHeight;//scrollHeight
	
    function resize() {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 1);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    resize();
	text.focus();
}


// Check profile page security
function vpb_security_check_point()
{
	var dataString = {"page":"security_check_point"};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() {},  
		success: function(response)
		{
			//alert(response);
			var response_brought = response.indexOf('user-session-has-expired');
			if(response_brought != -1)
			{
				vpb_log_user_off(vpb_site_url+"login/user-session-has-expired");
			}
			else {}
		}
	});
}


$(function()
{
	vpb_security_check_point();
	
   // $('[data-toggle="tooltip"]').tooltip();  // nw | n | ne | w | e | sw | s | se
   $('[data-toggle="tooltip"]').tipsy({fade: true, gravity: 's'}); 
   $('.vasplus_tooltip_popup').tipsy({fade: true, gravity: 's'}); 
   $('.vasplus_tooltip_photo_e').tipsy({fade: true, gravity: 'e'}); 
   $('#vpb_share_privacy_box').tipsy({fade: true, gravity: 'e'});
   $('.vasplus_tooltip_notify').tipsy({fade: true, gravity: 'w'});
   $('.vasplus_tooltip_menu').tipsy({fade: true, gravity: 'w'}); 
   $('.vasplus_tooltip_left').tipsy({fade: true, gravity: 'e'});
   $('.vasplus_tooltip_icons').tipsy({fade: true, gravity: 'sw'}); 
   $('.pms_tooltip_bottom').tipsy({fade: true, gravity: 'se'}); 
   $('.pms_tooltip_left').tipsy({fade: true, gravity: 'e'});

	
	$(document).on("click", function(e) 
	{
		var $clicked = $(e.target);
		if (!$clicked.parents().hasClass("dropdown-menu") && !$clicked.parents().hasClass("the_sorting_button") && !$clicked.parents().hasClass("vpb_notifications_icon") && !$clicked.parents().hasClass("vpb_notifications_icon_active") && !$clicked.parents().hasClass("dropdown") && !$clicked.parents().hasClass("input-group-addon-plus") && !$clicked.parents().hasClass("form-control-plus") && $clicked.attr('id') != "vfrnd_data" && $clicked.attr('id') != "v_suggested_wall_users_box" && $clicked.attr('id') != "vpb_wall_members_data")
		{	
			 $("#vpb-tagged-people-in-post-server-response").html('');
			$("#vpb-location-server-response").html('');
			
			$(".vpb_wall_post_security_setting_active").addClass('vpb_wall_post_security_setting');
			$(".vpb_wall_post_security_setting_active").removeClass('vpb_wall_post_security_setting_active');
			
			// Hide the sorting details
			$("#vpb_sorting_box").hide();
			$("#vpb_sorting_text").removeClass('vpb_sort_text_active');
			$("#vpb_sorting_text").addClass('vpb_sort_text');
			
			// Hide the website menus
			$("#v_site_menu_box").hide();
			$("#v_site_menu").removeClass('vpb_notifications_icon_active');
			$("#v_site_menu").addClass('vpb_notifications_icon');
			
			$("#v_friend_requests_box").hide();
			$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
			$("#v_friend_requests").addClass('vpb_notifications_icon');
			
			$("#v_notifications_box").hide();
			$("#v_notifications").removeClass('vpb_notifications_icon_active');
			$("#v_notifications").addClass('vpb_notifications_icon');
			
			$("#v_message_box").hide();
			$("#v_new_messages").removeClass('vpb_notifications_icon_active');
			$("#v_new_messages").addClass('vpb_notifications_icon');
			
			// Hide the search box
			$("#vpb_display_search_results").hide();
			$("#v_friend_requests_box").hide();
			
			$("#vpb_wall_members_data").val('');
			$("#v_suggested_wall_users_box").hide();
		}
    });
	
	
	// Keep the drop-down box open when clicked on the header
	$("li.dropdown-header").on("click", function(e) 
	{
        e.stopPropagation();
		 return false;
    });

	$("textarea").expanding();
	
	
	if($("#vpb_smiley_box").length>0)
	{
		$("#vpb_smiley_box").html('<div class="vpb_wall_smiley_box_wrapper"><div class="vpb_smiley_inner_box"><span class="smiley_a" title="Smile" onclick="vpb_add_smiley_to_wall_status(\':)\');"></span><span class="smiley_b" title="Frown, Sad" onclick="vpb_add_smiley_to_wall_status(\':(\');"></span><span class="smiley_c" title="Blushing angel" onclick="vpb_add_smiley_to_wall_status(\':blushing-angel:\');"></span><span class="smiley_d" title="Cat face" onclick="vpb_add_smiley_to_wall_status(\':cat-face:\');"></span><span class="smiley_e" title="Confused" onclick="vpb_add_smiley_to_wall_status(\'o.O\');"></span><span class="smiley_f" title="Cry" onclick="vpb_add_smiley_to_wall_status(\':cry:\');"></span><span class="smiley_g" title="Laughing devil" onclick="vpb_add_smiley_to_wall_status(\':laughing-devil:\');"></span><span class="smiley_h" title="Shocked and surprised" onclick="vpb_add_smiley_to_wall_status(\':O\');"></span><span class="smiley_i" title="Glasses" onclick="vpb_add_smiley_to_wall_status(\'B)\');"></span><span class="smiley_j" title="Grin, Big Smile" onclick="vpb_add_smiley_to_wall_status(\':D\');"></span><span class="smiley_k" title="Upset and angry" onclick="vpb_add_smiley_to_wall_status(\':grumpy:\');"></span><span class="smiley_l" title="Heart" onclick="vpb_add_smiley_to_wall_status(\':heart:\');"></span><span class="smiley_m" title="Kekeke happy" onclick="vpb_add_smiley_to_wall_status(\'^_^\');"></span><span class="smiley_n" title="Kiss" onclick="vpb_add_smiley_to_wall_status(\':kiss:\');"></span><span class="smiley_o" title="Pacman" onclick="vpb_add_smiley_to_wall_status(\':v\');"></span><span class="smiley_p" title="Penguin" onclick="vpb_add_smiley_to_wall_status(\':penguin:\');"></span><span class="smiley_q" title="Unsure" onclick="vpb_add_smiley_to_wall_status(\':unsure:\');"></span><span class="smiley_r" title="Cool" onclick="vpb_add_smiley_to_wall_status(\'B|\');"></span><span class="smiley_s" title="Annoyed, sighing or bored" onclick="vpb_add_smiley_to_wall_status(\'-_-\');"></span><span class="smiley_t" title="Love" onclick="vpb_add_smiley_to_wall_status(\':lve:\');"></span><span class="smiley_u" title="Christopher Putnam" onclick="vpb_add_smiley_to_wall_status(\':putnam:\');"></span><span class="smiley_zb" title="Shark" onclick="vpb_add_smiley_to_wall_status(\'(wink)\');"></span><span class="smiley_v" title="Wink" onclick="vpb_add_smiley_to_wall_status(\'(wink)\');"></span><span class="smiley_w" title="No idea" onclick="vpb_add_smiley_to_wall_status(\'(off)\');"></span><span class="smiley_x" title="Got an idea" onclick="vpb_add_smiley_to_wall_status(\'(on)\');"></span><span class="smiley_y" title="Cup of tea" onclick="vpb_add_smiley_to_wall_status(\':tea-cup:\');"></span><span class="smiley_z" title="No, thumb down" onclick="vpb_add_smiley_to_wall_status(\'(n)\');"></span><span class="smiley_za" title="Yes, thumb up" onclick="vpb_add_smiley_to_wall_status(\'(y)\');"></span><div style="clear:both;"></div></div></div><div style="clear: both;"></div>');

	}
	else {}
	
	
	//Auto fetch URL content
	$("#vpb_wall_post_data").keyup(function(e) 
	{
		var post_contents = $(this).val();
		var Regex_url = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
		var url_realised = post_contents.match(Regex_url);
		
		if(vpb_getcookie('this_url_has_already_been_fetched') == "")
		{
			var url_session = "no_session_established_yet";
		}
		else
		{
			var url_session = vpb_getcookie('this_url_has_already_been_fetched');
		}
		
		if(url_realised.length>0 && url_session != url_realised)
		{
			if($('#add_photos').val() != "") { return false; }
			
			$("#url_content_wrapper").show();
			$('#vpb_link_to_fetch').val(url_realised);
			vpb_setcookie('this_url_has_already_been_fetched', url_realised, 90);
			$("#fetched_url_content").html($("#v_loading_btn").val());
			vpb_fetch_url_contents('auto');
		}
		else { e.stopPropagation(); return false; }
	});
	
	$("#my_timezone").select2();
	if(vpb_getcookie('vasplus_timezone') != "" && vpb_getcookie('vasplus_timezone') != undefined && vpb_getcookie('vasplus_timezone') != null) {
	   //vpb_removecookie('vasplus_timezone');
   } 
   else {
	   if(parseInt($('#vasplus_timezone_box').length)>0)
	   {
			$('#vasplus_timezone_box').modal('show');
	   }
	   else {}
   }
   
   vpb_show_friendship_button();
   
   // Auto search for users
	var timer;
	var x;
	$('#vfrnd_data').keyup(function() {
		if (x) { x.abort() } // If there is an existing XHR, abort it.
		clearTimeout(timer); // Clear the timer so we don't end up with dupes.
		timer = setTimeout(function() { // assign timer a new timeout 
		
		x = vpb_search_for_friends();
		}, 1000); // 2000ms delay, tweak for faster/slower
	});
});


var vpb_running_process  = false; //This will prevents multipal ajax loads

//The total records for this current page viewed
var total_status_updates = $("#vtotal_status_updates").val(); 

//The total records for this current page viewed when sorted by latest comments
var total_status_updates_by_comments = $("#vtotal_status_updates_by_comments").val(); 

function vpb_load_more_status_updates(type)
{
	var viewed_post_id = $("#viewed_post_id").val();
	
	if(type != "auto-load") { $("#vpb_start").val(0); } else {}
	var vpb_start = $("#vpb_start").val(); //Where to start loading the updates
	var vpb_total_per_load = $("#vpb_total_per_load").val(); //Total status updates to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	var vpb_sort_option = $("#vpb_sort_option").val(); //The method to sort the updates
	
	var dataString = {"vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "vpb_page_owner":vpb_page_owner, "page_id":page_id, "vpb_sort_option":vpb_sort_option, "viewed_post_id":viewed_post_id, "page":"load-the-status-updates"}
	
	vpb_running_process = true; //prevent further ajax loading
	
	$("#vpb_loading_status_updates").html($("#vpb_loading_image_gif").val()); /* Show loading image */
	
	$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
	{
		//Hide the loading image after loading data onto the page
		$("#vpb_loading_status_updates").html(''); 
		
		$("#vpb_start").val(parseInt(vpb_start)+parseInt(vpb_total_per_load));
		
		// Show sorted Option
		$("#vpb_sorted_txt").html($("#vpb_sorted_option").val()); 
		
		 // Remove the white background color class from status updates if there are updates to display
		$("#vasplus_wall_status_updates").removeClass('vmiddle_others');
		
		//Append the received data unto the current page
		if(type != "auto-load") 
		{
			$("#vpb_status_updated").html(response);
		}
		else
		{
			$("#vpb_status_updated").append(response);
		}
		// When a single post is viewed, remove the top margin from the post displayed
		if(viewed_post_id != "") 
		{
			setTimeout(function() {
				$("#vpb_wall_wrapper_"+parseInt(viewed_post_id)).removeClass("v_wall_wrapper_top");
				$("#vpb_wall_wrapper_"+parseInt(viewed_post_id)).css("margin-top", "0px");
				
				$("#vpb_status_update_wraps").hide(); 
				
				$('html, body').animate({
					scrollTop: $("#vasplus_wall_status_updates").offset().top-parseInt(120)+'px'
				}, 1600, 'easeInOutExpo');
				
			},10);
		} 
		else {} 
		
		if(type == "start" || type != "auto-load") { vpb_get_all_the_user_groups(); } else {}
		
		vpb_running_process = false; 
	}).fail(function(xhr, ajaxOptions, theError) 
	{	
		$("#vpb_loading_status_updates").html(''); //Hide loading image
		$("#v-wall-message").html($("#general_system_error").val()); 
		$("#v-wall-alert-box").click();
		vpb_running_process = false;
		//return false;
	});
}

function vpb_sort_the_status_updates(type, text)
{
	$("#vpb_sort_option").val(type);
	$("#vpb_sorted_option").val(text);
	
	// Hide the sorting details
	$("#vpb_sorting_box").hide();
	$("#vpb_sorting_text").removeClass('vpb_sort_text_active');
	$("#vpb_sorting_text").addClass('vpb_sort_text');
	
	$("#vpb_sorted_txt").html($("#v_loadings_btn").val());
	$(".vsorted_checked").hide();
	$("#"+type+"_").show();
	
	setTimeout(function() { vpb_load_more_status_updates(type); },100);
}

$(function() {
	
	$('#vas-scroll-to-top').hide();
	
	// Load status updates on first page load
	if(parseInt($("#vtotal_status_updates").val()) < 1) { vpb_get_all_the_user_groups(); }
	else if($("#viewed_post_id").val() != "" && $("#page_id").val() == "wall") // If a single post is viewed
	{
		$("#v_status_update_box").hide(); 
		$("#v_sorting_box").hide(); 
		vpb_load_more_status_updates('sigle');
	}
	else { vpb_load_more_status_updates('start'); }
	
	//To detect the page scroll so as to auto load status updates
	$(window).scroll(function(e) 
	{
		// Check if other processes are running then pause
		if(parseInt($("#vpb_is_process_running").val()) > 0) {}
		else {
			//The current user has scrolled to the bottom of the current page
			if($(window).scrollTop() + $(window).height() == $(document).height())
			{
				if(parseInt($("#vtotal_status_updates").val()) > parseInt($("#vpb_total_per_load").val()) && $("#viewed_post_id").val() == "")
				{
					if($("#vpb_sort_option").val() == "sort_updates_by_latest_comments")
					{
						var vpb_start = $("#vpb_start").val(); //Where to start loading the updates
						//There are still more records to load
						if(parseInt(vpb_start) <= parseInt(total_status_updates_by_comments) && vpb_running_process==false) 
						{
							vpb_load_more_status_updates('auto-load');
						}
						else { }
					}
					else
					{
						var vpb_start = $("#vpb_start").val(); //Where to start loading the updates
						//There are still more records to load
						if(parseInt(vpb_start) <= parseInt(total_status_updates) && vpb_running_process==false) 
						{
							vpb_load_more_status_updates('auto-load');
						}
						else { }
					}
				}
				else {}
			}
			else {}
		}
		
		if ($(this).scrollTop() > 100) 
		{
			$('#vas-scroll-to-top').fadeIn();
		} else {
			$('#vas-scroll-to-top').fadeOut();
		}
		
	});
	
	
	$('#vas-scroll-to-top').click(function(event) 
	{
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        //event.preventDefault();
		setTimeout(function() { $anchor.fadeOut(); },1000);
    });
	
	// When mouse over the search results, add scroller to the result box if its too long in height
	$("#vpb_display_search_results").on('mouseenter', function() {
		$(".vthe_inner").css('overflow-y', 'auto');
	}).on('mouseleave', function() {
		$(".vthe_inner").css('overflow', 'hidden');
	});
	
	$("#vpb_display_friend_requests").on('mouseenter', function() {
		$(".vfriend_inner").css('overflow-y', 'auto');
	}).on('mouseleave', function() {
		$(".vfriend_inner").css('overflow', 'hidden');
	});
	
	$("#vpb_display_notifications").on('mouseenter', function() {
		$(".vfriend_inner").css('overflow-y', 'auto');
	}).on('mouseleave', function() {
		$(".vfriend_inner").css('overflow', 'hidden');
	});
	
	// Auto suggest users
	var timers;
	var y;
	$("#vpb_wall_members_data").keyup(function() {
		if (y) { y.abort() } // If there is an existing XHR, abort it.
		clearTimeout(timers); // Clear the timer so we don't end up with dupes.
		timers = setTimeout(function() { // assign timer a new timeout 
		
		y = vpb_search_get_suggested_user($('#vpb_wall_members_data').val());
		}, 1000); // 2000ms delay, tweak for faster/slower
	});
});

// Load user details when mouseover and when mouseout
var vpb_user_loader_timer = 500,
vpb_time_out = null;

function vpb_get_user_onmouseover_data(username, fullname, country, photo)
{
	if (vpb_time_out) clearTimeout(vpb_time_out);
	
	vpb_time_out = setTimeout(function()
	{
		if(username == "" || fullname == "" || photo == "") 
		{
			$(".v_load_user_detail").css('display','none');
			clearTimeout(vpb_time_out);
			return false;
		}
		else
		{
			var session_uid = $("#session_uid").val();
			var vpb_friend_uid = $("#vpb_friendship_fid_"+username).val();
			
			var vpb_session_pic = $("#vpb_session_pic_"+session_uid).val();
			if(vpb_session_pic != "" && session_uid == vpb_friend_uid) {
				photo = vpb_session_pic;
			}
			else { }
			
			$("#vpb_load_user_photo_"+username).html('<img src="'+photo+'" border="0">');
			$("#vpb_load_user_fullname_"+username).html(fullname);
			if(country == "") { $("#vpb_load_user_country_"+username).html(''); }
			else {
				$("#vpb_load_user_country_"+username).html('<i class="fa fa-map-marker" title="Location"></i>&nbsp;'+country);
			}
			
			$(".v_load_user_detail").css('display','none');
			$("#vpb_load_user_"+username).css('display','block');
			
			
			var dataString = {'page':'load_friendship_button', 'session_uid': session_uid, 'friend_uid': vpb_friend_uid};
			$.ajax({  
				type: "POST",  
				url: vpb_site_url+'wall-processor.php',  
				data: dataString,
				beforeSend: function() 
				{
					$("#vpb_load_friendship_"+username).html($("#v_loading_btn").val());
				},  
				success: function(response)
				{
					$("#vpb_load_friendship_"+username).html(response);
				}
			}).fail(function(error_response) 
			{
				$("#vpb_load_friendship_"+username).html('');
			});
		}
	
	}, parseInt(vpb_user_loader_timer));
}

function vpb_get_user_mouseout_data(username, fullname, country, photo)
{
	if (vpb_time_out) clearTimeout(vpb_time_out);
		
	vpb_time_out = setTimeout(function()
	{
		$(".v_load_user_detail").css('display','none');
	}, parseInt(vpb_user_loader_timer));
}

function vpb_get_user_onmouseover_datas()
{
	if (vpb_time_out) clearTimeout(vpb_time_out);
}

function vpb_get_user_mouseout_datas()
{
	if (vpb_time_out) clearTimeout(vpb_time_out);
	vpb_time_out = setTimeout(function()
	{
		$(".v_load_user_detail").css('display','none');
	}, parseInt(vpb_user_loader_timer));
}




// Show site menu
function vpb_show_site_menu()
{
	$("#v_actions_box").hide();
	
	if($("#v_site_menu_box").css('display') == "none")
	{
		$("#v_friend_requests_box").hide();
		$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
		$("#v_friend_requests").addClass('vpb_notifications_icon');
		
		$("#v_notifications_box").hide();
		$("#v_notifications").removeClass('vpb_notifications_icon_active');
		$("#v_notifications").addClass('vpb_notifications_icon');
		
		$("#v_message_box").hide();
		$("#v_new_messages").removeClass('vpb_notifications_icon_active');
		$("#v_new_messages").addClass('vpb_notifications_icon');
		
		
		$("#v_site_menu_box").show();
		$("#v_site_menu").removeClass('vpb_notifications_icon');
		$("#v_site_menu").addClass('vpb_notifications_icon_active');
	}
	else
	{
		$("#v_site_menu_box").hide();
		$("#v_site_menu").removeClass('vpb_notifications_icon_active');
		$("#v_site_menu").addClass('vpb_notifications_icon');
	}
}


// Show Friend Requests menu
function vpb_show_friend_requests_menu()
{
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	/*
	$("#v_friend_requests_box").show();
	$("#v_friend_requests").removeClass('vpb_notifications_icon');
	$("#v_friend_requests").addClass('vpb_notifications_icon_active');
	*/
	
	vpb_setcookie('vasplus_old_friend_request', vpb_getcookie('vasplus_new_friend_request'), 360);
	vpb_load_friend_requests();
	
}


// Show Notifications menu
function vpb_show_notifications_menu()
{
	
	$("#v_friend_requests_box").hide();
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	vpb_setcookie('vasplus_old_notifications', vpb_getcookie('vasplus_new_notifications'), 360);
	vpb_load_notifications();
	
	//$("#v_notifications_box").show();
	//$("#v_notifications").removeClass('vpb_notifications_icon');
	//$("#v_notifications").addClass('vpb_notifications_icon_active');
	
}


function vpb_show_message_menu()
{
	$("#v_friend_requests_box").hide();
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#vasplus_notifications").hide();
	$("#vpb_display_messages").html('');
	
	$("#vpb_display_search_results").hide();
	$("#message_counter").hide();
	var session_uid = $("#session_uid").val();
	
	$("#vpb_display_messages").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
	$("#v_message_box").show();
	
	$("#v_new_messages").removeClass('vpb_notifications_icon');
	$("#v_new_messages").addClass('vpb_notifications_icon_active');
	
	var dataString = {'username':session_uid, 'page':'get_the_new_messages'};

	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('no-new-message');
		if(response_brought != -1)
		{
			$("#v_no_new_message").show();
			$("#vpb_display_messages").html('');
		}
		else
		{
			$("#v_no_new_message").hide();
			$("#vpb_display_messages").html(response);
		}
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_show_message_menu();", 10000);
	});
}


// Create the necessary sessions need and start a new conversation session
function vpb_create_conversation(group_id)
{
	setTimeout(function() {
		window.location.href=vpb_site_url+'messages/'+group_id+'/';
	},1000);
}



// Load more replies
function vpb_load_more_replies(comment_id)
{
	var total_replies = $("#vtotal_replies_"+parseInt(comment_id)).val(); //The total replies for the comment
	var vpb_start = $("#vpb_replies_start_"+parseInt(comment_id)).val(); //Where to start loading the replies
	
	var vpb_total_per_load = $("#vpb_total_replies_per_load").val(); //Total replies to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(total_replies)) 
	{
		var dataString = {"comment_id":comment_id, "vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "vpb_page_owner":vpb_page_owner, "page_id":page_id, "page":"load-more-replies"}
		
		$("#vpb_load_more_replies_box_"+parseInt(comment_id)).hide();
		
		$("#vpb_loading_replies_"+parseInt(comment_id)).html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_replies_outer_"+parseInt(comment_id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_loading_replies_outer_"+parseInt(comment_id)).offset().top-parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		
		//return false;
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_replies_outer_"+parseInt(comment_id)).hide(); 
			$("#vpb_loading_replies_"+parseInt(comment_id)).html('');
			
			var total_loaded_replies = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_replies_start_"+parseInt(comment_id)).val(parseInt(total_loaded_replies)); 
			$("#v_this_reply_totals_"+parseInt(comment_id)).html(parseInt(total_loaded_replies)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_replies_"+parseInt(comment_id)).prepend(
				$(response).hide().fadeIn('slow')
			);
			
			if(parseInt($("#vpb_replies_start_"+parseInt(comment_id)).val()) <= parseInt(total_replies)) 
			{ $("#vpb_load_more_replies_box_"+parseInt(comment_id)).show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_replies('"+comment_id+"');", 10000);
		});
	}
	else
	{
		//Hide load more comment buttons when there is no more comment
		$("#vpb_load_more_replies"+parseInt(comment_id)).hide();
	}
}


// Load more comments
function vpb_load_more_comments(post_id)
{
	var total_comments = $("#vtotal_comments_"+parseInt(post_id)).val(); //The total comments for the post
	var vpb_start = $("#vpb_comment_start_"+parseInt(post_id)).val(); //Where to start loading the comments
	
	var vpb_total_per_load = $("#vpb_total_comments_per_load").val(); //Total comments to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(total_comments)) 
	{
		var dataString = {"post_id":post_id, "vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "vpb_page_owner":vpb_page_owner, "page_id":page_id, "page":"load-more-comments"}
		
		$("#vpb_load_more_comment_box_"+parseInt(post_id)).hide();
		
		$("#vpb_loading_comments_"+parseInt(post_id)).html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_comments_outer_"+parseInt(post_id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_loading_comments_outer_"+parseInt(post_id)).offset().top-parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_comments_outer_"+parseInt(post_id)).hide(); 
			$("#vpb_loading_comments_"+parseInt(post_id)).html('');
			
			var total_loaded_comments = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_comment_start_"+parseInt(post_id)).val(parseInt(total_loaded_comments)); 
			$("#v_this_com_totals_"+parseInt(post_id)).html(parseInt(total_loaded_comments)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_comments_"+parseInt(post_id)).prepend(
				$(response).hide().fadeIn('slow')
			);
			
			if(parseInt($("#vpb_comment_start_"+parseInt(post_id)).val()) <= parseInt(total_comments)) 
			{ $("#vpb_load_more_comment_box_"+parseInt(post_id)).show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_comments('"+post_id+"');", 10000);
		});
	}
	else
	{
		//Hide load more comment buttons when there is no more comment
		$("#vpb_load_more_comment_box_"+parseInt(post_id)).hide();
	}
}

// Show and Hide the sorting box
function vpb_sorting_box() 
{
	if($("#vpb_sorting_box").css('display') == "none")
	{
		$("#vpb_sorting_box").show();
		$("#vpb_sorting_text").removeClass('vpb_sort_text');
		$("#vpb_sorting_text").addClass('vpb_sort_text_active');
	}
	else
	{
		$("#vpb_sorting_box").hide();
		$("#vpb_sorting_text").removeClass('vpb_sort_text_active');
		$("#vpb_sorting_text").addClass('vpb_sort_text');
	}
}


function vasplus_wall_special_text(ivtech) { var vpb_new_text = ivtech.replace(/\"/gi,"&quot;");vpb_new_text = vpb_new_text.replace(/\</gi,"&lt;");vpb_new_text = vpb_new_text.replace(/\>/gi,"&gt;");vpb_new_text = vpb_new_text.replace(/\ /gi,"&nbsp;");vpb_new_text = vpb_new_text.replace(/\Â¡/gi,"&iexcl;");vpb_new_text = vpb_new_text.replace(/\Â¢/gi,"&cent;");vpb_new_text = vpb_new_text.replace(/\Â£/gi,"&pound;");vpb_new_text = vpb_new_text.replace(/\Â¤/gi,"&curren;");vpb_new_text = vpb_new_text.replace(/\Â¥/gi,"&yen;");vpb_new_text = vpb_new_text.replace(/\Â¦/gi,"&brvbar;");vpb_new_text = vpb_new_text.replace(/\Â§/gi,"&sect;");vpb_new_text = vpb_new_text.replace(/\Â¨/gi,"&uml;");vpb_new_text = vpb_new_text.replace(/\Â©/gi,"&copy;");vpb_new_text = vpb_new_text.replace(/\Âª/gi,"&ordf;");vpb_new_text = vpb_new_text.replace(/\Â«/gi,"&laquo;");vpb_new_text = vpb_new_text.replace(/\Â¬/gi,"&not;");vpb_new_text = vpb_new_text.replace(/\Â®/gi,"&reg;");vpb_new_text = vpb_new_text.replace(/\Â°/gi,"&deg;");vpb_new_text = vpb_new_text.replace(/\Â±/gi,"&plusmn;");vpb_new_text = vpb_new_text.replace(/\Â²/gi,"&sup2;");vpb_new_text = vpb_new_text.replace(/\Â³/gi,"&sup3;");vpb_new_text = vpb_new_text.replace(/\Â´/gi,"&acute;");vpb_new_text = vpb_new_text.replace(/\Âµ/gi,"&micro;");vpb_new_text = vpb_new_text.replace(/\Â¶/gi,"&para;");vpb_new_text = vpb_new_text.replace(/\Â·/gi,"&middot;");vpb_new_text = vpb_new_text.replace(/\Â¹/gi,"&sup1;");vpb_new_text = vpb_new_text.replace(/\Âº/gi,"&ordm;");vpb_new_text = vpb_new_text.replace(/\Â»/gi,"&raquo;");vpb_new_text = vpb_new_text.replace(/\Â¼/gi,"&frac14;");vpb_new_text = vpb_new_text.replace(/\Â½/gi,"&frac12;");vpb_new_text = vpb_new_text.replace(/\Â¾/gi,"&frac34;");vpb_new_text = vpb_new_text.replace(/\Â¿/gi,"&iquest;");vpb_new_text = vpb_new_text.replace(/\Ã€/gi,"&Agrave;");vpb_new_text = vpb_new_text.replace(/\Ã/gi,"&Aacute;");vpb_new_text = vpb_new_text.replace(/\Ã‚/gi,"&Acirc;");vpb_new_text = vpb_new_text.replace(/\Ãƒ/gi,"&Atilde;");vpb_new_text = vpb_new_text.replace(/\Ã„/gi,"&Auml;");vpb_new_text = vpb_new_text.replace(/\Ã…/gi,"&Aring;");vpb_new_text = vpb_new_text.replace(/\Ã†/gi,"&AElig;");vpb_new_text = vpb_new_text.replace(/\Ã‡/gi,"&Ccedil;");vpb_new_text = vpb_new_text.replace(/\Ãˆ/gi,"&Egrave;");vpb_new_text = vpb_new_text.replace(/\Ã‰/gi,"&Eacute;");vpb_new_text = vpb_new_text.replace(/\ÃŠ/gi,"&Ecirc;");vpb_new_text = vpb_new_text.replace(/\Ã‹/gi,"&Euml;");vpb_new_text = vpb_new_text.replace(/\ÃŒ/gi,"&Igrave;");vpb_new_text = vpb_new_text.replace(/\Ã/gi,"&Iacute;");vpb_new_text = vpb_new_text.replace(/\ÃŽ/gi,"&Icirc;");vpb_new_text = vpb_new_text.replace(/\Ã/gi,"&Iuml;");vpb_new_text = vpb_new_text.replace(/\Ã/gi,"&ETH;");vpb_new_text = vpb_new_text.replace(/\Ã‘/gi,"&Ntilde;");vpb_new_text = vpb_new_text.replace(/\Ã’/gi,"&Ograve;");vpb_new_text = vpb_new_text.replace(/\Ã“/gi,"&Oacute;");vpb_new_text = vpb_new_text.replace(/\Ã”/gi,"&Ocirc;");vpb_new_text = vpb_new_text.replace(/\Ã•/gi,"&Otilde;");vpb_new_text = vpb_new_text.replace(/\Ã–/gi,"&Ouml;");vpb_new_text = vpb_new_text.replace(/\Ã—/gi,"&times;");vpb_new_text = vpb_new_text.replace(/\Ã˜/gi,"&Oslash;");vpb_new_text = vpb_new_text.replace(/\Ã™/gi,"&Ugrave;");vpb_new_text = vpb_new_text.replace(/\Ãš/gi,"&Uacute;");vpb_new_text = vpb_new_text.replace(/\Ã›/gi,"&Ucirc;");vpb_new_text = vpb_new_text.replace(/\Ãœ/gi,"&Uuml;");vpb_new_text = vpb_new_text.replace(/\Ã/gi,"&Yacute;");vpb_new_text = vpb_new_text.replace(/\Ãž/gi,"&THORN;");vpb_new_text = vpb_new_text.replace(/\ÃŸ/gi,"&szlig;");vpb_new_text = vpb_new_text.replace(/\Ã /gi,"&agrave;");vpb_new_text = vpb_new_text.replace(/\Ã¡/gi,"&aacute;");vpb_new_text = vpb_new_text.replace(/\Ã¢/gi,"&acirc;");vpb_new_text = vpb_new_text.replace(/\Ã£/gi,"&atilde;");vpb_new_text = vpb_new_text.replace(/\Ã¤/gi,"&auml;");vpb_new_text = vpb_new_text.replace(/\Ã¥/gi,"&aring;");vpb_new_text = vpb_new_text.replace(/\Ã¦/gi,"&aelig;");vpb_new_text = vpb_new_text.replace(/\Ã§/gi,"&ccedil;");vpb_new_text = vpb_new_text.replace(/\Ã¨/gi,"&egrave;");vpb_new_text = vpb_new_text.replace(/\Ã©/gi,"&eacute;");vpb_new_text = vpb_new_text.replace(/\Ãª/gi,"&ecirc;");vpb_new_text = vpb_new_text.replace(/\Ã«/gi,"&euml;");vpb_new_text = vpb_new_text.replace(/\Ã¬/gi,"&igrave;");vpb_new_text = vpb_new_text.replace(/\Ã­/gi,"&iacute;");vpb_new_text = vpb_new_text.replace(/\Ã®/gi,"&icirc;");vpb_new_text = vpb_new_text.replace(/\Ã¯/gi,"&iuml;");vpb_new_text = vpb_new_text.replace(/\Ã°/gi,"&eth;");vpb_new_text = vpb_new_text.replace(/\Ã±/gi,"&ntilde;");vpb_new_text = vpb_new_text.replace(/\Ã²/gi,"&ograve;");vpb_new_text = vpb_new_text.replace(/\Ã³/gi,"&oacute;");vpb_new_text = vpb_new_text.replace(/\Ã´/gi,"&ocirc;");vpb_new_text = vpb_new_text.replace(/\Ãµ/gi,"&otilde;");vpb_new_text = vpb_new_text.replace(/\Ã¶/gi,"&ouml;");vpb_new_text = vpb_new_text.replace(/\Ã·/gi,"&divide;");vpb_new_text = vpb_new_text.replace(/\Ã¸/gi,"&oslash;");vpb_new_text = vpb_new_text.replace(/\Ã¹/gi,"&ugrave;");vpb_new_text = vpb_new_text.replace(/\Ãº/gi,"&uacute;");vpb_new_text = vpb_new_text.replace(/\Ã»/gi,"&ucirc;");vpb_new_text = vpb_new_text.replace(/\Ã¼/gi,"&uuml;");vpb_new_text = vpb_new_text.replace(/\Ã½/gi,"&yacute;");vpb_new_text = vpb_new_text.replace(/\Ã¾/gi,"&thorn;");vpb_new_text = vpb_new_text.replace(/\Ã¿/gi,"&yuml;");vpb_new_text = vpb_new_text.replace(/\â‚¬/gi,"&euro;");return vpb_new_text; } /* Add break to contents */function vpb_wall_nl2br(vdata, vxml) { var createNewLines = (vxml || typeof vxml === 'undefined') ? '<br ' + '/>' : '<br>'; return (vdata + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + createNewLines + '$2'); }/* Add links to chat URLs */ function vpb_wall_create_link(vpb_chat_text) { var vpb_converted_links, vpb_https_http_ftp_links, vpb_www_links, vpb_email_links; vpb_https_http_ftp_links = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim; vpb_converted_links = vpb_chat_text.replace(vpb_https_http_ftp_links, '<a style="color: blue;" class="hover_text" href="$1" target="_blank">$1</a>'); pb_www_links = /(^|[^\/])(www\.[\S]+(\b|$))/gim; vpb_converted_links = vpb_converted_links.replace(vpb_www_links, '$1<a style="color: blue;" class="hover_text" href="http://$2" target="_blank">$2</a>'); vpb_email_links = /(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/gim; vpb_converted_links = vpb_converted_links.replace(vpb_email_links, '<a style="color: blue;" class="hover_text" href="mailto:$1" target="_blank">$1</a>'); return vpb_converted_links; }/* Add smilies to chat */ function vpb_wall_add_smilies(vpb_chat_text) { var vpb_wall_text_smiles = vpb_chat_text, vpb_a_smilies = [{ vpb_smiley_symbol: ':)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/smile.png" title="Smile" align="absmiddle">' },{ vpb_smiley_symbol: ':(', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/frown.png" title="Frown, Sad" align="absmiddle">' },{ vpb_smiley_symbol: 'O:)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/angel.png" title="Blushing angel" align="absmiddle">' },{ vpb_smiley_symbol: ':cat-face:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/colonthree.png" title="Cat face" align="absmiddle">' },{ vpb_smiley_symbol: 'o.O', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/confused.png" title="Confused" align="absmiddle">' },{ vpb_smiley_symbol: 'O.o', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/confused.png" title="Confused" align="absmiddle">' },{ vpb_smiley_symbol: ':cry:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/cry.png" title="Cry" align="absmiddle">' },{ vpb_smiley_symbol: ':laughing-devil:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/devil.png" title="Laughing devil" align="absmiddle">' },{ vpb_smiley_symbol: ':O', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/gasp.png" title="Shocked and surprised" align="absmiddle">' },{ vpb_smiley_symbol: 'B)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/glasses.png" title="Glasses" align="absmiddle">' },{ vpb_smiley_symbol: ':D', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/grin.png" title="Grin, Big Smile" align="absmiddle">' },{ vpb_smiley_symbol: ':grumpy:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/grumpy.png" title="Upset and angry" align="absmiddle">' },{ vpb_smiley_symbol: ':heart:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/heart.png" title="Heart" align="absmiddle">' },{ vpb_smiley_symbol: '^_^', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/kiki.png" title="Kekeke happy" align="absmiddle">' },{ vpb_smiley_symbol: ':kiss:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/kiss.png" title="Kiss" align="absmiddle">' },{ vpb_smiley_symbol: ':v', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/pacman.png" title="Pacman" align="absmiddle">' },{ vpb_smiley_symbol: ':penguin:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/penguin.gif" title="Penguin" align="absmiddle">' },{ vpb_smiley_symbol: ':unsure:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/unsure.png" title="Unsure" align="absmiddle">' },{ vpb_smiley_symbol: 'B|', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/sunglasses.png" title="Cool" align="absmiddle">' },{ vpb_smiley_symbol: 'B-|', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/sunglasses.png" title="Cool" align="absmiddle">' },{ vpb_smiley_symbol: '8-|', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/sunglasses.png" title="Cool" align="absmiddle">' },{ vpb_smiley_symbol: '8|', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/sunglasses.png" title="Cool" align="absmiddle">' },{ vpb_smiley_symbol: '-_-', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/squint.png" title="Annoyed, sighing or bored" align="absmiddle">' },{ vpb_smiley_symbol: ':lve:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/red_heart_love.gif" title="Love" align="absmiddle">' },{ vpb_smiley_symbol: ':putnam:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/putnam.gif" title="Christopher Putnam" align="absmiddle">' },{ vpb_smiley_symbol: '(wink)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/wink.png" title="Wink" align="absmiddle">' },{ vpb_smiley_symbol: '(wink)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/wink.png" title="Wink" align="absmiddle">' },{ vpb_smiley_symbol: '(off)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/no_idea.gif" title="No idea" align="absmiddle">' },{ vpb_smiley_symbol: '(on)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/got_idea.gif" title="Got an idea" align="absmiddle">' },{ vpb_smiley_symbol: ':tea-cup:', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/cup_of_tea.png" title="Cup of tea" align="absmiddle">' },{ vpb_smiley_symbol: '(n)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/no_thumbs_down.gif" title="No, thumb down" align="absmiddle">' },{ vpb_smiley_symbol: '(y)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/yes_thumbs_up.gif" title="Yes, thumb up" align="absmiddle">' },{ vpb_smiley_symbol: '(wink)', vpb_smiley_im: '<img src="'+vpb_site_url+'smileys/shark.gif" title="Shark" align="absmiddle">' },{ vpb_smiley_symbol: "=P", vpb_smiley_im: "tongue" },{ vpb_smiley_symbol: "=P", vpb_smiley_im: "tongue" }]; for (var i = 0; i < vpb_a_smilies.length; i++) { vpb_wall_text_smiles = vpb_wall_text_smiles.replace(vpb_a_smilies[i].vpb_smiley_symbol, vpb_a_smilies[i].vpb_smiley_im); } return vpb_wall_text_smiles; }

function vpb_this_xhr() { 
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest(); 
  } 
  try { 
    return new ActiveXObject('MSXML2.XMLHTTP.6.0');
  } catch (e) { 
    try { 
      return new ActiveXObject('MSXML2.XMLHTTP.3.0');
    } catch (e) { 
      return '';
    } 
  } 
}


//Get basename of file
function v_basename(url) 
{
    //return ((url=/(([^\/\\\.#\? ]+)(\.\w+)*)([?#].+)?$/.exec(url))!= null)? url[2]: '';
	return url.replace(/\\/g,'/').replace( /.*\//, '' );
}

function vpb_trim(s)
{
	return s.replace(/^\s+|\s+$/, '');
} 


function vpb_auto_grow(o)
{
	//var height = o.style.height.replace('px', '');
	o.style.overflow = (o.scrollHeight > 200 ? "auto" : "hidden");	
	o.style.height = "1px";
    setTimeout(function() {
        o.style.height = (o.scrollHeight)+"px";
    }, 1);
}
function vpb_hide_popup()
{
	$(".vpb_wall_post_security_setting_active").addClass('vpb_wall_post_security_setting');
	$(".vpb_wall_post_security_setting_active").removeClass('vpb_wall_post_security_setting_active');
}


function vpb_linkTitle(new_title)
{
	var session_uid = $("#session_uid").val();
	var dataString = {'username': session_uid, 'new_title': new_title, 'page':'vpb_save_new_link_title'};

	if(new_title.length>0)
	{
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#vpb_new_title").hide();
				$("#vpb_old_title").show().html($("#v_loading_btn").val());
			},
			success: function(response)
			{
				var response_brought = response.indexOf('empty_field');
				if( response_brought != -1 )
				{
					$("#vpb_old_title").show().html('<div class="vpb_title" align="left">'+new_title+'</div>');
					$("#vpb_old_title").hide();
					$("#vpb_new_title").show();
					$("#linkTitle").focus();
					
					$("#v-wall-message").html($("#vpb_empty_field_error").val());
					$("#v-wall-alert-box").click();
					return false;
				}
				else
				{
					var len = new_title.length;
					var new_title_Left;
					var max_allowed = 40;
					if (len <= parseInt(max_allowed)) 
					{
						new_title_Left = new_title;
					}
					else if (len >= parseInt(max_allowed)) 
					{
						new_title_trimed = new_title.substring(0, parseInt(max_allowed));
						new_title_Left = new_title_trimed+'...';
					}
					$("#vpb_old_title").show().html('<div class="vpb_title" align="left">'+new_title_Left+'</div>');
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_linkTitle('"+new_title+"');", 10000);
		});
	}
	else
	{
		$("#linkTitle").focus();
		$("#v-wall-message").html($("#vpb_empty_field_error").val());
		$("#v-wall-alert-box").click();
		return false;
	}
}
function vpb_linkDescription(new_description)
{
	var session_uid = $("#session_uid").val();
	var dataString = {'username': session_uid, 'new_description': new_description, 'page':'vpb_save_new_link_description'};

	if(new_description.length>0)
	{
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#vpb_new_description").hide();
				$("#vpb_old_description").show().html($("#v_loading_btn").val());
			},
			success: function(response)
			{
				var response_brought = response.indexOf('empty_field');
				if( response_brought != -1 )
				{
					$("#vpb_old_description").show().html('<div align="left">'+new_description+'</div>');
					$("#vpb_old_description").hide();
					$("#vpb_new_description").show();
					$("#linkDescription").focus();
					
					$("#v-wall-message").html($("#vpb_empty_field_error").val());
					$("#v-wall-alert-box").click();
					return false;
				}
				else
				{
					var len = new_description.length;
					var new_description_Left;
					var max_allowed = 220;
					if (len <= parseInt(max_allowed)) 
					{
						new_description_Left = new_description;
					}
					else if (len >= parseInt(max_allowed)) 
					{
						new_description_trimed = new_description.substring(0, parseInt(max_allowed));
						new_description_Left = new_description_trimed+'...';
					}
					$("#vpb_old_description").show().html('<div align="left">'+new_description_Left+'</div>');
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_linkDescription('"+new_description+"');", 10000);
		});
	}
	else
	{
		$("#linkDescription").focus();
		$("#v-wall-message").html($("#vpb_empty_field_error").val());
		$("#v-wall-alert-box").click();
		return false;
	}
}

// Set cookie
function vpb_setcookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}
// Get cookie
function vpb_getcookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
//Delete cookie
function vpb_removecookie(name) 
{
    vpb_setcookie(name,"",-1);
}

//vpb_setcookie('myCookie', 'The value of the cookie', 7)
//var myCookie = vpb_getcookie('myCookie');
//vpb_removecookie('myCookie')


//This function validates every submitted url for correct and valid URLs
function vpb_url_validated(url)
{
	var vpb_url_exp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if(vpb_url_exp.test(url)) { return true; }
	else { return false; }
}

//This function does the actual fetching of the submitted URL contents
function vpb_fetch_url_contents(type)
{
	if($('#add_photos').val() != "" || page_identifier == "") { return false; }
	
	var session_uid = $("#session_uid").val();
	var url = $('#vpb_link_to_fetch').val();
	var page_identifier = $("#vpb_page_identifier").val();
	
	if(type != "auto" && url == "" || type != "auto" && url == "Type or copy and paste your URL here...")
	{
		$("#v-wall-message").html($('#empty_url_to_fetch_field').val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if(type == "auto" && url == "")
	{
		$('#vpb_link_to_fetch').val('');
		$("#url_content_wrapper").hide();
		return false;
	}
	else if(type != "auto" && !vpb_url_validated(url))
	{
		$("#v-wall-message").html($('#invalid_url_to_fetch').val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if(type == "auto" && !vpb_url_validated(url))
	{
		$('#vpb_link_to_fetch').val('');
		$("#url_content_wrapper").hide();
		return false;
	}
	else
	{
		var dataString = {"username":session_uid, "url":url, "page_identifier":page_identifier, "page":"vpb_fetch_url_contents"};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('no_proper_data');
			if(response_brought != -1)
			{
				$('#vpb_link_to_fetch').val('');
				$("#url_content_wrapper").hide();
				return false;
			}
			else
			{
				$("#add_a_photo_button").hide();
				$("#add_a_video_button").hide();
				
				var response_data = response.split('&');
				var video_id = response_data[0];
				var video_type = response_data[1];
					
				var response_brought_b = response.indexOf('youtube');
				if(response_brought_b != -1 && video_type == "youtube")
				{
					$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
					  <iframe allowfullscreen class="embed-responsive-item" src="https://www.youtube.com/embed/'+video_id+'"></iframe>\
					</div>');
					
					document.getElementById('add_video_url').value='';
					document.getElementById('vpb-display-video').innerHTML='';
					
					$("#url_content_wrapper").hide();
					$('#vpb_link_to_fetch').val('');
					$("#fetched_url_content").html('');
					
					$("#vpb_added_videos").slideDown();
				}
				else
				{
					var response_brought_c = response.indexOf('vimeo');
					if(response_brought_c != -1 && video_type == "vimeo")
					{
						var response_sub_data = video_id.split('|');
						var video_uid = response_sub_data[0];
						var video_option = response_sub_data[1];
						
						$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="https://player.vimeo.com/video/'+video_uid+'"></iframe>\
						</div>');
						
						document.getElementById('add_video_url').value='';
						document.getElementById('vpb-display-video').innerHTML='';
						
						$("#url_content_wrapper").hide();
						$('#vpb_link_to_fetch').val('');
						$("#fetched_url_content").html('');
			
						$("#vpb_added_videos").slideDown();
					}
					else
					{
						var response_brought_d = response.indexOf('metacafe');
						if(response_brought_d != -1 && video_type == "metacafe")
						{
							$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
							  <iframe allowfullscreen class="embed-responsive-item" src="http://www.metacafe.com/embed/'+video_id+'"></iframe>\
							</div>');
							
							document.getElementById('add_video_url').value='';
							document.getElementById('vpb-display-video').innerHTML='';
							
							$("#url_content_wrapper").hide();
							$('#vpb_link_to_fetch').val('');
							$("#fetched_url_content").html('');
				
							$("#vpb_added_videos").slideDown();
						}
						else
						{
							var response_brought_e = response.indexOf('dailymotion');
							if(response_brought_e != -1 && video_type == "dailymotion")
							{
								$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
								  <iframe allowfullscreen class="embed-responsive-item" src="//www.dailymotion.com/embed/video/'+video_id+'"></iframe>\
								</div>');
								
								document.getElementById('add_video_url').value='';
								document.getElementById('vpb-display-video').innerHTML='';
								
								$("#url_content_wrapper").hide();
								$('#vpb_link_to_fetch').val('');
								$("#fetched_url_content").html('');
					
								$("#vpb_added_videos").slideDown();
							}
							else
							{
								var response_brought_f = response.indexOf('flickr');
								if(response_brought_f != -1 && video_type == "flickr")
								{
									$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
									  <iframe allowfullscreen class="embed-responsive-item" src="http://www.flickr.com/apps/video/stewart.swf?photo_id='+video_id+'"></iframe>\
									</div>');
									
									document.getElementById('add_video_url').value='';
									document.getElementById('vpb-display-video').innerHTML='';
									
									$("#url_content_wrapper").hide();
									$('#vpb_link_to_fetch').val('');
									$("#fetched_url_content").html('');
						
									$("#vpb_added_videos").slideDown();
								}
								else
								{
									var response_brought_g = response.indexOf('myspace');
									if(response_brought_g != -1 && video_type == "myspace")
									{
										$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
										  <iframe allowfullscreen class="embed-responsive-item" src="//media.myspace.com/play/video/'+video_id+'"></iframe>\
										</div>');
										
										document.getElementById('add_video_url').value='';
										document.getElementById('vpb-display-video').innerHTML='';
										
										$("#url_content_wrapper").hide();
										$('#vpb_link_to_fetch').val('');
										$("#fetched_url_content").html('');
							
										$("#vpb_added_videos").slideDown();
									}
									else
									{
										var response_brought_d = response.indexOf('no_data_was_fetched');
										if(response_brought_d != -1)
										{
											$("#vpb_video").html('');
											$("#vpb_added_videos").hide();
											
											$("#url_content_wrapper").hide();
											$('#vpb_link_to_fetch').val('');
											$("#fetched_url_content").html('');
										}
										else
										{
											$("#vpb_video").html('');
											$("#vpb_added_videos").hide();
										
											$('#fetched_url_content').hide().fadeIn('slow').html(response);
											$('#vpb_all_images img').hide();
											if($('img#vasplus_image_id1').length > 0)
											{
												$('img#vasplus_image_id1').show();
												$('#vpb_selected_image_num').html(1);
												$('#vpb_current_image_id').val(1);
												
												if (parseInt($('#total_images').val()) <= 1)
												{
													$('#nextv').hide();
													$('#nextv_end').show();
												}
												else {}
											}
											else
											{
												$('img#vasplus_image_id_zero').show();
												$('#vpb_selected_image_num').html(0);
												$('#vpb_current_image_id').val(0);
											}
											$('#vpb_link_to_fetch').val('');
										}
									}
								}
							}
						}
					}
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_fetch_url_contents('"+type+"');", 10000);
		});
	}
}
//This function hides the fetched title
// on click of it and shows the textarea
// box title content so that the user 
//can edit the fetched title content
function vpb_display_title_hidden()
{
	$('#vpb_old_title').hide();
	$('#vpb_new_title').show();
}

//This function hides the fetched 
//description on click of it and shows the 
//textarea box description content so that 
//the user can edit the fetched description content
function vpb_display_description_hidden()
{
	$('#vpb_old_description').hide();
	$('#vpb_new_description').show();
}
// This function performs the next image operation by showing the next images one by one on clicking the Next Button
function vpb_next_or_prev_images(action)
{
	var last_image = parseInt($('#total_images').val());	
	var current_image = parseInt($('#vpb_current_image_id').val());	
	
	if ( action == "next_image" )
	{
		if (parseInt(current_image) >= parseInt(last_image))
		{
			$('#nextv').hide();
			$('#nextv_end').show();
			
			var next = parseInt(current_image)+1;
			$('#vasplus_image_id'+parseInt(current_image)).hide();
			$('#vasplus_image_id'+parseInt(next)).fadeIn();
			$('#vpb_current_image_id').val(parseInt(next));
			$('#vpb_selected_image_num').html(parseInt(next));
			
			if (parseInt(next) > 1)
			{
				$('#prevv_end').hide();
				$('#prevv').show();
			}
			else {}
		}
		else
		{	
			var next = parseInt(current_image)+1;
			$('#vasplus_image_id'+parseInt(current_image)).hide();
			$('#vasplus_image_id'+parseInt(next)).fadeIn();
			$('#vpb_current_image_id').val(parseInt(next));
			$('#vpb_selected_image_num').html(parseInt(next));
			$('#nextv_end').hide();
			$('#nextv').show();
			$('#prevv_end').hide();
			$('#prevv').show();
		}
	}
	else if ( action == "prev_image" )
	{
		if( parseInt(current_image) <= 1 )
		{
			$('#prevv').hide();
			$('#prevv_end').show();
		}
		else
		{
			var prev = parseInt(current_image)-1;
			$('#vasplus_image_id'+parseInt(current_image)).hide();
			$('#vasplus_image_id'+parseInt(prev)).fadeIn();
			$('#vpb_current_image_id').val(parseInt(current_image)-1);
			$('#vpb_selected_image_num').html(parseInt(current_image)-1);
			$('#prevv_end').hide();
			$('#prevv').show();
			$('#nextv_end').hide();
			$('#nextv').show();
			
			//Check again finally
			var current_imageP = parseInt($('#vpb_current_image_id').val());	
			if( parseInt(current_imageP) <= 1 )
			{
				$('#prevv').hide();
				$('#prevv_end').show();
			}
		}
	}
	else 
	{
		//alert('Un-identified action brought...');
	}
}	

function googleTranslateElementInit2() 
{
	new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element2');
}
/* <![CDATA[ */
eval(function(p,a,c,k,e,r)
{
	e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}));
/* ]]> */


//Show/Hide Smiley Box
function vpb_wall_smiley_box() 
{
	$("#user_selected_this_location").hide();
	
	var vpb_box_state = $("#vpb_the_wall_smiley_box").css('display');
	if(vpb_box_state == 'block') 
	{
		$("#add_smile_button").removeClass('vfooter_wraper_active'); 
		$("#add_smile_button").addClass('vfooter_wraper'); 
		$("#vpb_the_wall_smiley_box").slideUp(); 
	} else {
		
		// Hide the tagging section before showing the smiley section
		$("#tag_people_button").removeClass('vfooter_wraper_active'); 
		$("#tag_people_button").addClass('vfooter_wraper'); 
		$("#start_typing_name").css('display', 'none');
		
		// Hide the location section before showing the tagging section
		$("#add_location_button").removeClass('vfooter_wraper_active'); 
		$("#add_location_button").addClass('vfooter_wraper'); 
		$("#user_is_at_this_location").css('display', 'none');
		
		$("#url_content_wrapper").css('display', 'none');
		
		$("#add_smile_button").removeClass('vfooter_wraper'); 
		$("#add_smile_button").addClass('vfooter_wraper_active'); 
		$("#vpb_the_wall_smiley_box").slideDown(); 
	}
}


function vpb_comment_smiley_box(post_id) 
{
	 $(".reply_smiley_dropdown_menu").hide();
	$(".vpb_reply_smiley_buttons").show();
	$("#smiley_identifier").val(parseInt(post_id)); 
	
	if($("#vpb_comment_smiley_box_"+parseInt(post_id)).length>0)
	{
		$("#vpb_comment_smiley_box_"+parseInt(post_id)).html('<div class="vpb_wall_smiley_box_wrapper"><div class="vpb_smiley_inner_box"><span class="smiley_a" title="Smile" onclick="vpb_add_smiley_to_comment(\':)\');"></span><span class="smiley_b" title="Frown, Sad" onclick="vpb_add_smiley_to_comment(\':(\');"></span><span class="smiley_c" title="Blushing angel" onclick="vpb_add_smiley_to_comment(\':blushing-angel:\');"></span><span class="smiley_d" title="Cat face" onclick="vpb_add_smiley_to_comment(\':cat-face:\');"></span><span class="smiley_e" title="Confused" onclick="vpb_add_smiley_to_comment(\'o.O\');"></span><span class="smiley_f" title="Cry" onclick="vpb_add_smiley_to_comment(\':cry:\');"></span><span class="smiley_g" title="Laughing devil" onclick="vpb_add_smiley_to_comment(\':laughing-devil:\');"></span><span class="smiley_h" title="Shocked and surprised" onclick="vpb_add_smiley_to_comment(\':O\');"></span><span class="smiley_i" title="Glasses" onclick="vpb_add_smiley_to_comment(\'B)\');"></span><span class="smiley_j" title="Grin, Big Smile" onclick="vpb_add_smiley_to_comment(\':D\');"></span><span class="smiley_k" title="Upset and angry" onclick="vpb_add_smiley_to_comment(\':grumpy:\');"></span><span class="smiley_l" title="Heart" onclick="vpb_add_smiley_to_comment(\':heart:\');"></span><span class="smiley_m" title="Kekeke happy" onclick="vpb_add_smiley_to_comment(\'^_^\');"></span><span class="smiley_n" title="Kiss" onclick="vpb_add_smiley_to_comment(\':kiss:\');"></span><span class="smiley_o" title="Pacman" onclick="vpb_add_smiley_to_comment(\':v\');"></span><span class="smiley_p" title="Penguin" onclick="vpb_add_smiley_to_comment(\':penguin:\');"></span><span class="smiley_q" title="Unsure" onclick="vpb_add_smiley_to_comment(\':unsure:\');"></span><span class="smiley_r" title="Cool" onclick="vpb_add_smiley_to_comment(\'B|\');"></span><span class="smiley_s" title="Annoyed, sighing or bored" onclick="vpb_add_smiley_to_comment(\'-_-\');"></span><span class="smiley_t" title="Love" onclick="vpb_add_smiley_to_comment(\':lve:\');"></span><span class="smiley_u" title="Christopher Putnam" onclick="vpb_add_smiley_to_comment(\':putnam:\');"></span><span class="smiley_zb" title="Shark" onclick="vpb_add_smiley_to_comment(\'(wink)\');"></span><span class="smiley_v" title="Wink" onclick="vpb_add_smiley_to_comment(\'(wink)\');"></span><span class="smiley_w" title="No idea" onclick="vpb_add_smiley_to_comment(\'(off)\');"></span><span class="smiley_x" title="Got an idea" onclick="vpb_add_smiley_to_comment(\'(on)\');"></span><span class="smiley_y" title="Cup of tea" onclick="vpb_add_smiley_to_comment(\':tea-cup:\');"></span><span class="smiley_z" title="No, thumb down" onclick="vpb_add_smiley_to_comment(\'(n)\');"></span><span class="smiley_za" title="Yes, thumb up" onclick="vpb_add_smiley_to_comment(\'(y)\');"></span><div style="clear:both;"></div></div></div><div style="clear: both;"></div>');
	}
	else {}
	
	$(".comment_smiley_dropdown_menu").hide();
	$(".vpb_smiley_buttons").show();
	$("#vpb_the_comment_smiley_box"+parseInt(post_id)).slideDown();
	$("#vpb_show_smiley_button_"+parseInt(post_id)).hide(); 
	
	$('html, body').animate({
		scrollTop: $("#vpb_the_comment_smiley_box"+parseInt(post_id)).offset().top-parseInt(130)+'px'
	}, 1600, 'easeInOutExpo');
}
// Hide comment smiley box
function vpb_hide_comment_smiley_box(post_id) 
{
	$(".comment_smiley_dropdown_menu").hide();
	$(".vpb_smiley_buttons").show();
	
	$(".reply_smiley_dropdown_menu").hide();
	$(".vpb_reply_smiley_buttons").show();
	
	$("#vpb_the_comment_smiley_box"+parseInt(post_id)).hide(); 
	$("#vpb_show_smiley_button_"+parseInt(post_id)).show();
}


// Reply smiley box
function vpb_reply_smiley_box(comment_id) 
{
	$(".comment_smiley_dropdown_menu").hide();
	$(".vpb_smiley_buttons").show();
	$("#reply_smiley_identifier").val(parseInt(comment_id)); 
	
	if($("#vpb_reply_smiley_box_"+parseInt(comment_id)).length>0)
	{
		$("#vpb_reply_smiley_box_"+parseInt(comment_id)).html('<div class="vpb_wall_smiley_box_wrapper"><div class="vpb_smiley_inner_box"><span class="smiley_a" title="Smile" onclick="vpb_add_smiley_to_reply(\':)\');"></span><span class="smiley_b" title="Frown, Sad" onclick="vpb_add_smiley_to_reply(\':(\');"></span><span class="smiley_c" title="Blushing angel" onclick="vpb_add_smiley_to_reply(\':blushing-angel:\');"></span><span class="smiley_d" title="Cat face" onclick="vpb_add_smiley_to_reply(\':cat-face:\');"></span><span class="smiley_e" title="Confused" onclick="vpb_add_smiley_to_reply(\'o.O\');"></span><span class="smiley_f" title="Cry" onclick="vpb_add_smiley_to_reply(\':cry:\');"></span><span class="smiley_g" title="Laughing devil" onclick="vpb_add_smiley_to_reply(\':laughing-devil:\');"></span><span class="smiley_h" title="Shocked and surprised" onclick="vpb_add_smiley_to_reply(\':O\');"></span><span class="smiley_i" title="Glasses" onclick="vpb_add_smiley_to_reply(\'B)\');"></span><span class="smiley_j" title="Grin, Big Smile" onclick="vpb_add_smiley_to_reply(\':D\');"></span><span class="smiley_k" title="Upset and angry" onclick="vpb_add_smiley_to_reply(\':grumpy:\');"></span><span class="smiley_l" title="Heart" onclick="vpb_add_smiley_to_reply(\':heart:\');"></span><span class="smiley_m" title="Kekeke happy" onclick="vpb_add_smiley_to_reply(\'^_^\');"></span><span class="smiley_n" title="Kiss" onclick="vpb_add_smiley_to_reply(\':kiss:\');"></span><span class="smiley_o" title="Pacman" onclick="vpb_add_smiley_to_reply(\':v\');"></span><span class="smiley_p" title="Penguin" onclick="vpb_add_smiley_to_reply(\':penguin:\');"></span><span class="smiley_q" title="Unsure" onclick="vpb_add_smiley_to_reply(\':unsure:\');"></span><span class="smiley_r" title="Cool" onclick="vpb_add_smiley_to_reply(\'B|\');"></span><span class="smiley_s" title="Annoyed, sighing or bored" onclick="vpb_add_smiley_to_reply(\'-_-\');"></span><span class="smiley_t" title="Love" onclick="vpb_add_smiley_to_reply(\':lve:\');"></span><span class="smiley_u" title="Christopher Putnam" onclick="vpb_add_smiley_to_reply(\':putnam:\');"></span><span class="smiley_zb" title="Shark" onclick="vpb_add_smiley_to_reply(\'(wink)\');"></span><span class="smiley_v" title="Wink" onclick="vpb_add_smiley_to_reply(\'(wink)\');"></span><span class="smiley_w" title="No idea" onclick="vpb_add_smiley_to_reply(\'(off)\');"></span><span class="smiley_x" title="Got an idea" onclick="vpb_add_smiley_to_reply(\'(on)\');"></span><span class="smiley_y" title="Cup of tea" onclick="vpb_add_smiley_to_reply(\':tea-cup:\');"></span><span class="smiley_z" title="No, thumb down" onclick="vpb_add_smiley_to_reply(\'(n)\');"></span><span class="smiley_za" title="Yes, thumb up" onclick="vpb_add_smiley_to_reply(\'(y)\');"></span><div style="clear:both;"></div></div></div><div style="clear: both;"></div>');
	}
	else {}
	
	$(".reply_smiley_dropdown_menu").hide();
	$(".vpb_reply_smiley_buttons").show();
	$("#vpb_the_reply_smiley_box"+parseInt(comment_id)).slideDown();
	$("#vpb_show_reply_smiley_button_"+parseInt(comment_id)).hide(); 
	
	$('html, body').animate({
		scrollTop: $("#vpb_the_reply_smiley_box"+parseInt(comment_id)).offset().top-parseInt(130)+'px'
	}, 1600, 'easeInOutExpo');
}
// Hide reply smiley box
function vpb_hide_reply_smiley_box(comment_id) 
{
	$(".reply_smiley_dropdown_menu").hide();
	$(".vpb_reply_smiley_buttons").show();
	
	$(".comment_smiley_dropdown_menu").hide();
	$(".vpb_smiley_buttons").show();
	
	$("#vpb_the_reply_smiley_box"+parseInt(comment_id)).hide(); 
	$("#vpb_show_reply_smiley_button_"+parseInt(comment_id)).show();
}

function vpb_show_reply_box(comment_id) 
{
	if($("#vpb_reply_box_"+parseInt(comment_id)).css('display') == "none")
	{
		$(".vpb_reply_posting_wrapper").hide();
		$("#vpb_reply_box_"+parseInt(comment_id)).show();
	}
	else {}
	$("#vpb_wall_reply_data_"+parseInt(comment_id)).click();  
	$("#vpb_wall_reply_data_"+parseInt(comment_id)).focus();
	
	$('html, body').animate({
		scrollTop: $("#vpb_wall_reply_data_"+parseInt(comment_id)).offset().top-parseInt(150)+'px'
	}, 1600, 'easeInOutExpo');
}
//Add smiley to wall comment box when clicked on
function vpb_add_smiley_to_reply(smiley) 
{
	var post_id = $("#reply_smiley_identifier").val();
	var old_pms_message = $("#vpb_wall_reply_data_"+parseInt(post_id)).val();
	if(old_pms_message == "") {
		$("#vpb_wall_reply_data_"+parseInt(post_id)).click();
		$("#vpb_wall_reply_data_"+parseInt(post_id)).focus();
		$("#vpb_wall_reply_data_"+parseInt(post_id)).val(smiley);
	}
	else
	{
		$("#vpb_wall_reply_data_"+parseInt(post_id)).click();
		$("#vpb_wall_reply_data_"+parseInt(post_id)).focus();
		$("#vpb_wall_reply_data_"+parseInt(post_id)).val(old_pms_message+' '+smiley);
	}
	
}




//Add smiley to wall post box when clicked on
function vpb_add_smiley_to_wall_status(smiley) 
{
	var old_pms_message = $("#vpb_wall_post_data").val();
	if(old_pms_message == "") {
		$("#vpb_wall_post_data").focus();
		$("#vpb_wall_post_data").val(smiley);
	}
	else
	{
		$("#vpb_wall_post_data").focus();
		$("#vpb_wall_post_data").val(old_pms_message+' '+smiley);
	}
	
	$("#add_smile_button").removeClass('vfooter_wraper_active'); 
	$("#add_smile_button").addClass('vfooter_wraper'); 
	$("#vpb_the_wall_smiley_box").hide(); 
}
//Add smiley to wall comment box when clicked on
function vpb_add_smiley_to_comment(smiley) 
{
	var post_id = $("#smiley_identifier").val();
	var old_pms_message = $("#vpb_wall_comment_data_"+parseInt(post_id)).val();
	if(old_pms_message == "") {
		$("#vpb_wall_comment_data_"+parseInt(post_id)).click();
		$("#vpb_wall_comment_data_"+parseInt(post_id)).focus();
		$("#vpb_wall_comment_data_"+parseInt(post_id)).val(smiley);
	}
	else
	{
		$("#vpb_wall_comment_data_"+parseInt(post_id)).click();
		$("#vpb_wall_comment_data_"+parseInt(post_id)).focus();
		$("#vpb_wall_comment_data_"+parseInt(post_id)).val(old_pms_message+' '+smiley);
	}
	
}

// Update Post
function vpb_save_status_update(post_id)
{
	var post = vpb_trim($("#vpb_wall_status_editable_data_"+parseInt(post_id)).val());
	var session_uid = $("#session_uid").val();
	
	if(post == "")
	{
		$("#v-wall-message").html($("#invalid_status_update_field").val()); 
		$("#v-wall-alert-box").click();
		return false;
	}
	else
	{
		var dataString = {'post_id': post_id, 'session_uid': session_uid, 'page':'update_post', 'post':post};
		$.ajax({  
			type: "POST",  
			url: vpb_site_url+'wall-processor.php',  
			data: dataString,
			beforeSend: function() 
			{
				$("#saving_changes_loading_"+parseInt(post_id)).html($("#v_sending_btn").val());
				$("#vpb_editable_status_wrapper_"+parseInt(post_id)).removeClass('enable_this_box');
				$("#vpb_editable_status_wrapper_"+parseInt(post_id)).addClass('disable_this_box');
			},  
			success: function(response)
			{
				$("#saving_changes_loading_"+parseInt(post_id)).html('');
				$("#vpb_editable_status_wrapper_"+parseInt(post_id)).removeClass('disable_this_box');
				$("#vpb_editable_status_wrapper_"+parseInt(post_id)).addClass('enable_this_box');
					
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 )
				{
					var len = post.length;
					var post_Left;
					var max_allowed = 400;
					if (len <= parseInt(max_allowed)) 
					{
						post_Left = post;
					}
					else if (len >= parseInt(max_allowed)) 
					{
						post_trimed = post.substring(0, parseInt(max_allowed));
						post_Left = post_trimed+'...';
					}
					
					$("#vpost_"+parseInt(post_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(post_Left)))));
					$("#vpost_large_"+parseInt(post_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(post)))));
					$("#vpb_editable_status_wrapper_"+parseInt(post_id)).hide();
					$("#vpb_default_status_wrapper_"+parseInt(post_id)).show();
					$("#vedited_id_"+parseInt(post_id)).show();
					$("#vdotted_id_"+parseInt(post_id)).show();
				}
				else
				{
					$("#v-wall-message").html(response); 
					$("#v-wall-alert-box").click();
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_save_status_update('"+parseInt(post_id)+"');", 10000);
		});
	}
}


// Load and display post likes
function vpb_load_edited_history(item_id, username, label, action) 
{
	var session_uid = $("#session_uid").val();
	var dataString = {'page':'load_edited_histories', 'item_id': item_id, 'username': username, 'action': action};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#vpb_system_data_title").html(label);
			$("#vpb_display_wall_gen_data").html('<br><br>'+$("#v_loading_btn").val());
			$("#v-wall-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_wall_gen_data").html(response);
			if(session_uid == username) {
				$("#v_wall_bottom_left_info").html($("#the_edit_history_info_text").val()+' '+action);
			}
			else {}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_edited_history('"+item_id+"', '"+username+"', '"+label+"', '"+action+"');", 10000);
	});
}


// Save edited reply
function vpb_save_reply_update(reply_id)
{
	var reply_post = vpb_trim($("#vpb_wall_reply_editable_data_"+parseInt(reply_id)).val());
	var session_uid = $("#session_uid").val();
	
	if(reply_post == "")
	{
		$("#v-wall-message").html($("#invalid_comment_update_field").val()); 
		$("#v-wall-alert-box").click();
		return false;
	}
	else
	{
		var dataString = {'reply_id': reply_id, 'session_uid': session_uid, 'page':'update_reply', 'reply':reply_post};
		$.ajax({  
			type: "POST",  
			url: vpb_site_url+'wall-processor.php',  
			data: dataString,
			beforeSend: function() 
			{
				$("#save_reply_changes_loading_"+parseInt(reply_id)).html($("#v_sending_btn").val());
				$("#vpb_editable_reply_wrapper_"+parseInt(reply_id)).removeClass('enable_this_box');
				$("#vpb_editable_reply_wrapper_"+parseInt(reply_id)).addClass('disable_this_box');
			},  
			success: function(response)
			{
				$("#save_reply_changes_loading_"+parseInt(reply_id)).html('');
				$("#vpb_editable_reply_wrapper_"+parseInt(reply_id)).removeClass('disable_this_box');
				$("#vpb_editable_reply_wrapper_"+parseInt(reply_id)).addClass('enable_this_box');
					
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 )
				{
					var len = reply_post.length;
					var reply_post_Left;
					var max_allowed = 300;
					if (len <= parseInt(max_allowed)) 
					{
						reply_post_Left = reply_post;
					}
					else if (len >= parseInt(max_allowed)) 
					{
						reply_post_trimed = reply_post.substring(0, parseInt(max_allowed));
						reply_post_Left = reply_post_trimed+'...';
					}
					
					$("#vreplies_"+parseInt(reply_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(reply_post_Left)))));
					
					$("#vreplies_large_"+parseInt(reply_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(reply_post)))));
					
					$("#vpb_editable_reply_wrapper_"+parseInt(reply_id)).hide();
					$("#vpb_default_reply_wrapper_"+parseInt(reply_id)).show();
					$("#redited_id_"+parseInt(reply_id)).show();
					$("#rdotted_id_"+parseInt(reply_id)).show();
				}
				else
				{
					$("#v-wall-message").html(response); 
					$("#v-wall-alert-box").click();
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_save_reply_update('"+parseInt(reply_id)+"');", 10000);
		});
	}
}


// Save edited comment
function vpb_save_comment_update(comment_id)
{
	var comment_post = vpb_trim($("#vpb_wall_comment_editable_data_"+parseInt(comment_id)).val());
	var session_uid = $("#session_uid").val();
	
	if(comment_post == "")
	{
		$("#v-wall-message").html($("#invalid_comment_update_field").val()); 
		$("#v-wall-alert-box").click();
		return false;
	}
	else
	{
		var dataString = {'comment_id': comment_id, 'session_uid': session_uid, 'page':'update_comment', 'comment':comment_post};
		$.ajax({  
			type: "POST",  
			url: vpb_site_url+'wall-processor.php',  
			data: dataString,
			beforeSend: function() 
			{
				$("#save_changes_loading_"+parseInt(comment_id)).html($("#v_sending_btn").val());
				$("#vpb_editable_comment_wrapper_"+parseInt(comment_id)).removeClass('enable_this_box');
				$("#vpb_editable_comment_wrapper_"+parseInt(comment_id)).addClass('disable_this_box');
			},  
			success: function(response)
			{
				$("#save_changes_loading_"+parseInt(comment_id)).html('');
				$("#vpb_editable_comment_wrapper_"+parseInt(comment_id)).removeClass('disable_this_box');
				$("#vpb_editable_comment_wrapper_"+parseInt(comment_id)).addClass('enable_this_box');
					
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 )
				{
					var len = comment_post.length;
					var comment_post_Left;
					var max_allowed = 300;
					if (len <= parseInt(max_allowed)) 
					{
						comment_post_Left = comment_post;
					}
					else if (len >= parseInt(max_allowed)) 
					{
						comment_post_trimed = comment_post.substring(0, parseInt(max_allowed));
						comment_post_Left = comment_post_trimed+'...';
					}
					
					$("#vcomments_"+parseInt(comment_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(comment_post_Left)))));
					
					$("#vcomments_large_"+parseInt(comment_id)).html(vpb_wall_add_smilies(vpb_wall_nl2br(vpb_wall_create_link(vasplus_wall_special_text(comment_post)))));
					
					$("#vpb_editable_comment_wrapper_"+parseInt(comment_id)).hide();
					$("#vpb_default_comment_wrapper_"+parseInt(comment_id)).show();
					$("#cedited_id_"+parseInt(comment_id)).show();
					$("#cdotted_id_"+parseInt(comment_id)).show();
				}
				else
				{
					$("#v-wall-message").html(response); 
					$("#v-wall-alert-box").click();
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_save_comment_update('"+parseInt(comment_id)+"');", 10000);
		});
	}
}

// Show and Hide edited comments
// Show and Hide edited comments
function vpb_show_edited_comment_DISABLED(comment_id)
{
	$("#vedited_button_"+parseInt(comment_id)).hide();
	$("#vedited_"+parseInt(comment_id)).fadeIn();
}
function vpb_show_hide_edited_comment_DISABLED(edited_comment_id, comment_id, action)
{
	if(action == "show")
	{
		$("#v_show_edited_"+parseInt(edited_comment_id)).hide();
		$("#v_hide_edited_"+parseInt(edited_comment_id)).show();
		$("#v_edited_comments_"+parseInt(edited_comment_id)).fadeIn();
		
		$('html, body').animate({
			scrollTop: $("#v_edited_comments_"+parseInt(edited_comment_id)).offset().top-parseInt(15)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else
	{
		$("#v_edited_comments_"+parseInt(edited_comment_id)).fadeOut();
		$("#v_hide_edited_"+parseInt(edited_comment_id)).hide();
		$("#v_show_edited_"+parseInt(edited_comment_id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_default_comment_wrapper_"+parseInt(comment_id)).offset().top-parseInt(30)+'px'
		}, 1600, 'easeInOutExpo');
	}
}


// Submit reply
function vpb_submit_reply(vpb_evnts, reply, comment_id)
{
	var vpb_key_code = (vpb_evnts.keyCode ? vpb_evnts.keyCode : vpb_evnts.which);
	
	var reply_post = vpb_trim($(reply).val());
	var session_uid = $("#session_uid").val();
	
	//Do not allow spaces in textarea chat box
	if (vpb_key_code == 13 && !vpb_evnts.shiftKey)  {
		vpb_evnts.preventDefault(); 
	}
	
	if(vpb_key_code == 13 && vpb_evnts.shiftKey == 0)  
	{
		var ext = $("#reply_photo_"+parseInt(comment_id)).val().split('.').pop().toLowerCase();
		var photos = $("#reply_photo_"+parseInt(comment_id)).val();
			
		if(reply_post == "" && vpb_trim(photos) == "")
		{
			$("#v-wall-message").html($("#invalid_reply_update_field").val()); 
			$("#v-wall-alert-box").click();
			e.stopPropagation();
			return false;
		}
		else
		{
			if(photos != "" && $.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
			{
				$("#reply_photo_"+parseInt(comment_id)).val('')
				$("#add_reply_file_clicked_"+parseInt(comment_id)).data('original-title', 'Attach a photo');
				$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('data-original-title', 'Attach a photo');
				$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('title', 'Attach a photo');
				
				$("#v-wall-message").html($("#invalid_file_attachment").val());
				$("#v-wall-alert-box").click();
				return false;
			}
			else
			{
				var dataString = {'comment_id': comment_id, 'session_uid': session_uid, 'page':'sumit_reply', 'reply':reply_post};
				$.ajax({  
					type: "POST",  
					url: vpb_site_url+'wall-processor.php',  
					data: dataString,
					beforeSend: function() 
					{
						$("#vpb_reply_bottom_icons_"+parseInt(comment_id)).hide();
						vpb_hide_reply_smiley_box(parseInt(comment_id));
						$("#vpb_preview_reply_photo_"+parseInt(comment_id)).hide();
						$("#vpb_display_reply_loading_"+parseInt(comment_id)).html($("#v_sending_btn").val());
						$("#vpb_reply_loading_"+parseInt(comment_id)).show();
						
						$("#vpb_reply_box_"+parseInt(comment_id)).removeClass('enable_this_box');
						$("#vpb_reply_box_"+parseInt(comment_id)).addClass('disable_this_box');
						
						vpb_security_check_points();
					},  
					success: function(response)
					{
						var response_brought = response.indexOf('process_completed');
						if( response_brought !=- 1 )
						{
							var v_data = response.split('&');
							var id = v_data[1];
							vpb_add_photos_to_reply(parseInt(id), parseInt(comment_id));
						}
						else
						{
							$("#vpb_reply_bottom_icons_"+parseInt(comment_id)).show();
							$("#vpb_display_reply_loading_"+parseInt(comment_id)).html('');
							$("#vpb_reply_loading_"+parseInt(comment_id)).hide();
							
							$("#vpb_reply_box_"+parseInt(comment_id)).removeClass('disable_this_box');
							$("#vpb_reply_box_"+parseInt(comment_id)).addClass('enable_this_box');
							
							$("#v-wall-message").html(response); 
							$("#v-wall-alert-box").click();
							return false;
						}
					}
				}).fail(function(error_response) 
				{
					setTimeout("vpb_submit_reply('"+vpb_evnts+"', '"+reply+"', '"+parseInt(comment_id)+"');", 10000);
				});
			}
		}
	}
}

//Add Image File to reply
function vpb_add_photos_to_reply(id, comment_id)
{
	var username = $("#session_uid").val();
	
	if(parseInt(id) == "" || parseInt(comment_id) == "" || username == "") 
	{
		$("#vpb_reply_bottom_icons_"+parseInt(comment_id)).show();
		$("#vpb_display_reply_loading_"+parseInt(comment_id)).html('');
		$("#vpb_reply_loading_"+parseInt(comment_id)).hide();
		
		$("#vpb_reply_box_"+parseInt(comment_id)).removeClass('disable_this_box');
		$("#vpb_reply_box_"+parseInt(comment_id)).addClass('enable_this_box');
		
		$("#v-wall-message").html($("#general_system_error").val()); 
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		//Proceed now because a user has selected some files
		var vpb_files = document.getElementById('reply_photo_'+parseInt(comment_id)).files;
		
		// Create a formdata object and append the files
		var vpb_data = new FormData();
		
		$.each(vpb_files, function(keys, values)
		{
			vpb_data.append(keys, values);
		});
		vpb_data.append("id", id);
		vpb_data.append("username", username);
		vpb_data.append("page", 'vpb_final_reply_update_submission');
	
	
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: vpb_data,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function() {},
			success: function(response)
			{
				$("#vpb_reply_box_"+parseInt(comment_id)).removeClass('disable_this_box');
				$("#vpb_reply_box_"+parseInt(comment_id)).addClass('enable_this_box');
				
				$("#vpb_reply_bottom_icons_"+parseInt(comment_id)).show();
				$("#vpb_display_reply_loading_"+parseInt(comment_id)).html('');
				$("#vpb_reply_loading_"+parseInt(comment_id)).hide();
				$("#remove_reply_photo_"+parseInt(comment_id)).hide();
					
				var response_brought = response.indexOf('post_no_found');
				if(response_brought != -1)
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
				else
				{
					$("#reply_photo_"+parseInt(comment_id)).val('');
					$("#vpb_wall_reply_data_"+parseInt(comment_id)).val('').change();
					
					$("#vpb_reply_updated_"+parseInt(comment_id)).append(
						$(response).hide().fadeIn('slow')
					);
					
					$('html, body').animate({
						scrollTop: $("#vpb_reply_id_"+parseInt(id)).offset().top-parseInt(130)+'px'
					}, 1600, 'easeInOutExpo');
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_add_photos_to_reply('"+parseInt(id)+"', '"+parseInt(comment_id)+"');", 10000);
		});		
	}
}


// Submit Comment
function vpb_submit_comment(vpb_evnts, comment, post_id)
{
	var vpb_key_code = (vpb_evnts.keyCode ? vpb_evnts.keyCode : vpb_evnts.which);
	
	var comment_post = vpb_trim($(comment).val());
	var session_uid = $("#session_uid").val();
	
	//Do not allow spaces in textarea chat box
	if (vpb_key_code == 13 && !vpb_evnts.shiftKey)  {
		vpb_evnts.preventDefault(); 
	}
	
	if(vpb_key_code == 13 && vpb_evnts.shiftKey == 0)  
	{
		var ext = $("#comment_photo_"+parseInt(post_id)).val().split('.').pop().toLowerCase();
		var photos = $("#comment_photo_"+parseInt(post_id)).val();
			
		if(comment_post == "" && vpb_trim(photos) == "")
		{
			$("#v-wall-message").html($("#invalid_comment_update_field").val()); 
			$("#v-wall-alert-box").click();
			e.stopPropagation();
			return false;
		}
		else
		{
			if(photos != "" && $.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
			{
				$("#comment_photo_"+parseInt(post_id)).val('')
				$("#add_file_clicked_"+parseInt(post_id)).data('original-title', 'Attach a photo');
				$("#add_file_clicked_"+parseInt(post_id)).attr('data-original-title', 'Attach a photo');
				$("#add_file_clicked_"+parseInt(post_id)).attr('title', 'Attach a photo');
				
				$("#v-wall-message").html($("#invalid_file_attachment").val());
				$("#v-wall-alert-box").click();
				return false;
			}
			else
			{
				var dataString = {'post_id': post_id, 'session_uid': session_uid, 'page':'sumit_comment', 'comment':comment_post};
				$.ajax({  
					type: "POST",  
					url: vpb_site_url+'wall-processor.php',  
					data: dataString,
					beforeSend: function() 
					{
						$("#vpb_comment_bottom_icons_"+parseInt(post_id)).hide();
						vpb_hide_comment_smiley_box(parseInt(post_id));
						$("#vpb_preview_comment_photo_"+parseInt(post_id)).hide();
						$("#vpb_display_comment_loading_"+parseInt(post_id)).html($("#v_sending_btn").val());
						$("#vpb_comment_loading_"+parseInt(post_id)).show();
						
						$("#vpb_comment_box_"+parseInt(post_id)).removeClass('enable_this_box');
						$("#vpb_comment_box_"+parseInt(post_id)).addClass('disable_this_box');
						
						vpb_security_check_points();
					},  
					success: function(response)
					{
						//alert(response);
						var response_brought = response.indexOf('process_completed');
						if( response_brought !=- 1 )
						{
							var v_data = response.split('&');
							var id = v_data[1];
							vpb_add_photos_to_comment(parseInt(id), parseInt(post_id));
						}
						else
						{
							$("#vpb_comment_bottom_icons_"+parseInt(post_id)).show();
							$("#vpb_display_comment_loading_"+parseInt(post_id)).html('');
							$("#vpb_comment_loading_"+parseInt(post_id)).hide();
							
							$("#vpb_comment_box_"+parseInt(post_id)).removeClass('disable_this_box');
							$("#vpb_comment_box_"+parseInt(post_id)).addClass('enable_this_box');
							
							$("#v-wall-message").html(response); 
							$("#v-wall-alert-box").click();
							return false;
						}
					}
				}).fail(function(error_response) 
				{
					setTimeout("vpb_submit_comment('"+vpb_evnts+"', '"+comment+"', '"+parseInt(post_id)+"');", 10000);
				});
			}
		}
	}
}

//Add Image File to Comment
function vpb_add_photos_to_comment(id, post_id)
{
	var username = $("#session_uid").val();
	
	if(parseInt(id) == "" || parseInt(post_id) == "" || username == "") 
	{
		$("#vpb_comment_bottom_icons_"+parseInt(post_id)).show();
		$("#vpb_display_comment_loading_"+parseInt(post_id)).html('');
		$("#vpb_comment_loading_"+parseInt(post_id)).hide();
		
		$("#vpb_comment_box_"+parseInt(post_id)).removeClass('disable_this_box');
		$("#vpb_comment_box_"+parseInt(post_id)).addClass('enable_this_box');
		
		$("#v-wall-message").html($("#general_system_error").val()); 
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		//Proceed now because a user has selected some files
		var vpb_files = document.getElementById('comment_photo_'+parseInt(post_id)).files;
		
		// Create a formdata object and append the files
		var vpb_data = new FormData();
		
		$.each(vpb_files, function(keys, values)
		{
			vpb_data.append(keys, values);
		});
		vpb_data.append("id", id);
		vpb_data.append("username", username);
		vpb_data.append("page", 'vpb_final_comment_update_submission');
	
	
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: vpb_data,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function() {},
			success: function(response)
			{
				$("#vpb_comment_box_"+parseInt(post_id)).removeClass('disable_this_box');
				$("#vpb_comment_box_"+parseInt(post_id)).addClass('enable_this_box');
				
				$("#vpb_comment_bottom_icons_"+parseInt(post_id)).show();
				$("#vpb_display_comment_loading_"+parseInt(post_id)).html('');
				$("#vpb_comment_loading_"+parseInt(post_id)).hide();
				$("#remove_comment_photo_"+parseInt(post_id)).hide();
					
				var response_brought = response.indexOf('post_no_found');
				if(response_brought != -1)
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
				else
				{
					$("#comment_photo_"+parseInt(post_id)).val('');
					$("#vpb_wall_comment_data_"+parseInt(post_id)).val('').change();
					
					$("#vpb_comment_updated_"+parseInt(post_id)).append(
						$(response).hide().fadeIn('slow')
					);
					
					$('html, body').animate({
						scrollTop: $("#vpb_comment_id_"+parseInt(id)).offset().top-parseInt(130)+'px'
					}, 1600, 'easeInOutExpo');
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_add_photos_to_comment('"+parseInt(id)+"', '"+parseInt(post_id)+"');", 10000);
		});		
	}
}


// Show added details when user begins to type his or her post
function vpb_show_added_details()
{
	if(vpb_trim($("#the_tagged_friends").text()) != "")
	{
		$(".v_wall_tag_with").show();
		$("#tagged_list").css('display', 'inline-block');
	}
	else {}
	
	if(vpb_trim($("#the_selected_location").text()) != "")
	{
		$("#user_selected_this_location").css('display', 'inline-block');
	}
	else {}
	
	
	if(vpb_trim($("#vpb_selected_image_num").text()) != "" && parseInt($("#vpb_selected_image_num").text()) > 0)
	{
		$("#url_content_wrapper").css('display', 'inline-block');
	}
	else {}
}

// Update status clicked
function vpb_update_status_clicked()
{
	document.getElementById('vpb_wall_post_data').click();
	document.getElementById('vpb_wall_post_data').focus();
}

// Hide the smiley section and the tagging section before showing add photo or view pop-up
function vpb_hide_other_boxes()
{
	// Hide selected location
	$("#user_selected_this_location").hide();
	
	// Hide the smiley section
	$("#add_smile_button").removeClass('vfooter_wraper_active'); 
	$("#add_smile_button").addClass('vfooter_wraper'); 
	$("#vpb_the_wall_smiley_box").slideUp(); 
	
	// Hide the tagging section
	$("#tag_people_button").removeClass('vfooter_wraper_active'); 
	$("#tag_people_button").addClass('vfooter_wraper'); 
	$("#start_typing_name").css('display', 'none');
	
	// Hide the location section
	$("#add_location_button").removeClass('vfooter_wraper_active'); 
	$("#add_location_button").addClass('vfooter_wraper'); 
	$("#user_is_at_this_location").css('display', 'none');
	
	$("#url_content_wrapper").css('display', 'none');
}
// Set post securit option before post
function vpb_selected_security_option(name, id, lower_case_selected, icon)
{
	var session_uid = $("#session_uid").val();
	
	$("#selected_security_option_").val(lower_case_selected); // Set current security option selected for any new post
	
	var dataString = {'page':'set_selected_security_option', 'name': lower_case_selected, 'session_uid':session_uid};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#selected_option_").html($("#v_loading_btn").val());
		},  
		success: function(response)
		{
			var response_brought = response.indexOf('completed');
			if(response_brought != -1)
			{
				$("#selected_option_with_title").data('original-title', name);
                $("#selected_option_with_title").attr('data-original-title', name);
				$("#selected_option_with_title").attr('title', name);
				$("#selected_option_").html('<i class="fa '+icon+'"></i> '+name+' <span class="caret"></span>');
				$("#v_current_security_setting").val('<i class="fa '+icon+'"></i> '+name+' <span class="caret"></span>');
				$(".vasplus_ticker").hide();
				$("#"+id).show();
			}
			else
			{
				$("#selected_option_").html($("#v_previous_security_setting").val());
				$("#v_current_security_setting").val($("#v_previous_security_setting").val());
				
				$("#v-wall-message").html(response);
				$("#v-wall-alert-box").click();
				return false;
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_selected_security_option('"+name+"', '"+id+"', '"+lower_case_selected+"', '"+icon+"');", 10000);
	});
}


// Add file to comment clicked
function vpb_add_file_to_comment_clicked(post_id)
{
	var name = v_basename($("#comment_photo_"+parseInt(post_id)).val());
	if(vpb_trim(name) != "")
	{
		$("#add_file_clicked_"+parseInt(post_id)).data('original-title', name);
		$("#add_file_clicked_"+parseInt(post_id)).attr('data-original-title', name);
		$("#add_file_clicked_"+parseInt(post_id)).attr('title', name);
	}
	else { return false; }
}

// Add file to reply clicked
function vpb_add_file_to_reply_clicked(comment_id)
{
	var name = v_basename($("#reply_photo_"+parseInt(comment_id)).val());
	if(vpb_trim(name) != "")
	{
		$("#add_reply_file_clicked_"+parseInt(comment_id)).data('original-title', name);
		$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('data-original-title', name);
		$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('title', name);
	}
	else { return false; }
}

// Set post securit option after post
function vpb_selected_security_options(name, id, lower_case_selected, icon, post_id)
{
	var session_uid = $("#session_uid").val();
	
	setTimeout(function() {
		$("#security_settings_"+parseInt(post_id)).removeClass('vpb_wall_post_security_setting_active');
		$("#security_settings_"+parseInt(post_id)).addClass('vpb_wall_post_security_setting');
	},10);
	
	$("#selected_security_option_"+parseInt(post_id)).val(lower_case_selected); // Set current security option selected for any new post
	
	var dataString = {'page':'set_selected_security_options', 'name': lower_case_selected, 'session_uid':session_uid, 'post_id':post_id};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			setTimeout(function() {
				$("#security_settings_"+parseInt(post_id)).removeClass('vpb_wall_post_security_setting_active');
				$("#security_settings_"+parseInt(post_id)).addClass('vpb_wall_post_security_setting');
			},20);
	
			//$("#selected_option_"+parseInt(post_id)).html($("#v_loading_btn").val());
			$("#selected_option_"+parseInt(post_id)).data('original-title', name);
			$("#selected_option_"+parseInt(post_id)).attr('data-original-title', name);
			$("#selected_option_"+parseInt(post_id)).attr('title', name);
			$("#selected_option_"+parseInt(post_id)).html('<i class="fa '+icon+'"></i><!-- '+name+'--> <span class="caret"></span>');
			$("#v_current_security_setting"+parseInt(post_id)).val('<i class="fa '+icon+'"></i><!-- '+name+'--> <span class="caret"></span>');
			$(".vasplus_ticker"+parseInt(post_id)).hide();
			$("#"+id).show();
			
			// Do not show the share button on private posts
			if(lower_case_selected == "private") {
				$("#vpb_status_share_button_"+parseInt(post_id)).hide();
			} else {
				$("#vpb_status_share_button_"+parseInt(post_id)).fadeIn();
			}
		},  
		success: function(response)
		{
			var response_brought = response.indexOf('completed');
			if(response_brought != -1)
			{
				$("#selected_option_"+parseInt(post_id)).data('original-title', name);
                $("#selected_option_"+parseInt(post_id)).attr('data-original-title', name);
				$("#selected_option_"+parseInt(post_id)).attr('title', name);
				$("#selected_option_"+parseInt(post_id)).html('<i class="fa '+icon+'"></i><!-- '+name+'--> <span class="caret"></span>');
				$("#v_current_security_setting"+parseInt(post_id)).val('<i class="fa '+icon+'"></i><!-- '+name+'--> <span class="caret"></span>');
				$(".vasplus_ticker"+parseInt(post_id)).hide();
				$("#"+id).show();
			}
			else
			{
				$("#selected_option_"+parseInt(post_id)).html($("#v_previous_security_setting"+parseInt(post_id)).val());
				$("#v_current_security_setting"+parseInt(post_id)).val($("#v_previous_security_setting"+parseInt(post_id)).val());
				
				$("#v-wall-message").html(response);
				$("#v-wall-alert-box").click();
				return false;
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_selected_security_options('"+name+"', '"+id+"', '"+lower_case_selected+"', '"+icon+"', '"+parseInt(post_id)+"');", 10000);
	});
}

// Remove Fetched Link
function vpb_remove_fetched_link() 
{
	var session_uid = $("#session_uid").val();
	$("#url_content_wrapper").hide();
	$('#vpb_link_to_fetch').val('');
	$("#fetched_url_content").html('');
	$("#add_a_photo_button").show();
	$("#add_a_video_button").show();
	
	var dataString = {'page':'remove_fetched_link', 'session_uid': session_uid};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() {},  
		success: function(response) {}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_remove_fetched_link();", 10000);
	});
}

// Load and display tagged friends
function vpb_load_tagged_friends(post_id, username, session_username, label) 
{
	var dataString = {'page':'load_tagged_friends', 'post_id': post_id, 'username': username, 'session_username': session_username};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#vpb_system_data_title").html(label);
			$("#vpb_display_wall_gen_data").html($("#v_loading_btn").val());
			$("#v-wall-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_wall_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_tagged_friends('"+parseInt(post_id)+"', '"+username+"', '"+session_username+"', '"+label+"');", 10000);
	});
}

// Load and display post likes
function vpb_load_post_likes(post_id, username, label) 
{
	var dataString = {'page':'load_people_who_liked_post', 'post_id': post_id, 'username': username, 'type': label};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			vpb_load_post_like_icons(post_id, username, label, 'manual');
			
			$("#vpb_display_like_gen_data").html('<br clear="all" />'+$("#v_loading_btn").val());
			$("#v-like-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_like_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_post_likes('"+parseInt(post_id)+"', '"+username+"', '"+label+"');", 10000);
	});
}
function vpb_auto_load_post_likes(post_id, username, label) 
{
	var dataString = {'page':'load_people_who_liked_post', 'post_id': post_id, 'username': username, 'type': label};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			vpb_load_post_like_icons(post_id, username, label, 'auto');
			
			$("#vpb_display_like_gen_data").html('<br clear="all" />'+$("#v_loading_btn").val());
		},  
		success: function(response)
		{
			$("#vpb_display_like_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_auto_load_post_likes('"+parseInt(post_id)+"', '"+username+"', '"+label+"');", 10000);
	});
}
function vpb_load_post_like_icons(post_id, username, selected, type) 
{
	var dataStringA = {'page':'load_liked_icons', 'post_id': post_id, 'username': username, 'selected': selected};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataStringA,
		beforeSend: function() 
		{
			if(type == "auto") {}
			else {
				$("#vpb_system_like_title").html($("#v_loading_btn").val());
			}
		},  
		success: function(response)
		{
			$("#vpb_system_like_title").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_post_like_icons('"+parseInt(post_id)+"', '"+username+"', '"+selected+"', '"+type+"');", 10000);
	});
}

// Load and display comment likes
function vpb_load_comment_likes(comment_id, username, label) 
{
	var dataString = {'page':'load_people_who_liked_comment', 'comment_id': comment_id, 'username': username};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#vpb_system_data_title").html(label);
			$("#vpb_display_wall_gen_data").html($("#v_loading_btn").val());
			$("#v-wall-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_wall_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_comment_likes('"+parseInt(comment_id)+"', '"+username+"', '"+label+"');", 10000);
	});
}


// Load and display reply likes
function vpb_load_reply_likes(reply_id, username, label) 
{
	var dataString = {'page':'load_people_who_liked_reply', 'reply_id': reply_id, 'username': username};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#vpb_system_data_title").html(label);
			$("#vpb_display_wall_gen_data").html($("#v_loading_btn").val());
			$("#v-wall-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_wall_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_comment_likes('"+parseInt(reply_id)+"', '"+username+"', '"+label+"');", 10000);
	});
}


// Remove user from tagged post
function vpb_remove_me_from_tagged_post(post_id, poster_username, username) 
{
	var dataString = {'page':'remove_me_from_tagged_post', 'post_id': post_id, 'poster_username': poster_username, 'username': username};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#post_remove_tag_button_"+parseInt(post_id)).hide();
			$("#the_tagged_box_"+parseInt(post_id)).html($("#v_loading_btn").val());
		},  
		success: function(response)
		{
			var response_brought = response.indexOf('none_found');
			if(response_brought != -1) { $("#the_tagged_box_"+parseInt(post_id)).html(''); $("#post_remove_tag_button_"+parseInt(post_id)).show(); }
			else {
				$("#the_tagged_box_"+parseInt(post_id)).html(response);
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_remove_me_from_tagged_post('"+parseInt(post_id)+"', '"+username+"');", 10000);
	});
}


// Preview File(s)
function vpb_profile_photo_preview(vpb_selector_) 
{
	var id = 1, last_id = last_cid = '';
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				document.getElementById('profile_pics').title = '';
				document.getElementById('profile_pic').value = '';
				$('#vpb_adding_profile_photo_status').html('<div class="vwarning">'+$("#invalid_file_attachment").val()+'</div>');
				return false;
			}
			else
			{
				//Clear previous previewed files and start again
				$('#vpb_adding_profile_photo_status').html('');
			   $('#vpb-display-profile-photo-preview').html(''); 
			   var reader = new FileReader();
			   reader.onload = function(e) 
			   {
				   $('#vpb-display-profile-photo-preview').append(
				   '<div class="vpb_preview_wrapper"> \
				   <img class="vpb_image_style" src="' + e.target.result + '" title="'+ escape(file.name) +'" onClick="vpb_view_this_image(\'Photo Preview\', \''+e.target.result+'\');" style="cursor:pointer;" /><br /> \
				   </div>');
			   }
			   reader.readAsDataURL(file);
		   }
		}
		else {  return false; }
	});
}


// Preview File(s)
function vpb_image_preview(vpb_selector_, info, prev_label) 
{
	var id = 1, last_id = last_cid = '';
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				// Invalid file added
			}
			else
			{
				$('#vpb-display-attachment-preview').html('<br><div class="alert alert-warning" style="text-align:left;">'+info+'</div><br>');
				$('#vpb_photos').html('');
				
			    var reader = new FileReader();
			    reader.onload = function(e) 
			    {
				   $('#vpb-display-attachment-preview').append('\
					  <div class="col-xs-6 col-md-3 vasplus-tooltip-attached" title="Click to enlarge '+ escape(file.name) +'">\
						<a class="thumbnail" onClick="vpb_view_this_image(\''+prev_label+'\', \''+e.target.result+'\');">\
						  <img src="' + e.target.result + '" />\
						</a>\
					  </div>');
			   }
			   reader.readAsDataURL(file);
			   
			   var fileLabel = parseInt(id) > 1 ? ' files selected' : ' file selected';
			   document.getElementById('browsedPhotos').title = parseInt(id) +fileLabel;
			   id++;
		   }
		}
		else {  return false; }
	});
}

// Preview Reply photo
function vpb_reply_image_preview(vpb_selector_, info, prev_label, comment_id) 
{
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				$("#v-wall-message").html($("#invalid_file_attachment").val());
				$("#v-wall-alert-box").click();
				return false;
			}
			else
			{
				$(".reply_smiley_dropdown_menu").hide();
				$(".vpb_reply_smiley_buttons").show();
				
			    var reader = new FileReader();
			    reader.onload = function(e) 
			    {
				   $('#vpb-display-reply-attachment-preview_'+parseInt(comment_id)).html('\
					  <div class="vpb_photos_wrapper_medium vasplus-tooltip-attached" title="Click to enlarge '+ escape(file.name) +'">\
						<a class="v_photo_holders" onClick="vpb_view_this_image(\''+prev_label+'\', \''+e.target.result+'\');">\
						  <img src="' + e.target.result + '" />\
						</a>\
					  </div>');
					  $('#vpb_preview_reply_photo_'+parseInt(comment_id)).fadeIn();
					  $('#remove_reply_photo_'+parseInt(comment_id)).fadeIn();
			   }
			   reader.readAsDataURL(file);
		   }
		   $('#vpb_wall_reply_data_'+parseInt(comment_id)).focus();
		}
		else {  return false; }
	});
}



// Preview File(s)
function vpb_comment_image_preview(vpb_selector_, info, prev_label, post_id) 
{
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				$("#v-wall-message").html($("#invalid_file_attachment").val());
				$("#v-wall-alert-box").click();
				return false;
			}
			else
			{
				$(".comment_smiley_dropdown_menu").hide();
				$(".vpb_smiley_buttons").show();
				
			    var reader = new FileReader();
			    reader.onload = function(e) 
			    {
				   $('#vpb-display-comment-attachment-preview_'+parseInt(post_id)).html('\
					  <div class="vpb_photos_wrapper_medium vasplus-tooltip-attached" title="Click to enlarge '+ escape(file.name) +'">\
						<a class="v_photo_holders" onClick="vpb_view_this_image(\''+prev_label+'\', \''+e.target.result+'\');">\
						  <img src="' + e.target.result + '" />\
						</a>\
					  </div>');
					  $('#vpb_preview_comment_photo_'+parseInt(post_id)).fadeIn();
					  $('#remove_comment_photo_'+parseInt(post_id)).fadeIn();
			   }
			   reader.readAsDataURL(file);
		   }
		   $('#vpb_wall_comment_data_'+parseInt(post_id)).focus();
		}
		else {  return false; }
	});
}

// Remove comment photo before commenting
function remove_comment_photo(post_id) 
{
	$('#remove_comment_photo_'+parseInt(post_id)).hide();
	$('#comment_photo_'+parseInt(post_id)).val('');
	$('#vpb-display-comment-attachment-preview_'+parseInt(post_id)).html('');
	$('#vpb_preview_comment_photo_'+parseInt(post_id)).fadeOut();
	$("#add_file_clicked_"+parseInt(post_id)).data('original-title', 'Attach a photo');
	$("#add_file_clicked_"+parseInt(post_id)).attr('data-original-title', 'Attach a photo');
	$("#add_file_clicked_"+parseInt(post_id)).attr('title', 'Attach a photo');
}

// Remove comment photo before commenting
function remove_reply_photo(comment_id) 
{
	$('#remove_reply_photo_'+parseInt(comment_id)).hide();
	$('#reply_photo_'+parseInt(comment_id)).val('');
	$('#vpb-display-reply-attachment-preview_'+parseInt(comment_id)).html('');
	$('#vpb_preview_reply_photo_'+parseInt(comment_id)).fadeOut();
	$("#add_reply_file_clicked_"+parseInt(comment_id)).data('original-title', 'Attach a photo');
	$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('data-original-title', 'Attach a photo');
	$("#add_reply_file_clicked_"+parseInt(comment_id)).attr('title', 'Attach a photo');
}


// Continue with the added photos to post
function vpb_continue_image_preview(vpb_selector_, info, prev_label) 
{
	var cid = 1, last_id = last_cid = '';
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				// Invalid file added
			}
			else
			{
				$('#vpb-display-attachment-preview').html('');
				$('#vpb_photos').html('');
				$("#all_added_photos_button").hide();
				$("#part_added_photos_button").hide();
				$("#vpb_added_photos").show();
				$("#add_a_video_button").hide();
				
			   var reader = new FileReader();
			   reader.onload = function(e) 
			   {
					if(parseInt(cid) > 4)
					{
					  $('#vpb_photos').append('\
					  <div class="col-xs-6 col-md-3 v-hidden-photos vasplus-tooltip-attached" title="Click to enlarge '+ escape(file.name) +'">\
						<a class="thumbnail" onClick="vpb_view_this_image(\''+prev_label+'\', \''+e.target.result+'\');">\
						  <img src="' + e.target.result + '" />\
						</a>\
					  </div>');
					  $("#all_added_photos_button").fadeIn();
					}
					else
					{
					   $('#vpb_photos').append('\
					  <div class="col-xs-6 col-md-3 vasplus-tooltip-attached" title="Click to enlarge '+ escape(file.name) +'">\
						<a class="thumbnail" onClick="vpb_view_this_image(\''+prev_label+'\', \''+e.target.result+'\');">\
						  <img src="' + e.target.result + '" />\
						</a>\
					  </div>');
					}
					cid++;
			   }
			   reader.readAsDataURL(file);
		   }
		}
		else {  return false; }
	});
}
// Show all added photos
function vpb_show_added_photos()
{
	$(".v-hidden-photos").slideDown();
	$("#all_added_photos_button").hide();
	$("#part_added_photos_button").fadeIn();
}

// Hide part of the added photos
function vpb_hide_part_added_photos()
{
	$(".v-hidden-photos").slideUp();
	$("#part_added_photos_button").hide();
	$("#all_added_photos_button").fadeIn();
}

// Photo enlargement 
function vpb_view_this_image(title, photo)
{
	$("#photo_viewer_box_title").html(title);
	$("#photo_viewed_contents").html('<img class="vpb_image_style" style="max-width:440px !important; width:100%;height:auto;margin:0 auto;" src="'+photo+'" />');
	$('#vpb_photo_viewer_display_box').modal('show');
	
}

// Fetch YouTube or Vimeo video via URL
function vpb_fetch_video()
{
	var session_uid = $("#session_uid").val();
	var video_url = $("#add_video_url").val();
	var page_identifier = $("#vpb_page_identifier").val();
	
	if(video_url == "" || page_identifier == "")
	{
		$("#vpb-display-video").html('');
		$("#v-wall-message").html($("#no_video_link_message").val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else
	{
		var dataString = {'page':'fetch_video_via_url', 'video_url': video_url, 'session_uid':session_uid, 'page_identifier': page_identifier};
		$.ajax({  
			type: "POST",  
			url: vpb_site_url+'wall-processor.php',  
			data: dataString,
			beforeSend: function() 
			{
				$("#vpb-display-video").html($("#v_loading_btn").val());
				//return false;
			},  
			success: function(response)
			{
				var response_brought = response.indexOf('completed');
				if(response_brought != -1)
				{
					$("#add_a_photo_button").hide();
					var response_data = response.split('&');
					var video_id = response_data[0];
					var video_type = response_data[1];
					
					$("#add_video_url").val('');
					$("#added_video_url").val(response);
					
					if(video_type == "youtube")
					{
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="https://www.youtube.com/embed/'+video_id+'"></iframe>\
						</div>');
					}
					else if(video_type == "vimeo")
					{
						var response_sub_data = video_id.split('|');
						var video_uid = response_sub_data[0];
						var video_option = response_sub_data[1];
						//alert(response+' - ID = '+video_uid+' - Option = '+video_option);
						
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="https://player.vimeo.com/video/'+video_uid+'"></iframe>\
						</div>');
					}
					else if(video_type == "metacafe")
					{
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="http://www.metacafe.com/embed/'+video_id+'"></iframe>\
						</div>');
					}
					else if(video_type == "dailymotion")
					{
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="//www.dailymotion.com/embed/video/'+video_id+'"></iframe>\
						</div>');
					}
					else if(video_type == "flickr")
					{
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="http://www.flickr.com/apps/video/stewart.swf?photo_id='+video_id+'"></iframe>\
						</div>');
					}
					else if(video_type == "myspace")
					{
						$("#vpb-display-video").html('<div class="embed-responsive embed-responsive-16by9">\
						  <iframe allowfullscreen class="embed-responsive-item" src="//media.myspace.com/play/video/'+video_id+'"></iframe>\
						</div>');
					}
					else
					{
						// Unconfirmed
						$("#add_video_url").val('');
						$("#vpb-display-video").html('');
						$("#vpb_video").html('');
						$("#vpb_added_videos").hide();
						$("#close_video_popup_button").click();
						
						var Regex_url = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
						var url_realised = video_url.match(Regex_url);
						
						if(vpb_getcookie('this_url_has_already_been_fetched') == "")
						{
							var url_session = "no_session_established_yet";
						}
						else
						{
							var url_session = vpb_getcookie('this_url_has_already_been_fetched');
						}
						
						if(url_realised.length>0 && url_session != url_realised)
						{
							if($('#add_photos').val() != "") { return false; }
							
							$("#add_a_video_button").hide();
							
							$("#url_content_wrapper").show();
							$('#vpb_link_to_fetch').val(url_realised);
							vpb_setcookie('this_url_has_already_been_fetched', url_realised, 90);
							$("#fetched_url_content").html($("#v_loading_btn").val());
							vpb_fetch_url_contents('auto');
						}
						else { return false; }
					}
				}
				else
				{
					$("#vpb-display-video").html('');
					
					$("#v-wall-message").html(response);
					$("#v-wall-alert-box").click();
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_fetch_video();", 10000);
		});
	}
}

// Continue with the fetched video to post
function vpb_continue_with_video() 
{
	var video_data = $("#added_video_url").val();
	
	var response_data = video_data.split('&');
	var video_id = response_data[0];
	var video_type = response_data[1];
	
	if(video_type == "youtube")
	{
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="https://www.youtube.com/embed/'+video_id+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else if(video_type == "vimeo")
	{
		var response_sub_data = video_id.split('|');
		var video_uid = response_sub_data[0];
		var video_option = response_sub_data[1];
						
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="https://player.vimeo.com/video/'+video_uid+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else if(video_type == "metacafe")
	{
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="http://www.metacafe.com/embed/'+video_id+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else if(video_type == "dailymotion")
	{
		//alert('ID '+video_id+' FINALLY: '+video_data);
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="//www.dailymotion.com/embed/video/'+video_id+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else if(video_type == "flickr")
	{
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="http://www.flickr.com/apps/video/stewart.swf?photo_id='+video_id+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else if(video_type == "myspace")
	{
		$("#vpb_video").html('<div class="embed-responsive embed-responsive-16by9">\
		  <iframe allowfullscreen class="embed-responsive-item" src="//media.myspace.com/play/video/'+video_id+'"></iframe>\
		</div>');
		
		document.getElementById('add_video_url').value='';
		document.getElementById('vpb-display-video').innerHTML='';
		$("#vpb_added_videos").slideDown();
	}
	else {}
}


// Suggest friends to tag
function vpb_friends_suggestion(friend)
{
	var session_uid = $("#session_uid").val();
	
	if(friend.length > 0)
	{
		$("#vpb-location-server-response").html('');
		
		$("#vpb-tagged-people-in-post-server-response").html('<div class="dropdown"><ul class="dropdown-menu vpb-hundred-percent_loading" style="top:auto;"><li class="dropdown-header vpb_wall_loading_text">'+$("#v_loading_btn").val()+'</li></ul></div>');
		
		
		var dataString = {'friend':friend, 'username':session_uid, 'page':'tag_people_in_post'};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$("#vpb-tagged-people-in-post-server-response").html('<div class="dropdown"><ul class="dropdown-menu vpb-hundred-percent_loading" style="top:auto;"><li class="dropdown-header vpb_wall_loading_text">'+response.replace('VPB: ', '')+'</li></ul></div>');
				
				setTimeout(function() {
					//$("#vpb-tagged-people-in-post-server-response").html('');
				},1000);
			}
			else
			{
				if(response == "")
				{
					$("#vpb-tagged-people-in-post-server-response").html('');
				}
				else
				{
					$("#vpb-tagged-people-in-post-server-response").html('<div class="dropdown"><ul class="dropdown-menu vpb-hundred-percent" id="tag_people_in_post_suggestion_box" style="top:auto;">'+response+'</ul></div>');
				}
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_friends_suggestion('"+friend+"');", 10000);
		});
	}
	else
	{
		$("#vpb-tagged-people-in-post-server-response").html('');
		return false;
	}
}

// Suggest locations for user who is about to make a post
function vpb_location_suggestions(locationTyped)
{
	var session_uid = $("#session_uid").val();
	
	if(locationTyped.length > 0)
	{
		$("#vpb-tagged-people-in-post-server-response").html('');
		
		$("#vpb-location-server-response").html('<div class="dropdown"><ul class="dropdown-menu vpb-hundred-percent_loading" style="top:auto;"><li class="dropdown-header vpb_wall_loading_text">'+$("#v_loading_btn").val()+'</li></ul></div>');
		
		
		var dataString = {'location':locationTyped, 'username':session_uid, 'page':'location_suggestions'};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$("#vpb-location-server-response").html('');
				setTimeout(function() {
					//$("#vpb-location-server-response").html('');
				},1000);
			}
			else
			{
				if(response == "")
				{
					$("#vpb-location-server-response").html('');
				}
				else
				{
					$("#vpb-location-server-response").html('<div class="dropdown"><ul class="dropdown-menu vpb-hundred-percent v_overflow_this_field" id="location_suggestion_box" style="top:auto;">'+response+'</ul></div>');
				}
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_location_suggestions('"+locationTyped+"');", 10000);
		});
	}
	else
	{
		$("#vpb-location-server-response").html('');
		return false;
	}
}

// Show/Hide tag people in post box
function vpb_tag_people_in_post()
{
	$("#user_selected_this_location").hide();
	$(".v_wall_tag_with").hide();
	
	if($("#start_typing_name").css('display') == "none")
	{
		// Hide the smiley section before showing the tagging section
		$("#add_smile_button").removeClass('vfooter_wraper_active'); 
		$("#add_smile_button").addClass('vfooter_wraper'); 
		$("#vpb_the_wall_smiley_box").slideUp(); 
		
		// Hide the location section before showing the tagging section
		$("#add_location_button").removeClass('vfooter_wraper_active'); 
		$("#add_location_button").addClass('vfooter_wraper'); 
		$("#user_is_at_this_location").css('display', 'none');
		
		$("#url_content_wrapper").css('display', 'none');
		
		$("#tag_people_button").removeClass('vfooter_wraper'); 
		$("#tag_people_button").addClass('vfooter_wraper_active'); 
		
		$("#start_typing_name").css('display', 'inline-block');
		$("#vpb-tag").focus();
		
		// If there are already tagged friends in the list, show them when the user is about to make new tags
		if(vpb_trim($("#the_tagged_friends").text()) != "")
		{
			$("#tagged_list").css('display', 'inline-block');
		}
		else {}
	}
	else
	{
		$("#vpb-tag").val('');
		$("#tag_people_button").removeClass('vfooter_wraper_active'); 
		$("#tag_people_button").addClass('vfooter_wraper'); 
		$("#start_typing_name").css('display', 'none');
	}
}



// Show/Hide location box
function vpb_wall_location_box(action)
{
	$("#user_selected_this_location").hide();
	$("#tagged_list").hide();
	
	$("#vpb-location").val('');
	
	if(action == "remove")
	{
		$("#vpb-selected-location").val('');
		$("#the_selected_location").html('');
	}
	else {}
	
	if($("#user_is_at_this_location").css('display') == "none")
	{
		// Hide the smiley section before showing the tagging section
		$("#add_smile_button").removeClass('vfooter_wraper_active'); 
		$("#add_smile_button").addClass('vfooter_wraper'); 
		$("#vpb_the_wall_smiley_box").slideUp(); 
		
		// Hide the tagging section before showing the tagging section
		$("#tag_people_button").removeClass('vfooter_wraper_active'); 
		$("#tag_people_button").addClass('vfooter_wraper'); 
		$("#start_typing_name").css('display', 'none');
		
		$("#url_content_wrapper").css('display', 'none');
		
		$("#add_location_button").removeClass('vfooter_wraper'); 
		$("#add_location_button").addClass('vfooter_wraper_active'); 
		
		$("#user_is_at_this_location").css('display', 'inline-block');
		$("#vpb-location").focus();
		
	}
	else
	{
		$("#vpb-location").val('');
		$("#add_location_button").removeClass('vfooter_wraper_active'); 
		$("#add_location_button").addClass('vfooter_wraper'); 
		$("#user_is_at_this_location").css('display', 'none');
	}
}

/* Add and Remove Friend From Selected List */
function vpb_tag_this_friend(fullname,username)
{
	$("#vpb-tagged-people-in-post-server-response").html('');
	var session_uid = $("#session_uid").val();
	
	var dataString = {"username": session_uid, "friend": username, "page":"vpb_selected_names_in_tag"};
	$.ajax({
		type: "POST",
		url: vpb_site_url+'wall-processor.php',
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#tagged_list").css('display', 'inline-block');
			$("#new_tags_loading").html($("#v_loading_btn").val());
		},
		success: function(response) 
		{
			var response_brought = response.indexOf('not_tagged');
			if(response_brought != -1)
			{
				$("#new_tags_loading").html('');
				$("#tagged_list").css('display', 'none');
				$("#vpb-tag").val('');
				
				$("#start_typing_name").css('display', 'none');
				$("#tag_people_button").removeClass('vfooter_wraper_active'); 
				$("#tag_people_button").addClass('vfooter_wraper'); 
				
				$("#v-wall-message").html($("#general_system_error").val());
				$("#v-wall-alert-box").click();
				return false;
			}
			else
			{
				//Play sound when tagged successfully
				$('<audio id="vasplusAudio"><source src="'+vpb_site_url+'vpb_sound/shutter.mp3" type="audio/mpeg"></audio>').appendTo('body');
				$('#vasplusAudio')[0].play();
				
				$("#new_tags_loading").html('');
				
				$("#new_tags").fadeIn(2000).append('<span id="added_id_'+username+'"><span id="added_id'+username+'" class="selected_friends_in_tagged_list">'+fullname+' <span class="remove_selected_friends_in_tagged_list" title="Remove" onclick="vpb_comfirm_removal_of_tagged_friend(\''+fullname+'\',\''+username+'\');">x</span></span></span>');
				$("#vpb-tag").val('').focus();
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_tag_this_friend('"+fullname+"','"+username+"');", 10000);
	});
}


/* This function is called when a user clicks on remove friend from tagged list */
function vpb_remove_this_tagged_friend() 
{
	var session_uid = $("#session_uid").val();
	var friend_username = $("#friend-username-to-remove-from-tagged-list").val();
	var friend_fullname = $("#friend-fullname-to-remove-from-tagged-list").val();
	
	var dataString = {"username": session_uid, "friend": friend_username, "page":"remove_this_friend_from_the_tagged_friends_list"};
	
	$.ajax({
		type: "POST",
		url: vpb_site_url+'wall-processor.php',
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#added_id"+friend_username).html($("#v_removing_btn").val());
		},
		success: function(response) 
		{
			
			var response_brought = response.indexOf('no_proper_data');
			if(response_brought != -1)
			{
				setTimeout(function() {
					$("#added_id_"+friend_username).html('<span id="added_id'+friend_username+'" class="selected_friends_in_tagged_list">'+friend_fullname+' <span class="remove_selected_friends_in_tagged_list" title="Remove" onclick="vpb_comfirm_removal_of_tagged_friend(\''+friend_fullname+'\',\''+friend_username+'\');">x</span></span>');
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click();
				},1000);
			}
			else
			{
				var taggedLeft = response.indexOf('stop');
				if ( taggedLeft != -1 ) 
				{
					$('#added_id_'+friend_username).fadeOut('slow').remove();
					$("#tagged_list").css('display', 'none');
					$("#vpb-tag").focus();
				}
				else 
				{
					$('#added_id_'+friend_username).fadeOut('slow').remove();
				}
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_remove_this_tagged_friend();", 10000);
	});
}

// Conform before removing a friend from the tagged list
function vpb_comfirm_removal_of_tagged_friend(fullname, username)
{
	$("#friend-username-to-remove-from-tagged-list").val(username);
	$("#friend-fullname-to-remove-from-tagged-list").val(fullname);
	$("#remove_friend_message").html($("#v_confirmation_message").val()+' <b>'+fullname+'</b>?');
	$("#v-remove-friend-alert-box").click();
}



// Save selected location for posting purpose
function vpb_selected_location(location)
{
	$("#vpb-selected-location").val(location);
	$("#the_selected_location").html(location);
	
	$("#the_selected_location").data('title', location);
    $("#the_selected_location").attr('title', location);
	
	$("#vpb-location-server-response").html('');
	vpb_hide_other_boxes();
	
	if(vpb_trim($("#the_selected_location").text()) != "")
	{
		$("#user_selected_this_location").fadeIn();
		$("#user_selected_this_location").css('display', 'inline-block');
	}
	else {}
}

// Strip_tags
function vpb_strip_tags(input, allowed) 
{
	allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
  	var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
	return input.replace(commentsAndPhpTags, '').replace(tags, function($0, $1) 
	{
		return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
	});
}

//Submit post
function vpb_submit_status_update()
{
	var username = $("#session_uid").val();
	var page_owner = $("#vpb_page_owner").val();
	var post = vpb_trim($("#vpb_wall_post_data").val());
	var location = vpb_trim($("#vpb-selected-location").val()) == "" ? $("#vpb-location").val() : $("#vpb-selected-location").val();
	var privacy_option = $("#selected_security_option_").val();
	var ext = $('#add_photos').val().split('.').pop().toLowerCase();
	var photos = $("#add_photos").val();
	var page_id = $("#page_id").val();
	
	var vpb_selected_image_id = $('#vpb_current_image_id').val();
	if($('img#vasplus_image_id'+parseInt(vpb_selected_image_id)).length > 0) {
		var selected_images_link = $('img#vasplus_image_id'+parseInt(vpb_selected_image_id)).attr('src');
	}
	else { var selected_images_link = ''; }
	
	
	if (username == "" || username == null || username == undefined)
	{
		$("#v-wall-message").html('VPB1: '+$("#general_system_error").val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if (page_owner == "" || page_owner == null || page_owner == undefined)
	{
		$("#v-wall-message").html('VPB2: '+$("#general_system_error").val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if (page_id == "" || page_id == null || page_id == undefined)
	{
		$("#v-wall-message").html('VPB3: '+$("#general_system_error").val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if (post == "" && photos == "" || post == "What\'s on your mind?" && photos == "")
	{
		$("#v-wall-message").html($("#invalid_status_update_field").val());
		$("#v-wall-alert-box").click();
		return false;
	}
	else if(photos != "" && $.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
	{
		$('#vpb_photos').html('');
		$("#vpb_added_photos").fadeOut();
		$("#v-wall-message").html($("#invalid_file_attachment").val()); 
		document.getElementById('add_photos').value = '';
		document.getElementById('browsedPhotos').title = 'No file is chosen';
		$("#v-wall-alert-box").click();
		return false;
	}
	else
	{
		vpb_security_check_point();
		
		var dataString = {"username":username, "page_owner":page_owner, "post":post, "location":location, "privacy_option":privacy_option, "page_id":page_id, "selected_images_link":selected_images_link, "page":"submit-status-update"};
		
	
		$("#vpb_status_update_box").removeClass('enable_this_box');
		$("#vpb_status_update_box").addClass('disable_this_box');
		$("#selected_option_").html($("#v_sending_btn").val());
		
		vpb_security_check_points();
	
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('process_completed');
			if( response_brought !=- 1 )
			{
				var v_data = response.split('&');
				var id = v_data[1];
				vpb_add_photos_to_post(id);
				
				vpb_close_post_box();
			}
			else
			{
				$("#selected_option_").html($("#v_current_security_setting").val());
				$("#vpb_status_update_box").removeClass('disable_this_box');
				$("#vpb_status_update_box").addClass('enable_this_box');
				
				$("#v-wall-message").html(response); 
				$("#v-wall-alert-box").click();
				
				vpb_close_post_box();
				return false;
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_submit_status_update();", 10000);
		});
	}
}

//Post Security settings Options
function vpb_secure_dropdown(id)
{
	$("#security_settings_"+parseInt(id)).removeClass('vpb_wall_post_security_setting');
	$("#security_settings_"+parseInt(id)).addClass('vpb_wall_post_security_setting_active');
}

//Add Image File to Post
function vpb_add_photos_to_post(id)
{
	var username = $("#session_uid").val();
	var vpb_page_identifier = $("#vpb_page_identifier").val();
	
	if(id == "" || username == "" || vpb_page_owner == "") 
	{
		$("#selected_option_").html($("#v_current_security_setting").val());
		$("#vpb_status_update_box").removeClass('disable_this_box');
		$("#vpb_status_update_box").addClass('enable_this_box');
				 
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		//Proceed now because a user has selected some files
		var vpb_files = document.getElementById('add_photos').files;
		
		// Create a formdata object and append the files
		var vpb_data = new FormData();
		
		$.each(vpb_files, function(keys, values)
		{
			vpb_data.append(keys, values);
		});
		vpb_data.append("id", id);
		vpb_data.append("username", username);
		vpb_data.append("page_identifier", vpb_page_identifier);
		vpb_data.append("page", 'vpb_final_status_update_submission');
	
	
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: vpb_data,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function() {},
			success: function(response)
			{
				$("#selected_option_").html($("#v_current_security_setting").val());
				$("#vpb_status_update_box").removeClass('disable_this_box');
				$("#vpb_status_update_box").addClass('enable_this_box');
					
				var response_brought = response.indexOf('post_no_found');
				if(response_brought != -1)
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
				else
				{
					$("#add_a_photo_button").show();
					$("#add_a_video_button").show();
			
					
					$("#vpb_wall_post_data").val('').val('').change();
					
					vpb_hide_other_boxes();
					
					document.getElementById('add_video_url').value='';
					document.getElementById('vpb-display-video').innerHTML='';
					$("#added_video_url").val(''); 
					$("#vpb_video").html('');
					$("#vpb_added_videos").slideUp();
					
					$("#url_content_wrapper").hide();
					$('#vpb_link_to_fetch').val('');
					$("#fetched_url_content").html('');
					
					
					$('#vpb-display-attachment-preview').html('');
					$('#vpb_photos').html('');
					$('#add_photos').val('');
					$("#vpb_added_photos").hide();
					
					// Location Section
					$("#vpb-location").val('');
					$("#vpb-selected-location").val('');
					$("#the_selected_location").html('');
		
					// Hide the location section before showing the tagging section
					$("#add_location_button").removeClass('vfooter_wraper_active'); 
					$("#add_location_button").addClass('vfooter_wraper'); 
					$("#user_is_at_this_location").css('display', 'none');
					$("#user_selected_this_location").hide();
					
					//Tagging section
					$("#new_tags").html('');
					
					$("#new_tags_loading").html('');
					$("#tagged_list").css('display', 'none');
					$("#vpb-tag").val('');
					
					$("#start_typing_name").css('display', 'none');
					$("#tag_people_button").removeClass('vfooter_wraper_active'); 
					$("#tag_people_button").addClass('vfooter_wraper'); 
					
					 // Remove the white background color class from status updates if there are updates to display
					$("#vasplus_wall_status_updates").removeClass('vmiddle_others');
					
					$("#vpb_status_updated").prepend(
						$(response).hide().fadeIn('slow')
					);
					/*
					$('html, body').animate({
						scrollTop: $("#vpb_wall_wrapper_"+parseInt(id)).offset().top-parseInt(60)+'px'
					}, 1600, 'easeInOutExpo');
					*/
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_add_photos_to_post('"+parseInt(id)+"');", 10000);
		});		
	}
}





//Friendship function
function vpb_friend_ship(id, friend, action)
{
	var username = $("#session_uid").val();
	
	if(id == "" || username == "") 
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		var unknow_request = 0;
		if(action == "addfriend")
		{
			$("#addfriend_"+parseInt(id)).hide();
			$("#requestsent_"+parseInt(id)).show();
			$("#cancelrequest_"+parseInt(id)).show();
		}
		else if(action == "cancelrequest")
		{
			$("#requestsent_"+parseInt(id)).hide();
			$("#cancelrequest_"+parseInt(id)).hide();
			$("#addfriend_"+parseInt(id)).show();
		}
		else if(action == "unfriend")
		{
			$("#unfriend_"+parseInt(id)).hide();
			$("#addfriend_"+parseInt(id)).show();
		}
		else if(action == "reject")
		{
			$("#reject_"+parseInt(id)).hide();
			$("#accept_"+parseInt(id)).hide();
			$("#addfriend_"+parseInt(id)).show();
		}
		else if(action == "accept")
		{
			$("#reject_"+parseInt(id)).hide();
			$("#accept_"+parseInt(id)).hide();
			$("#unfriend_"+parseInt(id)).show();
		}
		else
		{
			unknow_request = 1
		}
		
		if(parseInt(unknow_request) == 1)
		{
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else
		{
			var dataString = {"username":username, "friend":friend, "action":action, "page":"friend-ship-update"};
		
			$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
			{
				//alert(username+' '+friend+' '+action+' '+response);
		
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 ) {}
				else
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
				vpb_load_chat_friends_box('auto');
			}).fail(function(error_response) 
			{
				setTimeout("vpb_friend_ship('"+parseInt(id)+"', '"+friend+"', '"+action+"');", 10000);
			});
		}
	}
}

var completedCalled = false;

//Like POST Box
function vpb_like_box(username, post_id, type)
{
	if(!completedCalled)
	{
		completedCalled = true;
		if( username == "" || post_id == "" )
		{
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else
		{
			$(".vpb_likesBox").hide();
			var labelType;
			
			var dataString = {"username":username, "post_id":post_id, "type":type, "page":"like-box-update"};
			
			vpb_security_check_points();
		
			$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
			{
				var response_brought = response.indexOf('general_system_error');
				if( response_brought !=- 1 ) 
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
				else 
				{
					var response_brought_b = response.indexOf('d-user-has-unliked');
					if( response_brought_b !=- 1 ) 
					{
						labelType = '<span class="vpb_liked" onclick="vpb_like_box(\''+username+'\', \''+parseInt(post_id)+'\', \'Like\');">\
							<i class="fa fa-thumbs-o-up like_icon" style="font-size:16px;"></i> <span class="like_text">Like</span>\
						</span>';
					}
					else 
					{
						labelType = '<span class="vpb_d_like_status" onclick="vpb_like_box(\''+username+'\', \''+parseInt(post_id)+'\', \''+type+'\');">\
							<i class="'+type.toLowerCase()+'Icon_c"></i> <span class="vpb_'+type+'Status like_text">'+type+'</span>\
						</span>';
					}
					
					$("#vpb_like"+parseInt(post_id)).html(labelType);
					
					if(response == "Be the first to like this")
					{
						$("#vpb_total_likes_"+parseInt(post_id)).html(response);
						$("#vpb_like_wrapper_"+parseInt(post_id)).fadeOut();
					}
					else
					{
						$("#vpb_total_likes_"+parseInt(post_id)).html(response);
						$("#vpb_like_wrapper_"+parseInt(post_id)).fadeIn();
					}
					completedCalled = false;
					return false;
				}
			}).fail(function(error_response) 
			{
				setTimeout("vpb_like_box('"+username+"', '"+parseInt(post_id)+"', '"+type+"');", 10000);
			});
		}
	}
	else 
	{
		completedCalled = false;
		$("#v-wall-message").html($("#vchat_bg_process_running_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
}

//Like COMMENT Box
function vpb_popup_photo_box(post_id, total, current, first_photo_link)
{
	$(".vholder").html('<img src="'+first_photo_link+'">');
	$("#current_status_id").val(parseInt(post_id));
	$("#total_photos_to_scroll").val(parseInt(total));
	$("#current_scrolled_photo").val(parseInt(current));
	
	$("#vp_curnt").html(parseInt(current));
	$("#vp_total_phtos").html(parseInt(total));
	if(parseInt(current) == 1 && parseInt(total) == 1){
		$("#vp_photo_scrol_counter").hide();
	} else {
		$("#vp_photo_scrol_counter").fadeIn(2000);
	}
	//$("#_popupText").html('Post ID: '+post_id+' Total: '+total+' Current: '+current+' Link: '+first_photo_link);
	
	if(parseInt(current) == 1 && parseInt(total) > 1 && parseInt(current) != parseInt(total))
	{
		$("#vpb_left_b").hide();
		$("#vpb_left_a").show();
		
		$("#vpb_right_a").hide();
		$("#vpb_right_b").show();
	}
	else if(parseInt(current) == 1 && parseInt(total) == 1)
	{
		$("#vpb_left_b").hide();
		$("#vpb_left_a").show();
		
		$("#vpb_right_b").hide();
		$("#vpb_right_a").show();
	}
	else
	{
		$("#vpb_left_a").hide();
		$("#vpb_left_b").show();
		
		if(parseInt(current) == parseInt(total))
		{
			$("#vpb_right_b").hide();
			$("#vpb_right_a").show();
		}
		else
		{
			$("#vpb_right_a").hide();
			$("#vpb_right_b").show();
		}
	}
	$("#vpb_clicked_enlarge_photos").click();
}
// Scroll to the new photo in photo enlargement
function vpb_scroll_popup_photo_next()
{
	var post_id = $("#current_status_id").val();
	var total = $("#total_photos_to_scroll").val();
	var current = $("#current_scrolled_photo").val();
	
	if( parseInt(current) <= parseInt(total) )
	{
		var current_now = parseInt(current) == parseInt(total) ? parseInt(total) : parseInt(current)+1;
		
		var photo_link = $("#hidden_photo_link_"+parseInt(post_id)+"_"+parseInt(current_now)).val();
		$(".vholder").html('<img src="'+photo_link+'">');
		
		$("#current_scrolled_photo").val(parseInt(current_now));
		$("#vp_curnt").html(parseInt(current_now));
		
		var current = $("#current_scrolled_photo").val();
		
		//$("#_popupText").html('Post ID: '+post_id+' Total: '+total+' Current: '+current+' Link: '+photo_link);
		
		if(parseInt(current) == parseInt(total))
		{
			$("#vpb_right_b").hide();
			$("#vpb_right_a").show();
		}
		else
		{
			$("#vpb_right_a").hide();
			$("#vpb_right_b").show();
		}
	}
	else {}
	
	var current = $("#current_scrolled_photo").val();
	
	if(parseInt(current) == 1)
	{
		$("#vpb_left_b").hide();
		$("#vpb_left_a").show();
	}
	else if(parseInt(current) > 1)
	{
		$("#vpb_left_a").hide();
		$("#vpb_left_b").show();
	}
	else {}
}

// Scroll to the prev photo in photo enlargement
function vpb_scroll_popup_photo_prev()
{
	var post_id = $("#current_status_id").val();
	var total = $("#total_photos_to_scroll").val();
	var current = $("#current_scrolled_photo").val();
	
	if( parseInt(current) > 1 )
	{
		var current_now = parseInt(current) == 1 ? 1 : parseInt(current)-1;
		
		var photo_link = $("#hidden_photo_link_"+parseInt(post_id)+"_"+parseInt(current_now)).val();
		$(".vholder").html('<img src="'+photo_link+'">');
		
		$("#current_scrolled_photo").val(parseInt(current_now));
		$("#vp_curnt").html(parseInt(current_now));
		
		var current = $("#current_scrolled_photo").val();
		
		if(parseInt(current) < parseInt(total))
		{
			$("#vpb_right_a").hide();
			$("#vpb_right_b").show();
		}
		else
		{
			$("#vpb_right_b").hide();
			$("#vpb_right_a").show();
		}
	}
	else 
	{
		$("#vpb_left_b").hide();
		$("#vpb_left_a").show();
	}
	
	var current = $("#current_scrolled_photo").val();
	
	if(parseInt(current) == 1)
	{
		$("#vpb_left_b").hide();
		$("#vpb_left_a").show();
	}
	else if(parseInt(current) > 1)
	{
		$("#vpb_left_a").hide();
		$("#vpb_left_b").show();
	}
	else {}
}

//Like COMMENT Box
function vpb_like_comment_box(username, comment_id, action)
{
	if( username == "" || comment_id == "" )
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		if(action == "like")
		{
			$("#like_"+parseInt(comment_id)).hide();
			$("#unlike_"+parseInt(comment_id)).show();
		}
		else
		{
			$("#unlike_"+parseInt(comment_id)).hide();
			$("#like_"+parseInt(comment_id)).show();
		}
		var dataString = {"username":username, "comment_id":comment_id, "page":"like-comment-update"};
		
		vpb_security_check_points();
	
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('general_system_error');
			if( response_brought !=- 1 ) 
			{
				$("#v-wall-message").html($("#general_system_error").val());
				$("#v-wall-alert-box").click(); 
				return false;
			}
			else 
			{
				if(response == 0)
				{
					$("#vpb_total_clikes_"+parseInt(comment_id)).html(response);
					$("#vpb_clike_wrapper_"+parseInt(comment_id)).fadeOut();
				}
				else
				{
					$("#vpb_total_clikes_"+parseInt(comment_id)).html(response);
					$("#vpb_clike_wrapper_"+parseInt(comment_id)).fadeIn();
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_like_comment_box('"+username+"', '"+parseInt(comment_id)+"');", 10000);
		});
	}
}


//Like COMMENT Box
function vpb_like_reply_box(username, reply_id, action)
{
	if( username == "" || reply_id == "" )
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		if(action == "like")
		{
			$("#rlike_"+parseInt(reply_id)).hide();
			$("#runlike_"+parseInt(reply_id)).show();
		}
		else
		{
			$("#runlike_"+parseInt(reply_id)).hide();
			$("#rlike_"+parseInt(reply_id)).show();
		}
		var dataString = {"username":username, "reply_id":reply_id, "page":"like-reply-update"};
		
		vpb_security_check_points();
	
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('general_system_error');
			if( response_brought !=- 1 ) 
			{
				$("#v-wall-message").html($("#general_system_error").val());
				$("#v-wall-alert-box").click(); 
				return false;
			}
			else 
			{
				if(response == 0)
				{
					$("#vpb_total_rlikes_"+parseInt(reply_id)).html(response);
					$("#vpb_rlike_wrapper_"+parseInt(reply_id)).fadeOut();
				}
				else
				{
					$("#vpb_total_rlikes_"+parseInt(reply_id)).html(response);
					$("#vpb_rlike_wrapper_"+parseInt(reply_id)).fadeIn();
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_like_reply_box('"+username+"', '"+parseInt(reply_id)+"');", 10000);
		});
	}
}

// Show full post, comment or reply
function vpb_show_full_item(id, type)
{
	if(type == "post")
	{
		$("#post_box_a_"+parseInt(id)).hide();
		$("#post_box_b_"+parseInt(id)).show();
		$('html, body').animate({
			scrollTop: $("#post_box_b_"+parseInt(id)).offset().top-parseInt(160)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else if(type == "comment")
	{
		$("#comment_box_a_"+parseInt(id)).hide();
		$("#comment_box_b_"+parseInt(id)).show();
		$('html, body').animate({
			scrollTop: $("#comment_box_b_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else
	{
		$("#reply_box_a_"+parseInt(id)).hide();
		$("#reply_box_b_"+parseInt(id)).show();
		$('html, body').animate({
			scrollTop: $("#reply_box_b_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
}

// Show full shared post
function vpb_show_full_shared_item(id)
{
	$("#shared_post_box_a_"+parseInt(id)).hide();
	$("#shared_post_box_b_"+parseInt(id)).show();
	$('html, body').animate({
		scrollTop: $("#shared_post_box_b_"+parseInt(id)).offset().top-parseInt(60)+'px'
	}, 1600, 'easeInOutExpo');
}

// Show leave a comment box
function vpb_show_comment_box(id)
{
	$("#vpb_comment_box_"+parseInt(id)).fadeIn();
	
	$('html, body').animate({
		scrollTop: $("#vpb_comment_box_"+parseInt(id)).offset().top-parseInt(130)+'px'
	}, 1600, 'easeInOutExpo');
	setTimeout(function() {
		$("#vpb_wall_comment_data_"+parseInt(id)).focus();
	},2000);
}

// Show editable post, comment or reply boxes
function vpb_show_editable_item(id, type)
{
	if(type == "post") // Show editable post
	{
		$(".vpb_editable_status_wrapper").hide();
		$(".vpb_default_status_wrapper").show();
		
		$("#vpb_default_status_wrapper_"+parseInt(id)).hide();
		$("#vpb_editable_status_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_editable_status_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else if(type == "comment") // Show editable comment
	{
		$(".vpb_editable_status_wrapper").hide();
		$(".vpb_default_status_wrapper").show();
		
		$("#vpb_default_comment_wrapper_"+parseInt(id)).hide();
		$("#vpb_editable_comment_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_editable_comment_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else // Show editable reply
	{
		$(".vpb_editable_status_wrapper").hide();
		$(".vpb_default_status_wrapper").show();
		
		$("#vpb_default_reply_wrapper_"+parseInt(id)).hide();
		$("#vpb_editable_reply_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_editable_reply_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
}
// Hide the editable post, comment or reply boxes
function vpb_cancel_editable_item(id, type)
{
	if(type == "post") // Cancel editable post
	{
		$("#vpb_editable_status_wrapper_"+parseInt(id)).hide();
		$("#vpb_default_status_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_default_status_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else if(type == "comment") // Cancel editable comment
	{
		$("#vpb_editable_comment_wrapper_"+parseInt(id)).hide();
		$("#vpb_default_comment_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_default_comment_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
	else // Cancel editable reply
	{
		$("#vpb_editable_reply_wrapper_"+parseInt(id)).hide();
		$("#vpb_default_reply_wrapper_"+parseInt(id)).show();
		
		$('html, body').animate({
			scrollTop: $("#vpb_default_reply_wrapper_"+parseInt(id)).offset().top-parseInt(130)+'px'
		}, 1600, 'easeInOutExpo');
	}
}


// Deletion comfirmation for post, comment or reply
function vpb_delete_this_wall_item(id, type)
{
	$("#v_wall_is_dlt").val(parseInt(id));
	$("#v_wall_is_dltype").val(type);
	
	if(type == "post") // post
	{
		$("#v_this_wall_item_del_message").html($("#items_del_confirm_text").val()+type+'?');
		$("#v-delete-wall-item-alert-box").click();
	}
	else if(type == "comment") // comment
	{
		$("#v_this_wall_item_del_message").html($("#items_del_confirm_text").val()+type+'?');
		$("#v-delete-wall-item-alert-box").click();
	}
	else // reply
	{
		$("#v_this_wall_item_del_message").html($("#items_del_confirm_text").val()+type+'?');
		$("#v-delete-wall-item-alert-box").click();
	}
}



// Hide post, comment or reply
function vpb_delete_the_wall_item()
{
	var item_id = $("#v_wall_is_dlt").val();
	var type = $("#v_wall_is_dltype").val();
	
	if(type == "post") // post
	{
		$("#vpb_wall_wrapper_"+parseInt(item_id)).fadeOut('slow');
	}
	else if(type == "comment") // comment
	{
		$("#vpb_comment_id_"+parseInt(item_id)).fadeOut('slow');
	}
	else // reply
	{
		$("#vpb_reply_id_"+parseInt(item_id)).fadeOut('slow');
	}
	
	var dataString = {"item_id":item_id, "type":type, "page":"delete-this-wall-item"};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('general_system_error');
		if( response_brought !=- 1 ) 
		{
			if(type == "post") // post
			{
				$("#vpb_wall_wrapper_"+parseInt(item_id)).fadeIn('slow');
			}
			else if(type == "comment") // comment
			{
				$("#vpb_comment_id_"+parseInt(item_id)).fadeIn('slow');
			}
			else // reply
			{
				$("#vpb_reply_id_"+parseInt(item_id)).fadeIn('slow');
			}
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else  
		{
			if(type == "post") // post
			{
				$("#vpb_wall_wrapper_"+parseInt(item_id)).remove();
			}
			else if(type == "comment") // comment
			{
				$("#vpb_comment_id_"+parseInt(item_id)).remove();
			}
			else // reply
			{
				$("#vpb_reply_id_"+parseInt(item_id)).remove();
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_delete_the_wall_item();", 10000);
	});
}



// Hide post, comment or reply
function vpb_hide_this_wall_item(id, username, type)
{
	if(type == "post") // post
	{
		$("#vpb_unhidden_post_id_"+parseInt(id)).hide();
		$("#vpb_hidden_post_id_"+parseInt(id)).fadeIn();
	}
	else if(type == "comment") // comment
	{
		$("#vpb_unhidden_comment_id_"+parseInt(id)).hide();
		$("#vpb_hidden_comment_id_"+parseInt(id)).fadeIn();
	}
	else // reply
	{
		$("#vpb_unhidden_reply_id_"+parseInt(id)).hide();
		$("#vpb_hidden_reply_id_"+parseInt(id)).fadeIn();
	}
	
	var dataString = {"id":id, "username":username, "type":type, "page":"hide-this-wall-item"};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('general_system_error');
		if( response_brought !=- 1 ) 
		{
			if(type == "post") // post
			{
				$("#vpb_hidden_post_id_"+parseInt(id)).hide();
				$("#vpb_unhidden_post_id_"+parseInt(id)).fadeIn();
			}
			else if(type == "comment") // comment
			{
				$("#vpb_hidden_comment_id_"+parseInt(id)).hide();
				$("#vpb_unhidden_comment_id_"+parseInt(id)).fadeIn();
			}
			else // reply
			{
				$("#vpb_hidden_reply_id_"+parseInt(id)).hide();
				$("#vpb_unhidden_reply_id_"+parseInt(id)).fadeIn();
			}
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else {}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_hide_this_wall_item('"+parseInt(id)+"', '"+username+"', '"+type+"');", 10000);
	});
}


// Un-hide post, comment or reply
function vpb_unhide_this_wall_item(id, username, type)
{
	if(type == "post") // post
	{
		$("#vpb_hidden_post_id_"+parseInt(id)).hide();
		$("#vpb_unhidden_post_id_"+parseInt(id)).fadeIn();
	}
	else if(type == "comment") // comment
	{
		$("#vpb_hidden_comment_id_"+parseInt(id)).hide();
		$("#vpb_unhidden_comment_id_"+parseInt(id)).fadeIn();
	}
	else // reply
	{
		$("#vpb_hidden_reply_id_"+parseInt(id)).hide();
		$("#vpb_unhidden_reply_id_"+parseInt(id)).fadeIn();
	}
	
	var dataString = {"id":id, "username":username, "type":type, "page":"un-hide-this-wall-item"};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('general_system_error');
		if( response_brought !=- 1 ) 
		{
			if(type == "post") // post
			{
				$("#vpb_unhidden_post_id_"+parseInt(id)).hide();
				$("#vpb_hidden_post_id_"+parseInt(id)).fadeIn();
			}
			else if(type == "comment") // comment
			{
				$("#vpb_unhidden_comment_id_"+parseInt(id)).hide();
				$("#vpb_hidden_comment_id_"+parseInt(id)).fadeIn();
			}
			else // reply
			{
				$("#vpb_unhidden_reply_id_"+parseInt(id)).hide();
				$("#vpb_hidden_reply_id_"+parseInt(id)).fadeIn();
			}
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else {}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_unhide_this_wall_item('"+parseInt(id)+"', '"+username+"', '"+type+"');", 10000);
	});
}


function vpb_show_hidden_item_intro()
{
	$("#v-wall-message").html($("#hidden_post_introduction").val());
	$("#v-wall-alert-box").click(); 
	return false;
}

// Remove the original owner of the post
function v_remove_post_owner()
{
	$("#v_owner_of_post").val('');
	$("#v_post_owner_").hide();
}
function vpb_removal_this_friend()
{
	$("#selected_friend_to_share_with").val('');
	$("#vfriends_name_suggested").val('');
	$("#selected_for_shares").hide();
	$("#un_selected_for_shares").show();
	setTimeout(function() {
		$("#vfriends_name_suggested").focus();
	},10);
}

function vpb_select_this_friend_for_shares(username, fullname)
{
	$("#selected_friend_to_share_with").val(username);
	$("#search_to_select_friend_for_shares").html(fullname);
	$("#un_selected_for_shares").hide();
	$("#selected_for_shares").show();
	$("#vpb-suggested-friends-for-shares-server-response").html('');
}

// Suggest friends to tag
function vpb_suggest_friends_for_shares(friend)
{
	var session_uid = $("#session_uid").val();
	
	if(friend.length > 0)
	{
		$("#search_to_select_friend_for_shares").html('');
		
		$("#vpb-suggested-friends-for-shares-server-response").html('<div class="dropdown v_suggested_share_"><ul class="dropdown-menu vpb-hundred-percent_loading"><li class="dropdown-header vpb_wall_loading_text">'+$("#v_loading_btn").val()+'</li></ul></div>');
		
		var dataString = {'friend':friend, 'username':session_uid, 'page':'suggest_friends_for_shares'};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$("#vpb-suggested-friends-for-shares-server-response").html('<div class="dropdown v_suggested_share_"><ul class="dropdown-menu vpb-hundred-percent_loading"><li class="dropdown-header vpb_wall_loading_text">'+response.replace('VPB: ', '')+'</li></ul></div>');
			}
			else
			{
				if(response == "")
				{
					$("#vpb-suggested-friends-for-shares-server-response").html('');
				}
				else
				{
					$("#vpb-suggested-friends-for-shares-server-response").html('<div class="dropdown v_suggested_share_"><ul class="dropdown-menu vpb-hundred-percent" id="suggested_friends_result">'+response+'</ul></div>');
				}
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_suggest_friends_for_shares('"+friend+"');", 10000);
		});
	}
	else
	{
		$("#vpb-suggested-friends-for-shares-server-response").html('');
		return false;
	}
}



// Show share status update popup box
function vpb_share_this_status_update_box(username, post_id, post_owner_username)
{
	if(username == "" || post_id == "" || post_owner_username == "")
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		$("#the_post_to_share_id").val(parseInt(post_id));
		$("#v_share_this_conts").html('<br>'+$("#v_loading_btn").val()+'<br><br>');
		$("#v-wall-share-this-alert-box").click(); 
		
		var dataString = {"username":username, "post_id":post_id, "post_owner_username":post_owner_username, "page":"load-post-to-share"};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#vpb_share_privacy_box").css('display','inline-block'); // Show privacy settings option
			$("#v_top_share_this_").show(); // Show where to share the post option box at the top of the popup
			$("#v_say_something_about_this_share_box").show(); // Show say something about this option
			$("#v_share_now_button").show(); // Show the share button
			
			$("#v_share_this_conts").html(response);
		}).fail(function(error_response) 
		{
			setTimeout("vpb_share_this_status_update_box('"+username+"', '"+post_id+"', '"+post_owner_username+"');", 10000);
		});
	}
}


// Set where the user wants to share the update
function vpb_set_selected_share_option(name, id, lower_case_selected, icon, post_owner_username)
{
	$("#selected_option_shared_").val(lower_case_selected);
	$("#selected_option_share_option").html('<i class="fa '+icon+'"></i> '+name+'&nbsp;&nbsp;<span class="caret"></span>');
	$(".vasplus_area_ticker").hide();
	$("#"+id).show();
	
	if(lower_case_selected == "mywall")
	{
		 // Remove the selected name so as to share on current user wall
		$("#vfriends_name_suggested").val(''); 
		$("#selected_friend_to_share_with").val('');
		$("#vfriends_suggestion_box").hide();
		$("#vpb_share_privacy_box").css('display','inline-block'); // Show privacy settings option
	}
	else
	{
		$("#vfriends_name_suggested").val('');
		$("#selected_friend_to_share_with").val('');
		setTimeout(function() {
			$("#vfriends_name_suggested").focus();
		},10);
		$("#vfriends_suggestion_box").fadeIn();
		$("#v_share_publicly_button").click();
		$("#vpb_share_privacy_box").css('display','none'); // Show privacy settings option
	}
}


// Set privacy for the post which the user is about to share
function vpb_set_selected_share_option_privacy(name, id, lower_case_selected, icon, post_owner_username)
{
	$("#selected_option_shared_privacy_").val(lower_case_selected);
	
	$("#vpb_share_privacy_box").data('original-title', name);
	$("#vpb_share_privacy_box").attr('data-original-title', name);
	$("#vpb_share_privacy_box").attr('title', name);
	$("#selected_privacy_option_share_option").html('<i class="fa '+icon+'"></i> '+name+'&nbsp;&nbsp;<span class="caret"></span>');
	$(".vasplus_share_privacy_ticker").hide();
	$("#"+id).show();
}

//Cancel sharing a post
function vpb_cancel_post_sharing()
{
	$("#v_share_this_conts").html('');
}

// Share the status update now
function vpb_submit_share_status_update()
{
	var username = $("#session_uid").val();
	var post_id = $("#the_post_to_share_id").val();
	var post_owner_username = $("#v_owner_of_post").val();
	var where_to_share = $("#selected_option_shared_").val();
	var selected_option_shared_privacy = $("#selected_option_shared_privacy_").val();
	var selected_friend_to_share_with = $("#selected_friend_to_share_with").val();
	var vpb_wall_share_post_data = $("#vpb_wall_share_post_data").val();
	var page_id = $("#page_id").val();
	
	if(username == "" || post_id == "" || page_id == "")
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(where_to_share == "myfriend" && selected_friend_to_share_with == "")
	{
		$("#v-wall-message").html($("#invalid_friends_to_share_with_field").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		$("#sharing_update_status").html($("#v_sending_btn").val());
		$("#v-wall-share-this-post").removeClass('enable_this_box');
		$("#v-wall-share-this-post").addClass('disable_this_box');
	
		var dataString = {"username":username, "post_id":post_id, "post_owner_username":post_owner_username, "where_to_share":where_to_share, "selected_friend_to_share_with":selected_friend_to_share_with, "selected_option_shared_privacy":selected_option_shared_privacy, "page_id":page_id, "vpb_wall_share_post_data":vpb_wall_share_post_data, "page":"share-the-status-update-now"};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#v-wall-share-this-post").removeClass('disable_this_box');
			$("#v-wall-share-this-post").addClass('enable_this_box');
		
			var response_brought = response.indexOf('shared_successfully');
			if(response_brought != -1)
			{
				$("#v_cancel_sharing_this_update").click();
				vpb_removal_this_friend();
				setTimeout(function() {
					$("#v_share_publicly_button").click(); // Set the privacy settings back to default public
					$("#on_my_wall_button").click(); // Reset where to share to my-wall
					$("#selected_friend_to_share_with").val(''); // Empty the friend whom to share with field
					$("#vpb_wall_share_post_data").val(''); // Empty any text which has just been shared
					$("#sharing_update_status").html(''); // Stop the sending status
					$("#v-wall-message").html($("#the_status_update_was_successfully_shared_message").val()); // Show the success shared status
					$("#v-wall-alert-box").click(); // Pop up the success box
					
					setTimeout(function() { $("#vclose_info_box_button").click(); },5000);
				},100);
				return false;
			}
			else
			{
				$("#v-wall-message").html(response);
				$("#v-wall-alert-box").click(); 
				return false;
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_submit_share_status_update();", 10000);
		});
	}
}



// Site searching for friends
var completedSearchRequest = false;

function vpb_search_for_friends()
{
	var friend = $("#vfrnd_data").val();
	var session_uid = $("#session_uid").val();
	
	if(friend != "")
	{
		$("#vpb_display_search_results").show().html('<ul id="v_search_results_box" class="dropdown-menu open bullet pull-center vasplus_bosy" style="right: auto; left: 0px; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;width:100%; display:block;padding:10px;" aria-labelledby="v_search_results_box"><li class="dropdown-header dropdown-header-plus">'+$("#v_loading_btn").val()+'</li></ul>');
		
		var dataString = {'friend':friend, 'username':session_uid, 'page':'search_for_friends'};
			
		//if(completedSearchRequest == true) { return false; } else {}
		//completedSearchRequest = true;
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			//completedSearchRequest = false;
			
			var response_brought = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$("#vpb_display_search_results").show().html('<ul id="v_search_results_box" class="dropdown-menu open bullet pull-center vasplus_bosy" style="right: auto; left: 0px; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;width:100%; display:block;" aria-labelledby="v_search_results_box"><li class="dropdown-header dropdown-header-plus">'+response.replace('VPB: ', '')+'</li></ul>');
				
				setTimeout(function() {
					//$("#vpb_display_search_results").html('');
				},1000);
			}
			else
			{
				if(response == "")
				{
					$("#vpb_display_search_results").hide();
				}
				else
				{
					$("#vpb_display_search_results").show().html('<ul id="v_search_results_box" class="dropdown-menu open bullet pull-center vasplus_bosy" style="right: auto; left: 0px; border-radius:0px; border-top:1px solid #E1E1E1; font-size:13px !important; font-family:arial !important;width:100%; display:block;" aria-labelledby="v_search_results_box"><li class="dropdown-header dropdown-header-plus vthe_inner" style=" padding-top:0px !important; padding-bottom:0px !important;">'+response+'</li></ul>');
				}
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_search_for_friends();", 10000);
		});
		
	}
	else
	{
		$("#vfrnd_data").focus();
		$("#vpb_display_search_results").hide();
		return false;
	}
}

function vpb_show_previous_search_results()
{
	vpb_hide_profile_popups();
	if (vpb_trim($('#vpb_display_search_results').text()) == "") {}
	else
	{
		$("#vpb_display_search_results").show();
		$("#v_search_results_box").css('display', 'block');
	}
}


// Hide profile popups
function vpb_hide_profile_popups()
{
	// Hide the sorting details
	$("#vpb_sorting_box").hide();
	$("#vpb_sorting_text").removeClass('vpb_sort_text_active');
	$("#vpb_sorting_text").addClass('vpb_sort_text');
	
	// Hide the website menus
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	$("#v_friend_requests_box").hide();
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	// Hide the search box
	$("#vpb_display_search_results").hide();
	$("#v_friend_requests_box").hide();
}


// Update Passwd
function vpb_update_passwd(my_identity)
{
	var oldpasswd = $("#oldpasswd").val();
	var newpasswd = $("#newpasswd").val();
	var verifynewpasswd = $("#verifynewpasswd").val();
	
	if(my_identity == "" || my_identity == undefined || my_identity == null)
	{
		$("#update_passwd_status").html('<div class="vwarning">'+$("#general_system_error").val()+'</div>');
		return false;
	}
	else if(oldpasswd == "" || oldpasswd == "Current Password")
	{
		$("#oldpasswd").focus();
		$("#update_passwd_status").html('<div class="vwarning">'+$("#current_user_password_field_blank_text").val()+'</div>');
		return false;
	}
	else if(newpasswd == "" || newpasswd == "New Password")
	{
		$("#newpasswd").focus();
		$("#update_passwd_status").html('<div class="vwarning">'+$("#new_user_password_field_blank_text").val()+'</div>');
		return false;
	}
	else if(verifynewpasswd == "" || verifynewpasswd == "Verify new Password")
	{
		$("#verifynewpasswd").focus();
		$("#update_passwd_status").html('<div class="vwarning">'+$("#verify_new_user_password_field_blank_text").val()+'</div>');
		return false;
	}
	else if(verifynewpasswd != newpasswd)
	{
		$("#verifynewpasswd").focus();
		$("#update_passwd_status").html('<div class="vwarning">'+$("#verify_and_new_user_password_field_not_match_text").val()+'</div>');
		return false;
	}
	else
	{
		var dataString = {'my_identity':my_identity, 'oldpasswd':oldpasswd, 'newpasswd':newpasswd, 'verifynewpasswd':verifynewpasswd, 'page':'update-user-passwd'};
		
		$("#update_passwd_status").html('<center><div align="center"><img style="margin-top:10px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brougght = response.indexOf('changed and saved successfully');
			if(response_brougght != -1)
			{
				$("#update_passwd_status").html(response);
	            $("#oldpasswd").val('');
				$("#newpasswd").val('');
				$("#verifynewpasswd").val('');
				setTimeout(function() {
					$('.modal').modal('hide');
					$("#update_passwd_status").html('');
				},8000);
				return false;
			}
			else
			{
				$("#update_passwd_status").html(response);
				return false;
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_update_passwd('"+my_identity+"');", 10000);
		});	
	}
}


// logout
function vpb_log_user_off(url)
{
	vpb_removecookie('session_user_data');
	vpb_removecookie('uep_data');
	
	vpb_removecookie('g_fullnames');
	vpb_removecookie('g_username');
	
	//End chat session
	vpb_removecookie('from_username');
	vpb_removecookie('to_username');
	vpb_removecookie('to_fullname');
	
	vpb_removecookie('vpb_chat_users_array');
	
	vpb_removecookie('vpb_ckpoint');
	
	vpb_removecookie('csname');
	vpb_removecookie('csemail');
	
	setTimeout(function() {
		window.location.replace(url);
	},500);
}

//Get basename of file
function vpb_basename_only(url) 
{
    //return ((url=/(([^\/\\\.#\? ]+)(\.\w+)*)([?#].+)?$/.exec(url))!= null)? url[2]: '';
	return url.replace(/\\/g,'/').replace( /.*\//, '' );
}

// Update Profile Picture
function vpb_update_profile_picture(my_identity)
{
	var vpb_page_owner = $("#vpb_page_owner").val();
	var ext = $('#profile_pic').val().split('.').pop().toLowerCase();
	
	if(my_identity == "" || my_identity == undefined || my_identity == null)
	{
		document.getElementById('profile_pics').title = '';
		document.getElementById('profile_pic').value = '';
		$('#vpb_adding_profile_photo_status').html('<div class="vwarning">'+$("#general_system_error").val()+'</div>');
		return false;
	}
	else if($("#profile_pic").val() == "") 
	{
		return false;
	}
	else if($.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
	{
		document.getElementById('profile_pics').title = '';
		//document.getElementById('profile_pic').value = '';
		$('#vpb_adding_profile_photo_status').html('<div class="vwarning">'+$("#invalid_file_attachment").val()+'</div>'); 
		return false;
	}
	else
	{
		vpb_security_check_points();
		
		$("#vpb_adding_profile_photo_status").html('');
		$('.vpb_progress_outer_bar').show();
		
		var formData = new FormData();
		formData.append("page", 'update-user-photo');
		formData.append("userid", my_identity);
		formData.append("profilepic", document.getElementById('profile_pic').files[0]);
		
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			xhr: function()
			{
				var vpb_progress_percentage = $('.vpb_progress_inner_bar');
				var vpb_progress_inner_bar = $('.vpb_progress_percentage');
				if(vpb_this_xhr() == "")
				{
					vpb_progress_inner_bar.hide();
				} else {
					 var xhr = vpb_this_xhr();
					 xhr.upload.addEventListener("progress", function(e_vent)
					 {
						 if (e_vent.lengthComputable) 
						 {
							 var vpb_current_progress = e_vent.loaded / e_vent.total;
							 vpb_current_progress = parseInt(vpb_current_progress*100);
							 var vpb_totalPercentage = parseInt(vpb_current_progress)+'%';
							 vpb_progress_percentage.width(vpb_totalPercentage)
							 vpb_progress_inner_bar.html(vpb_totalPercentage);
							 
							 if(vpb_current_progress === 100) 
							 {
								 $('.vpb_progress_outer_bar').hide();
								 $("#vpb_adding_profile_photo_status").html('<br>'+$("#v_loading_btn").val());
							 }
						 }
				 	}, false);
					return xhr;
				}
			},
			complete: function(xhr) 
			{
				var vpb_progress_percentage = $('.vpb_progress_inner_bar');
				var vpb_progress_inner_bar = $('.vpb_progress_percentage');
				if(vpb_this_xhr() == "")
				{
					vpb_progress_inner_bar.hide();
				} else {
					vpb_progress_percentage.width("100%");
					vpb_progress_inner_bar.html("100%");
					//xhr.responseText;
				}
			},
			success: function(response)
			{
				var response_brought = response.indexOf('completed');
				if(response_brought != -1)
				{
					var upic = response.split('&');
					document.getElementById('profile_pics').title = '';
					document.getElementById('profile_pic').value = '';
					$('#vpb-display-profile-photo-preview').html('');
					
					$("#vpb_adding_profile_photo_status").html('<div class="vsuccess">'+$('#successfully_updated_profile_photo_text').val()+'</div>'); 
					setTimeout(function() {
						$("#vp_profile_photo").html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="30" height="26" align="absmiddle">');
						
						$("#vp_profile_wall_photo").html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="40" height="40" align="absmiddle">');
						
						if($("#page_id").val() == "group") 
						{
							$("#vp_user_photo_on_group_page").html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="30" height="26" align="absmiddle">');
						}
						else
						{
							if(my_identity == vpb_page_owner)
							{
								$("#updateProfilePic").html('<div class="profilephoto_wrap"><div class="vprofilephoto" style="background-image: url('+vpb_site_url+'photos/'+upic[0]+');" onclick="vpb_popup_photo_box(\''+my_identity+'\', 1, 1, \''+vpb_site_url+'photos/'+upic[0]+'\');"></div><div class="vprofilephoto_editer" data-backdrop="static" data-toggle="modal" data-target="#add-profile-photo"><i class="fa fa-camera"></i> Update Photo</div></div>');
							}
							else {}
						}
						
						$(".v_status_pics_"+my_identity).html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="45" height="45" align="absmiddle">');
						$(".v_status_pic_"+my_identity).html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="34" height="34" align="absmiddle">');
						
						$(".v_status_picture_"+my_identity).html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="35" height="35" align="absmiddle">');
						
						$(".v_status_pictured_"+my_identity).html('<img src="'+vpb_site_url+'photos/'+upic[0]+'" border="0" width="24" height="24" align="absmiddle">');
						
						// replace the user photos in current chat boxes
						$('.vchat_uphoto_'+my_identity).attr('src', vpb_site_url+"photos/"+upic[0]);
						
						$("#vpb_session_pic_"+my_identity).val(vpb_site_url+'photos/'+upic[0]);
					},1000);
					setTimeout(function() {
						$("#vpb_adding_profile_photo_status").html('');
					},4600);
					setTimeout(function() {
						//$('.modal').modal('hide');
					},5000);
				}
				else
				{
					document.getElementById('profile_pics').title = '';
					document.getElementById('profile_pic').value = '';
					$('#vpb_adding_profile_photo_status').html(response); 
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_update_profile_picture('"+my_identity+"');", 10000);
		});		
	}
}

// Load Friends Requests
function vpb_load_friend_requests()
{
	$("#vasplus_wall_friend_requests").hide();
	$("#vpb_display_wall_friend_requests").html('');
	vpb_show_status_updates();
	
	$('#vpb_display_search_results').html('')
	$("#vpb_display_search_results").hide();
	$("#friend_requests_counter").hide();
	var session_uid = $("#session_uid").val();
	
	$("#vpb_display_friend_requests").html('<div style="padding:10px 0px;padding-bottom:6px;">'+$("#v_loading_btn").val()+'</div>');
	$("#v_friend_requests_box").show();
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon');
	$("#v_friend_requests").addClass('vpb_notifications_icon_active');
	
	var dataString = {'username':session_uid, 'page':'check_for_friend_requests'};
	
	//return false;
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('No new friend request was found');
		if(response_brought != -1)
		{
			$("#view_all_friend_req").hide();
			$("#vpb_display_friend_requests").html(response);
		}
		else
		{
			$("#vpb_display_friend_requests").html(response);
		}
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_friend_requests();", 10000);
	});
}

// Load Notifications
function vpb_load_notifications()
{
	$("#vasplus_notifications").hide();
	$("#vpb_display_vnotifications").html('');
	vpb_show_status_updates();
	
	$("#vpb_display_search_results").hide();
	$("#notifications_counter").hide();
	var session_uid = $("#session_uid").val();
	
	$("#vpb_display_notifications").html('<div style="padding:10px 0px;padding-bottom:6px;">'+$("#v_loading_btn").val()+'</div>');
	$("#v_notifications_box").show();
	
	$("#v_notifications").removeClass('vpb_notifications_icon');
	$("#v_notifications").addClass('vpb_notifications_icon_active');
	
	var dataString = {'username':session_uid, 'page':'check_for_notification'};
	
	//return false;
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		var response_brought = response.indexOf('no new notification');
		if(response_brought != -1)
		{
			$("#view_all_notifications").hide();
			$("#vpb_display_notifications").html(response);
		}
		else
		{
			$("#view_all_notifications").show();
			$("#vpb_display_notifications").html(response);
		}
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_notifications();", 10000);
	});
}


// Show all friend requests
function vpb_show_all_friend_requests()
{
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	//$("#vpb_display_page_owners_friends").html('');
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").hide();
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	var session_uid = $("#session_uid").val();
	
	//return false;
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	$("#vpb_display_wall_friend_requests").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_wall_friend_requests").show(); // Show the vewl all friend requests page
	
	if($("#view_all_frnds").css('display') == "none"){
		$("#view_all_frnds").fadeIn();
	}
	else {}
	
	$('html, body').animate({
		scrollTop: $("#vasplus_wall_friend_requests").offset().top-parseInt(100)+'px'
	}, 1600, 'easeInOutExpo');
	
	var dataString = {'username':session_uid, 'page':'check_for_friend_requests'};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		$("#vpb_display_wall_friend_requests").html(response);
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_show_all_friend_requests();", 10000);
	});
}

// Show all friend requests
function vpb_show_status_updates()
{
	$("#group_page_menu span").removeClass('group_menu_wrapper_active');
	$("#group_page_menu span").addClass('group_menu_wrapper');
	
	$("#g_discussion").removeClass('group_menu_wrapper');
	$("#g_discussion").addClass('group_menu_wrapper_active');
	
	
	//Process is not running
	$("#vpb_is_process_running").val('0');
	
	$("#vfrnds_data").val('');
	
	$("#vpb_display_wall_find_friends").html('');
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	
	//$("#vpb_display_page_owners_friends").html('');
	$("#vasplus_page_owners_friends").hide(); // Hide page owners friends box on the current page
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").hide();
	
	$("#vpb_display_wall_friend_requests").html('');
	$("#vasplus_wall_friend_requests").hide(); // Hide the vewl all friend requests page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	$("#vasplus_wall_status_updates").fadeIn(); // Show the status updates on the current page
	
	$("#view_or_edit_button").show(); // Show the view user details and edit user details buttons
	
	$("#group_vides_left_box").show();
	
	if($("#view_all_frnds").css('display') == "none"){
		$("#view_all_frnds").fadeIn();
	}
	else {}
	
	$('html, body').animate({
		//scrollTop: $("#vasplus_wall_status_updates").offset().top-parseInt(60)+'px'
	}, 1600, 'easeInOutExpo');
}

// Find new friends
function vpb_show_find_new_friends_box()
{
	
	$("#group_page_menu span").removeClass('group_menu_wrapper_active');
	$("#group_page_menu span").addClass('group_menu_wrapper');
	
	
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates on the current page
	
	$("#vpb_display_wall_friend_requests").html(''); // Remove the previously displayed friends request from the page
	$("#vasplus_wall_friend_requests").hide(); // Hide the veiw all friend requests page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	//$("#vpb_display_page_owners_friends").html('');
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").hide();
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	$("#vasplus_wall_find_friends").show(); // Show the find friend page
	
	$('html, body').animate({
		scrollTop: $("#vasplus_wall_find_friends").offset().top-parseInt(100)+'px'
	}, 1600, 'easeInOutExpo');
	
	if($("#view_all_frnds").css('display') == "none"){
		$("#view_all_frnds").fadeIn();
	}
	else {}
}


// Site searching for friends
function vpb_search_friends()
{
	var friend = $("#vfrnds_data").val();
	var session_uid = $("#session_uid").val();
	
	if(friend.length > 0)
	{
		$("#vpb_display_wall_find_friends").html($("#vpb_loading_image_gif").val()); //Show loading image
	
		var dataString = {'friend':friend, 'username':session_uid, 'page':'search_for_friends'};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$("#vpb_display_wall_find_friends").html(response.replace('VPB: ', ''));
			}
			else
			{
				if(response == "")
				{
					$("#vpb_display_wall_find_friends").html('');
				}
				else
				{
					$("#vpb_display_wall_find_friends").html(response);
				}
			}
			
			$('html, body').animate({
				scrollTop: $("#vasplus_wall_find_friends").offset().top-parseInt(100)+'px'
			}, 1600, 'easeInOutExpo');
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_search_friends('"+friend+"');", 10000);
		});
	}
	else
	{
		$("#vfrnds_data").focus();
		$("#vpb_display_wall_find_friends").html('');
		return false;
	}
}

// Show all Page Owner friend
function vpb_show_page_owner_friends()
{
	$("#view_all_frnds").hide();
	
	// Hide the notification box since a call to this function can also come from the notification box
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vpb_display_wall_friend_requests").html(''); // Empty the friend requests pop up box
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	$("#vasplus_wall_friend_requests").hide(); // Hide the friends requests box on the current page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	$("#vasplus_group_page_members").hide();
	$("#vasplus_group_page_videos").hide();
	
	//$("#vpb_display_page_owners_friends").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_page_owners_friends").show(); // Show the page owners friends page
	
	$('html, body').animate({
		scrollTop: $("#vasplus_page_owners_friends").offset().top-parseInt(120)+'px'
	}, 1600, 'easeInOutExpo');
}
function vpb_load_more_page_owner_friends()
{	
	var total_friends = $("#vtotal_friends").val(); //The total page owner's friends
	var vpb_start = $("#vpb_friends_start").val(); //Where to start loading the friends
	
	var vpb_total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(total_friends)) 
	{
		var dataString = {"vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "vpb_page_owner":vpb_page_owner, "page_id":page_id, "page":"load-more-friends"}
		
		$("#vpb_load_more_friends_box").hide();
		
		$("#vpb_loading_friends").html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_friends_outer").show();
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_friends_outer").hide(); 
			$("#vpb_loading_friends").html('');
			
			var total_loaded_friends = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_friends_start").val(parseInt(total_loaded_friends)); 
			$("#v_this_friends_totals").html(parseInt(total_loaded_friends)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_friends").prepend(
				$(response).hide().fadeIn('fast')
			);
			
			if(parseInt($("#vpb_friends_start").val()) < parseInt(total_friends)) 
			{ $("#vpb_load_more_friends_box").show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_page_owner_friends();", 10000);
		});
	}
	else
	{
		//Hide load more friends buttons when there is no more friend
		$("#vpb_load_more_friends_box").hide();
	}
}

// Show About Page Owner Details
function vpb_show_about_page_owner_details(action)
{
	$("#view_or_edit_button").hide();
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	
	$("#vpb_display_wall_friend_requests").html('');
	$("#vasplus_wall_friend_requests").hide(); // Hide the vewl all friend requests page
	
	// Hide the website menus
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	//$("#vpb_display_page_owners_friends").html('');
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").hide();
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	var session_uid = $("#session_uid").val();
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	$("#vpb_display_about_page_owner").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_about_page_owner").show(); // Show the vewl all friend requests page
	
	if($("#view_all_frnds").css('display') == "none"){
		$("#view_all_frnds").fadeIn();
	}
	else {}
	
	$('html, body').animate({
		scrollTop: $("#vasplus_about_page_owner").offset().top-parseInt(100)+'px'
	}, 1600, 'easeInOutExpo');
	
	var dataString = {'username':session_uid, 'vpb_page_owner':vpb_page_owner, 'action':action, 'page':'vpb_get_about_page_owner_detail'};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		$("#vpb_display_about_page_owner").html(response);
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_show_about_page_owner_details('"+action+"');", 10000);
	});
}

// Show About Page Owner Details
function vpb_show_notifications_details(action)
{
	$("#group_page_menu span").removeClass('group_menu_wrapper_active');
	$("#group_page_menu span").addClass('group_menu_wrapper');
	
	
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	
	$("#vpb_display_wall_friend_requests").html('');
	$("#vasplus_wall_friend_requests").hide(); // Hide the vewl all friend requests page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about page owner page
	
	// Hide the website menus
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	//$("#vpb_display_page_owners_friends").html('');
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").hide();
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	var session_uid = $("#session_uid").val();
	var vpb_page_owner = $("#vpb_page_owner").val(); //The username of the page owner
	
	
	//return false;
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	$("#vpb_display_vnotifications").html(''); // Remove the previous pop up notification contents
	
	$("#vpb_display_notifications").html('');
	
	$("#vpb_display_vnotifications").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_notifications").show(); 
	
	if($("#view_all_frnds").css('display') == "none"){
		$("#view_all_frnds").fadeIn();
	}
	else {}
	
	$('html, body').animate({
		scrollTop: $("#vasplus_notifications").offset().top-parseInt(100)+'px'
	}, 1600, 'easeInOutExpo');
	
	var dataString = {'username':session_uid, 'page':'check_for_notification'};
	
	$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
	{
		$("#vpb_display_vnotifications").html(response);
		
	}).fail(function(error_response) 
	{
		setTimeout("vpb_show_notifications_details('"+action+"');", 10000);
	});
}

// Validate email addresses
function vpb_email_is_valid(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

// Show About Page Owner Details
function vpb_save_profile_details()
{
	var session_uid = $("#session_uid").val();
	var vpb_page_owner = $("#vpb_page_owner").val();
	var epage_fullname = $("#epage_fullname").val();
	var epage_email = $("#epage_email").val();
	
	var eabout_us = $("#eabout_us").val();
	var efavorite_quotes = $("#efavorite_quotes").val();
	var emarital_status = $("#emarital_status").val();
	var eaddress = $("#eaddress").val();
	var ephone = $("#ephone").val();
	var egender = $("#egender").val();
	var einterested_in = $("#einterested_in").val();
	var eday = $("#eday").val();
	var emonth = $("#emonth").val();
	var eyear = $("#eyear").val();
	var ebirth_date_privacy = $("#ebirth_date_privacy").val();
	var ecompany = $("#ecompany").val();
	var ejob_position = $("#ejob_position").val();
	var eprofessional_skill = $("#eprofessional_skill").val();
	var ehigh_school_name = $("#ehigh_school_name").val();
	
	var hs_started_day = $("#hs_started_day").val();
	var hs_started_month = $("#hs_started_month").val();
	var hs_started_year = $("#hs_started_year").val();
	var started_high_school_from_date = hs_started_day+'-'+hs_started_month+'-'+hs_started_year;
	
	var hs_ended_day = $("#hs_ended_day").val();
	var hs_ended_month = $("#hs_ended_month").val();
	var hs_ended_year = $("#hs_ended_year").val();
	var ended_high_school_at_date = hs_ended_day+'-'+hs_ended_month+'-'+hs_ended_year;
	
	var ecollege_field_of_study = $("#ecollege_field_of_study").val();
	var ecollege_name = $("#ecollege_name").val();
	
	var c_started_day = $("#c_started_day").val();
	var c_started_month = $("#c_started_month").val();
	var c_started_year = $("#c_started_year").val();
	var started_college_from_date = c_started_day+'-'+c_started_month+'-'+c_started_year;
	
	var c_ended_day = $("#c_ended_day").val();
	var c_ended_month = $("#c_ended_month").val();
	var c_ended_year = $("#c_ended_year").val();
	var ended_college_at_date = c_ended_day+'-'+c_ended_month+'-'+c_ended_year;
	
	var efrom_city_name = $("#efrom_city_name").val();
	var elives_in_city_name = $("#elives_in_city_name").val();
	var elanguage = $("#elanguage").val();
	var ereligion = $("#ereligion").val();
	var epoliticl_view = $("#epoliticl_view").val();
	var ecountry = $("#ecountry").val();
	
	
	if(vpb_trim(session_uid) == "" || vpb_trim(vpb_page_owner) == "")
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(vpb_trim(epage_fullname) == "")
	{
		$('html, body').animate({
			scrollTop: $("#page_fullname_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#empty_fullname_field").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(vpb_trim(epage_email) == "")
	{
		$('html, body').animate({
			scrollTop: $("#page_email_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#empty_email_field").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(!vpb_email_is_valid(vpb_trim(epage_email)))
	{
		$('html, body').animate({
			scrollTop: $("#page_email_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#invalid_email_field").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(eday != "" && emonth == "" || eday != "" && eyear == "")
	{
		
		$('html, body').animate({
			scrollTop: $("#birth_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#birthday_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(emonth != "" && eday == "" || emonth != "" && eyear == "")
	{
		$('html, body').animate({
			scrollTop: $("#birth_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#birthday_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(eyear != "" && eday == "" || eyear != "" && emonth == "")
	{
		$('html, body').animate({
			scrollTop: $("#birth_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#birthday_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_started_day != "" && hs_started_month == "" || hs_started_day != "" && hs_started_year == "")
	{
		
		$('html, body').animate({
			scrollTop: $("#started_high_school_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_started_month != "" && hs_started_day == "" || hs_started_month != "" && hs_started_year == "")
	{
		$('html, body').animate({
			scrollTop: $("#started_high_school_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_started_year != "" && hs_started_day == "" || hs_started_year != "" && hs_started_month == "")
	{
		$('html, body').animate({
			scrollTop: $("#started_high_school_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_ended_day != "" && hs_ended_month == "" || hs_ended_day != "" && hs_ended_year == "")
	{
		
		$('html, body').animate({
			scrollTop: $("#ended_high_school_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_ended_month != "" && hs_ended_day == "" || hs_ended_month != "" && hs_ended_year == "")
	{
		$('html, body').animate({
			scrollTop: $("#ended_high_school_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(hs_ended_year != "" && hs_ended_day == "" || hs_ended_year != "" && hs_ended_month == "")
	{
		$('html, body').animate({
			scrollTop: $("#ended_high_school_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_high_school_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_started_day != "" && c_started_month == "" || c_started_day != "" && c_started_year == "")
	{
		
		$('html, body').animate({
			scrollTop: $("#started_college_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_started_month != "" && c_started_day == "" || c_started_month != "" && c_started_year == "")
	{
		$('html, body').animate({
			scrollTop: $("#started_college_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_started_year != "" && c_started_day == "" || c_started_year != "" && c_started_month == "")
	{
		$('html, body').animate({
			scrollTop: $("#started_college_from_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#started_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_ended_day != "" && c_ended_month == "" || c_ended_day != "" && c_ended_year == "")
	{
		
		$('html, body').animate({
			scrollTop: $("#ended_college_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_ended_month != "" && c_ended_day == "" || c_ended_month != "" && c_ended_year == "")
	{
		$('html, body').animate({
			scrollTop: $("#ended_college_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(c_ended_year != "" && c_ended_day == "" || c_ended_year != "" && c_ended_month == "")
	{
		$('html, body').animate({
			scrollTop: $("#ended_college_at_date_html").offset().top-parseInt(100)+'px'
		}, 1600, 'easeInOutExpo');
		$("#v-wall-message").html($("#ended_college_missing_fields_text").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		$("#update_acct_status").html($("#v_loading_btn").val());
		
		$("#vpb_display_about_page_owner").removeClass('enable_this_box');
		$("#vpb_display_about_page_owner").addClass('disable_this_box');
		
		var dataString = {'username':session_uid, 'vpb_page_owner':vpb_page_owner, 'fullname':epage_fullname, 'email':epage_email, 'about_us':eabout_us, 'favorite_quotes':efavorite_quotes, 'marital_status':emarital_status, 'address':eaddress, 'phone':ephone, 'gender':egender, 'interested_in':einterested_in, 'day':eday, 'month':emonth, 'year':eyear, 'birth_date_privacy':ebirth_date_privacy, 'company':ecompany, 'job_position':ejob_position, 'professional_skill':eprofessional_skill, 'high_school_name':ehigh_school_name, 'started_high_school_from_date':started_high_school_from_date, 'ended_high_school_at_date':ended_high_school_at_date, 'college_field_of_study':ecollege_field_of_study, 'college_name':ecollege_name, 'started_college_from_date':started_college_from_date, 'ended_college_at_date':ended_college_at_date, 'from_city_name':efrom_city_name, 'lives_in_city_name':elives_in_city_name, 'language':elanguage, 'religion':ereligion, 'politicl_view':epoliticl_view, 'country':ecountry, 'page':'vpb_save_profile_detail'};
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#vpb_display_about_page_owner").removeClass('disable_this_box');
			$("#vpb_display_about_page_owner").addClass('enable_this_box');
			
			var response_brought  = response.indexOf('VPB:');
			if(response_brought != -1)
			{
				$(document).attr( 'title', epage_fullname);
				$("#p_page_name").html(epage_fullname);
				
				var name_path = epage_fullname.split(' ');
				if(name_path[0] != "") { $("#p_page_first_name").html(name_path[0]); } else {}
				
				$("#o_p_page_first_name").data('original-title', epage_fullname);
                $("#o_p_page_first_name").attr('data-original-title', epage_fullname);
				$("#o_p_page_first_name").attr('title', epage_fullname);
				
				$("#update_acct_status").html(response.replace('VPB: ', ''));
				
				$("#update_acct_wait").html($("#v_sending_btn").val());
				
				$('html, body').animate({
					scrollTop: $("#update_acct_wait").offset().top+parseInt(100)+'px'
				}, 1600, 'easeInOutExpo');
				
				setTimeout(function() {
					$("#update_acct_status").html('');
					vpb_show_about_page_owner_details('normal');
				},8000);
			}
			else
			{
				$("#update_acct_status").html(response);
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_save_profile_details();", 10000);
		});
	}
}
// Show the time zone box
function vpb_show_timezone_box()
{
	// Hide the website menus
	$("#v_site_menu_box").hide();
	$("#v_site_menu").removeClass('vpb_notifications_icon_active');
	$("#v_site_menu").addClass('vpb_notifications_icon');
	
 // Check if User has already set timezone
   if(vpb_getcookie('vasplus_timezone') != "" && vpb_getcookie('vasplus_timezone') != undefined && vpb_getcookie('vasplus_timezone') != null) 
   {
	   $("#default_timezone_label").html($("#timezone_info_text").val());
	   $("#my_timezone").val(vpb_getcookie('vasplus_timezone')).change();
	   $('#vasplus_timezone_box').modal('show');
   } 
   else 
   {
		$('#vasplus_timezone_box').modal('show');
   }
}

// Save the time zone
function vpb_save_timezone()
{
	var my_timezone = $('#my_timezone').val();
	if(my_timezone == "" || my_timezone == undefined)
	{
		$('#vasplus_timezone_box').modal('hide');
		return false;
	}
	vpb_setcookie('vasplus_timezone', my_timezone, 360);
	$('#timezone_show,#timezone_hide').toggle('fast');
	$('#timezone_settled').hide();
	setTimeout(function() {
		$('#vasplus_timezone_box').modal('hide');
	},5000);
}




// Save the details of the post which a user wanted 
function vpb_save_the_item_detail(post_id, fullname, username, email, pageusername)
{
	$("#the_postID").val(post_id);
	$("#the_pageUsernamed").val(pageusername);
	$("#the_posterFullname").val(fullname);
	$("#the_posterUsername").val(username);
	$("#the_posterEmail").val(email);
}
// Report a post
function vpb_report_the_post(session_fullname, session_username, session_email)
{
	var post_id = $("#the_postID").val();
	var the_pageUsernamed = $("#the_pageUsernamed").val();
	var the_posterFullname = $("#the_posterFullname").val();
	var the_posterUsername = $("#the_posterUsername").val();
	var the_posterEmail = $("#the_posterEmail").val();
	
	var report_post_data = vpb_trim($("#report_post_data").val());
	
	if(post_id == "" || the_posterFullname == "" || the_posterUsername == "" || the_posterEmail == "" || session_fullname == "" || session_username == "" || session_email == "" || the_pageUsernamed == "")
	{
		$("#report_post_status").html('<div class="vwarning">'+$("#general_system_error").val()+'</div>');
		return false;
	}
	else if(report_post_data == "")
	{
		$("#report_post_data").focus();
		$("#report_post_status").html('<div class="vwarning">'+$("#empty_reporting_post_field_text").val()+'</div>');
		return false;
	}
	else if(report_post_data.length < 5)
	{
		$("#report_post_data").focus();
		$("#report_post_status").html('<div class="vwarning">'+$("#not_enough_reporting_post_field_text").val()+'</div>');
		return false;
	}
	else
	{
		var dataString = {'post_id':post_id, 'the_posterFullname':the_posterFullname, 'the_posterUsername':the_posterUsername, 'the_posterEmail':the_posterEmail, 'the_pageUsernamed':the_pageUsernamed, 'session_fullname':session_fullname, 'session_username':session_username, 'session_email':session_email, 'report_post_data':report_post_data, 'page':'report-an-update'};
		
		$("#report_post_status").html('<center><div align="center"><img style="margin-top:10px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
		
		$("#report-this-post").removeClass('enable_this_box');
		$("#report-this-post").addClass('disable_this_box');
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#report-this-post").removeClass('disable_this_box');
			$("#report-this-post").addClass('enable_this_box');
		
			var response_brougght = response.indexOf('completed_successfuly');
			if(response_brougght != -1)
			{
				$("#report_post_status").html('<div class="vsuccess">'+$("#report_send_successfully_message").val()+'</div>');
				$("#report_post_data").val('');
				setTimeout(function() {
					$('.modal').modal('hide');
					$("#report_post_status").html('');
				},10000);
				return false;
			}
			else
			{
				$("#report_post_status").html(response);
				return false;
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_report_the_post('"+session_fullname+"', '"+session_username+"', '"+session_email+"');", 10000);
		});	
	}
}

//Search for suggested users
function vpb_search_get_suggested_user(system_username)
{
	var session_username = $("#session_uid").val();
	var group_names = vpb_getcookie('group_fnames') == null ? '' : vpb_getcookie('group_fnames');
	var formatted_names = group_names == "" ? "" : group_names.split(',').join("|");
	
	if ( system_username != "")
	{
		var dataString = {"session_username": session_username, "system_username": system_username, "group_names": formatted_names, "page":"search_for_suggested_users"};
		$.ajax({  
			type: "POST",  
			url: vpb_site_url+'wall-processor.php',  
			data: dataString,
			beforeSend: function() 
			{
				$("#v_suggested_wall_users_box").fadeIn();
				$("#vpb_suggested_users_displayer").html('<div style="padding:10px; text-align:center;font-size:16px !important;">'+$("#v_loading_btn").val()+'</div>');
			},  
			success: function(response)
			{
				$("#vpb_suggested_users_displayer").html(response);
			}
		});
	}
	else
	{
		$("#v_suggested_wall_users_box").fadeOut();
		//$("#vpb_suggested_users_displayer").html('');
	}
}

// Show previously searched users on clicking the search box if available
function vpb_show_prev_suggested_searched_user()
{
	if ($('#vpb_suggested_users_displayer').text().length == 0 ) {}
	else { $("#v_suggested_wall_users_box").fadeIn(); }
}

// Check if a group session exit or not
function vpb_wall_session_is_created()
{
	if(vpb_getcookie('group_unames') != "" && vpb_getcookie('group_unames') != null && vpb_getcookie('group_unames') != undefined)
	{
		return true;
	} else {
		return false;
	}
}

// Already added user to list
function vpb_uInArray(group_username, user)
{
	var found = false;
	var vpb_group_users_name = new Array();
	vpb_group_users_name = group_username.split(/\,/);
	for (var u=0;u<vpb_group_users_name.length;u++) {
		if(vpb_group_users_name[u] == user) 
		{
			found = true;
		} else {}
	}
	return found;
}

// Add user to group
function vpb_add_new_wall_user_to_group(fullname, username, photo)
{
	var group_id = vpb_getcookie('v_wall_group_id') != null ? vpb_getcookie('v_wall_group_id') : "";
	if(group_id != "" && group_id != undefined)
	{
		if(vpb_wall_session_is_created() && vpb_uInArray(vpb_getcookie('group_unames'), username)) {
			// Already in the list
		}
		else {
			
			var group_fullname = new Array();
			var group_username = new Array();
	
			if(vpb_wall_session_is_created())
			{
				group_fullname = vpb_getcookie('group_fnames').split(/\,/);
				group_username = vpb_getcookie('group_unames').split(/\,/);
				
				group_fullname[group_fullname.length] = fullname;
				group_username[group_username.length] = username;
			}
			else 
			{
				group_username[group_username.length] = username;
				group_fullname[group_fullname.length] = fullname;
			}
			
			vpb_setcookie('g_fullnames', group_fullname, 30);
			vpb_setcookie('g_username', group_username, 30);
			
			vpb_setcookie('group_fnames', group_fullname, 30);
			vpb_setcookie('group_unames', group_username, 30);
			
			$("#vpb_user_selected_"+username).hide();
			$("#vpb_wall_members_data").val('').focus();
			
			$("#vpb_added_wall_users_box").append('<span id="vpb_new_user_in_group_'+username+'"><span class="vpb_added_users_to_com">'+fullname+' <i class="fa fa-times-circle hoverings" onclick="vpb_remove_a_user_from_group(\''+fullname+'\', \''+username+'\')"></i></span></span>');
		}
	}
	else {}
}

// Display all newly added users in a group
function vpb_display_the_users_in_group()
{
	if(vpb_wall_session_is_created())
	{
		var vpb_group_users_fname = new Array();
		var vpb_group_users_name = new Array();
		
		vpb_group_users_fname = vpb_getcookie('group_fnames').split(/\,/);
		vpb_group_users_name = vpb_getcookie('group_unames').split(/\,/);
		
		$("#vpb_added_wall_users_box").html('');
		
		for (var u=0;u<vpb_group_users_name.length;u++) 
		{
			if(vpb_group_users_name[u] != "") 
			{
				var fullname = vpb_group_users_fname[u];
				var username = vpb_group_users_name[u];
				
				$("#vpb_added_wall_users_box").append('<span id="vpb_new_user_in_group_'+username+'"><span class="vpb_added_users_to_com">'+fullname+' <i class="fa fa-times-circle hoverings" onclick="vpb_remove_a_user_from_group(\''+fullname+'\', \''+username+'\')"></i></span></span>');
			} 
			else {}
		}
	}
	else {}
}

// Generate Communication data
function vpb_generte_random() 
{
	return Math.random().toString().split("0.").join("1").toString().split(".").join("");
}


// Remove newly added users from group
function vpb_remove_data(arr, itemToRemove) {
    var j = 0;
	for (var i = 0, l = arr.length; i < l; i++) {
		if (arr[i] !== itemToRemove) {
			arr[j++] = arr[i];
		}
	}
	arr.length = j;
	return arr;
}

// Remove a user from a group conversation
function vpb_remove_a_user_from_group(fullname, username)
{
	if(vpb_wall_session_is_created())
	{
		var vpb_group_users_fname = new Array();
		var vpb_group_users_name = new Array();
		
		vpb_group_users_fname = vpb_getcookie('group_fnames').split(/\,/);
		vpb_group_users_name = vpb_getcookie('group_unames').split(/\,/);
		
		vpb_setcookie('g_fullnames', vpb_remove_data(vpb_group_users_fname, fullname), 30);
		vpb_setcookie('g_username', vpb_remove_data(vpb_group_users_name, username), 30);
		
		vpb_setcookie('group_fnames', vpb_remove_data(vpb_group_users_fname, fullname), 30);
		vpb_setcookie('group_unames', vpb_remove_data(vpb_group_users_name, username), 30);
		
		$("#vpb_new_user_in_group_"+username).fadeOut();
		
		setTimeout(function() { $("#vpb_new_user_in_group_"+username).remove(); },50);
		
		var group_id = $("#group_uid").val() != "" ? $("#group_uid").val() : "";
		if(group_id != "" && group_id != undefined)
		{
			var dataString = {"username": username, "group_id": group_id, "page":"vpb_remove_user_from_group"};
			$.ajax({  
				type: "POST",  
				url: vpb_site_url+'wall-processor.php',  
				data: dataString,
				beforeSend: function() {}, 
				success: function(response) {}
			}); 
		}
		else {}
		vpb_display_the_users_in_group();
	}
	else 
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
}

// Keep current group details for display when needed
function vpb_store_current_group_details(g_id, g_name, g_desc, g_members, g_photo, g_privacy, g_fname)
{
	vpb_setcookie('g_id', g_id, 30);
	vpb_setcookie('g_name', g_name, 30);
	vpb_setcookie('g_desc', g_desc, 30);
	if(g_photo != "") { vpb_setcookie('group_uphoto', g_photo, 30); } else {}
	vpb_setcookie('g_privacy', g_privacy, 30);
	vpb_setcookie('g_username', jQuery.parseJSON(g_members), 30);
	vpb_setcookie('g_fullnames', jQuery.parseJSON(g_fname), 30);
}

function vpb_set_current_group_details()
{
	$("#create_group_button").hide();
	$("#save_group_changes_button").show();
	
	$("#vgroup_name").val(vpb_getcookie('g_name'));
	$("#vgroup_description").val(vpb_getcookie('g_desc'));
	
	if(vpb_getcookie('group_uphoto') != "" && vpb_getcookie('group_uphoto') != null && vpb_getcookie('group_uphoto') != undefined)
	{
		$("#vpb_display_wall_group_photo").html('<img onClick="vpb_view_this_image(\''+$("#group_photo_title_text").val()+'\', \''+vpb_getcookie('group_uphoto')+'\');" src="'+vpb_getcookie('group_uphoto')+'#'+vpb_generte_random()+'" title='+$("#group_photo_title_text").val()+' border="0">');
	}
	else {}
	
	if(vpb_getcookie('g_privacy') == "Public")
	{
		$('#public_group').prop('checked', true);
	}
	else if(vpb_getcookie('g_privacy') == "Secret")
	{
		$('#secret_group').prop('checked', true);
	}
	else {}
	
	vpb_setcookie('group_unames', vpb_getcookie('g_username'), 30);
	vpb_setcookie('group_fnames', vpb_getcookie('g_fullnames'), 30);
	
	// Display users in group
	var vpb_group_users_fname = new Array();
	var vpb_group_users_name = new Array();
	
	vpb_group_users_fname = vpb_getcookie('group_fnames').split(/\,/);
	vpb_group_users_name = vpb_getcookie('group_unames').split(/\,/);
	
	$("#vpb_added_wall_users_box").html('');
	
	for (var u=0;u<vpb_group_users_name.length;u++) 
	{
		if(vpb_group_users_name[u] != "") 
		{
			var fullname = vpb_group_users_fname[u];
			var username = vpb_group_users_name[u];
			
			$("#vpb_added_wall_users_box").append('<span id="vpb_new_user_in_group_'+username+'"><span class="vpb_added_users_to_com">'+fullname+' <i class="fa fa-times-circle hoverings" onclick="vpb_remove_a_user_from_group(\''+fullname+'\', \''+username+'\')"></i></span></span>');
		} 
		else {}
	}
	setTimeout(function() { document.getElementById('v-create-group-box').click(); },100);
}

function vpb_reset_current_group_details()
{
	$("#save_group_changes_button").hide();
	$("#create_group_button").show();
	
	$("#vgroup_name").val('');
	$("#vgroup_description").val('');
	$("#vpb_display_wall_group_photo").html('');
	$('#public_group').prop('checked', false);
	$('#secret_group').prop('checked', false);
	vpb_removecookie('group_fnames');
	vpb_removecookie('group_unames');
	$("#vpb_added_wall_users_box").html('');
	vpb_setcookie('v_wall_group_id', vpb_generte_random(), 30);
	setTimeout(function() { document.getElementById('v-create-group-box').click(); },100);
}

//Save group details
function vpb_save_wall_group_details(whois)
{
	var username = vpb_trim(vpb_strip_tags($("#session_uid").val()));
	
	if(whois == "create") {
		var group_id = vpb_getcookie('v_wall_group_id') == null ? '' : vpb_trim(vpb_strip_tags(vpb_getcookie('v_wall_group_id')));
	} else {
		var group_id = vpb_getcookie('g_id') == null ? '' : vpb_trim(vpb_strip_tags(vpb_getcookie('g_id')));
	}
	var group_username = vpb_getcookie('group_unames') == null ? '' : vpb_trim(vpb_strip_tags(vpb_getcookie('group_unames')));
	var group_fullname = vpb_getcookie('group_fnames') == null ? '' : vpb_trim(vpb_strip_tags(vpb_getcookie('group_fnames')));
	var group_name = vpb_trim(vpb_strip_tags($("#vgroup_name").val()));
	var vgroup_description = vpb_trim(vpb_strip_tags($("#vgroup_description").val()));
	
	var ext = $('#vgroup_picture').val().split('.').pop().toLowerCase();
	var vgroup_picture = $("#vgroup_picture").val();
	
	var photo_added = vgroup_picture == "" ? "no" : "yes";
	
	$("#vplease_wait_loading").html('');
	
	if($('#public_group').prop('checked'))
	{
		var group_type = "Public";
	}
	else if($('#secret_group').prop('checked'))
	{
		var group_type = "Secret";
	}
	else
	{
		var group_type = "";
	}
	
	if(username == "" || group_id == "") 
	{
		$("#vpb_display_group_status").html('');
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else if(group_name == "")
	{
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#empty_group_name_text").val()+'</div>');
		$("#vgroup_name").focus();
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else if(vgroup_description == "")
	{
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#empty_group_desc_text").val()+'</div>');
		$("#vgroup_description").focus();
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else if(group_username == "")
	{
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#empty_group_members_name_text").val()+'</div>');
		$("#vpb_wall_members_data").focus();
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else if(whois == "create" && vgroup_picture == "") 
	{
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#empty_group_photo_text").val()+'</div>');
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else if(whois == "create" && $.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
	{
		document.getElementById('vgroup_picture').value = '';
		document.getElementById('vgrouppicture').title = 'No file is chosen';
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#invalid_file_attachment").val()+'</div>'); 
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else if(group_type == "") 
	{
		$("#vpb_display_group_status").html('<div class="vwarning">'+$("#empty_group_type_text").val()+'</div>');
		$('#v-create-group').animate({
			scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
		}, 1600, 'easeInOutExpo');
		return false;
	}
	else 
	{
		//Proceed now because a user has selected a file
		var vpb_files = document.getElementById('vgroup_picture').files;
		
		// Create a formdata object and append the file
		var vpb_data = new FormData();
		
		$.each(vpb_files, function(keys, values)
		{
			vpb_data.append(keys, values);
		});
		
		vpb_data.append("username", username);
		vpb_data.append("group_id", group_id);
		vpb_data.append("group_manager", username);
		vpb_data.append("group_username", group_username);
		vpb_data.append("group_type", group_type);
		vpb_data.append("group_name", group_name);
		vpb_data.append("photo_added", photo_added);
		vpb_data.append("vgroup_description", vgroup_description);
		vpb_data.append("page", 'vpb_save_wall_group_details'); 
	
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: vpb_data,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function() 
			{
				$("#vpb_display_group_status").html('');
				$("#vplease_wait_loading").html('<div style="padding:10px;padding-bottom:6px;padding-top:0px;">'+$("#v_loading_btn").val()+'</div>');
				$("#v-create-group").removeClass('enable_this_box');
				$("#v-create-group").addClass('disable_this_box');
				$('#v-create-group').animate({
					scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
				}, 1600, 'easeInOutExpo');
			},
			success: function(response)
			{
				var response_brought = response.indexOf('saved_successfully');
				if(response_brought != -1)
				{
					if(vpb_getcookie('group_name') || vpb_getcookie('group_name') != null) { vpb_removecookie('group_name'); } else {}
					if(vpb_getcookie('group_pic') || vpb_getcookie('group_pic') != null) { vpb_removecookie('group_pic'); } else {}
					var data_brought = response.split('|');
					var group_pic = data_brought[1];
					
					vpb_setcookie('group_name', group_name, 30);
					if(group_pic != "") 
					{
						vpb_setcookie('group_pic', group_pic, 30); 
					
						$("#vpb_display_wall_group_photo").html('<img onClick="vpb_view_this_image(\''+$("#group_photo_title_text").val()+'\', \''+group_pic+'\');" src="'+group_pic+'" title='+$("#group_photo_title_text").val()+' border="0">');
						
						$("#vcoverPic").html('<div class="gvprofilephoto" style="background-image: url('+group_pic+');" onclick="vpb_popup_photo_box(\''+group_name+'\', 1, 1, \''+group_pic+'\');"></div>');
					
					} 
					else {}
					
					$("#vpb_display_group_status").html('<div class="vsuccess">'+$('#saved_group_details_successfully_text').val()+'</div>');
					
					$("#v-create-group").removeClass('disable_this_box');
					$("#v-create-group").addClass('enable_this_box');
					
					$('#v-create-group').animate({
						scrollTop: $("#vpb_display_group_status").offset().top+parseInt(120)+'px'
					}, 1600, 'easeInOutExpo');
					
					if(whois == "create")
					{
						//vpb_removecookie('group_fnames');
						//vpb_removecookie('group_unames');
						//vpb_removecookie('group_uphoto');
						setTimeout(function() 
						{
							$("#vpb_display_group_status").html('');
							window.location.replace(vpb_site_url+'group/'+group_id+'/');
						},2000);
					}
					else
					{
						setTimeout(function() {
							$("#vpb_display_group_status").html('');
						},5000);
						$("#vplease_wait_loading").html('');
						
						document.getElementById('vgroup_picture').value = '';
						document.getElementById('vgrouppicture').title = 'No file is chosen';
						
						vpb_load_more_status_updates('start');
						
						
						if(group_pic != "") 
						{
							vpb_setcookie('group_uphoto', group_pic, 30);
							vpb_setcookie('group_pic', group_pic, 30);
							
							vpb_store_current_group_details(group_id, group_name, vgroup_description, group_username, group_pic, group_type, group_fullname);
						}
						else
						{
							vpb_store_current_group_details(group_id, group_name, vgroup_description, group_username, '', group_type, group_fullname);
						}
					}
				}
				else
				{
					$("#vplease_wait_loading").html('');
					$("#vpb_display_group_status").html('');
					$("#v-create-group").removeClass('disable_this_box');
					$("#v-create-group").addClass('enable_this_box');
						
					$("#v-wall-message").html(response);
					$("#v-wall-alert-box").click(); 
					//return false;
				}
				$("#vplease_wait_loading").html('');
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_save_wall_group_details();", 1000);
		});		
	}
}

// Preview Group Photo
function vpb_group_photo_preview(vpb_selector_) 
{
	var id = 1, last_id = last_cid = '';
	$.each(vpb_selector_.files, function(vpb_o_, file)
	{
		if (file.name.length>0) 
		{
			if (!file.type.match('image.*')) 
			{
				document.getElementById('group_pics').title = '';
				document.getElementById('group_pic').value = '';
				$('#vpb_adding_group_photo_status').html('<div class="vwarning">'+$("#invalid_file_attachment").val()+'</div>');
				return false;
			}
			else
			{
				//Clear previous previewed files and start again
				$('#vpb_adding_group_photo_status').html('');
			   $('#vpb-display-group-photo-preview').html(''); 
			   var reader = new FileReader();
			   reader.onload = function(e) 
			   {
				   $('#vpb-display-group-photo-preview').append(
				   '<div class="vpb_preview_wrapper"> \
				   <img class="vpb_image_style" src="' + e.target.result + '" title="'+ escape(file.name) +'" onClick="vpb_view_this_image(\'Photo Preview\', \''+e.target.result+'\');" style="cursor:pointer;" /><br /> \
				   </div>');
			   }
			   reader.readAsDataURL(file);
		   }
		}
		else {  return false; }
	});
}



// Update Group Picture
function vpb_update_group_picture(group_uid)
{
	var group_name = vpb_getcookie('g_name') != "" && vpb_getcookie('g_name') != null && vpb_getcookie('g_name') != undefined ? vpb_getcookie('g_name') : "Group Photo";
	
	var ext = $('#group_pic').val().split('.').pop().toLowerCase();
	
	if(group_uid == "" || group_uid == undefined || group_uid == null)
	{
		document.getElementById('group_pics').title = '';
		document.getElementById('group_pic').value = '';
		$('#vpb_adding_group_photo_status').html('<div class="vwarning">'+$("#general_system_error").val()+'</div>');
		return false;
	}
	else if($("#group_pic").val() == "") 
	{
		return false;
	}
	else if($.inArray(ext, ["jpg", "jpeg", "gif", "png"]) == -1) 
	{
		document.getElementById('group_pics').title = '';
		//document.getElementById('group_pic').value = '';
		$('#vpb_adding_group_photo_status').html('<div class="vwarning">'+$("#invalid_file_attachment").val()+'</div>'); 
		return false;
	}
	else
	{
		$("#vpb_adding_group_photo_status").html('');
		$('.vpb_progress_outer_bar').show();
		
		var formData = new FormData();
		formData.append("page", 'update-group-photo');
		formData.append("group_id", group_uid);
		formData.append("profilepic", document.getElementById('group_pic').files[0]);
		
		$.ajax({
			url: vpb_site_url+'wall-processor.php',
			type: 'POST',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			xhr: function()
			{
				var vpb_progress_percentage = $('.vpb_progress_inner_bar');
				var vpb_progress_inner_bar = $('.vpb_progress_percentage');
				if(vpb_this_xhr() == "")
				{
					vpb_progress_inner_bar.hide();
				} else {
					 var xhr = vpb_this_xhr();
					 xhr.upload.addEventListener("progress", function(e_vent)
					 {
						 if (e_vent.lengthComputable) 
						 {
							 var vpb_current_progress = e_vent.loaded / e_vent.total;
							 vpb_current_progress = parseInt(vpb_current_progress*100);
							 var vpb_totalPercentage = parseInt(vpb_current_progress)+'%';
							 vpb_progress_percentage.width(vpb_totalPercentage)
							 vpb_progress_inner_bar.html(vpb_totalPercentage);
							 
							 if(vpb_current_progress === 100) 
							 {
								 $('.vpb_progress_outer_bar').hide();
								 $("#vpb_adding_group_photo_status").html('<br>'+$("#v_loading_btn").val());
							 }
						 }
				 	}, false);
					return xhr;
				}
			},
			complete: function(xhr) 
			{
				var vpb_progress_percentage = $('.vpb_progress_inner_bar');
				var vpb_progress_inner_bar = $('.vpb_progress_percentage');
				if(vpb_this_xhr() == "")
				{
					vpb_progress_inner_bar.hide();
				} else {
					vpb_progress_percentage.width("100%");
					vpb_progress_inner_bar.html("100%");
					//xhr.responseText;
				}
			},
			success: function(response)
			{
				var response_brought = response.indexOf('completed');
				if(response_brought != -1)
				{
					var upic = response.split('&');
					document.getElementById('group_pics').title = '';
					document.getElementById('group_pic').value = '';
					$('#vpb-display-group-photo-preview').html('');
					
					$("#vpb_adding_group_photo_status").html('<div class="vsuccess">'+$('#successfully_updated_group_photo_text').val()+'</div>');
					 
					 if(upic[0] != "")
					{
						setTimeout(function() {
							var currentPic = vpb_site_url+'vpb-group-photos/'+upic[0];
							vpb_setcookie('group_uphoto', currentPic, 30);
							
							$("#vcoverPic").html('<div class="gvprofilephoto" style="background-image: url('+currentPic+');" onclick="vpb_popup_photo_box(\''+group_name+'\', 1, 1, \''+currentPic+'\');"></div>');
						},1000);
					}
					
					setTimeout(function() {
						$("#vpb_adding_group_photo_status").html('');
					},4600);
					setTimeout(function() {
						//$('.modal').modal('hide');
					},5000);
				}
				else
				{
					document.getElementById('group_pics').title = '';
					document.getElementById('group_pic').value = '';
					$('#vpb_adding_group_photo_status').html(response); 
					return false;
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_update_group_picture('"+group_uid+"');", 10000);
		});		
	}
}


// Show complete text about a group
function vpb_show_complete_text()
{
	$("#desc_box_a").hide();
	$("#desc_box_b").show();
	$('html, body').animate({
		scrollTop: $("#desc_box_wraps").offset().top-parseInt(160)+'px'
	}, 1600, 'easeInOutExpo');
}

// Show all Page Group Members
function vpb_show_group_page_members()
{
	$("#group_page_menu span").removeClass('group_menu_wrapper_active');
	$("#group_page_menu span").addClass('group_menu_wrapper');
	
	$("#g_members").removeClass('group_menu_wrapper');
	$("#g_members").addClass('group_menu_wrapper_active');
    
	$("#view_all_frnds").hide();
	
	// Hide the notification box since a call to this function can also come from the notification box
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vpb_display_wall_friend_requests").html(''); // Empty the friend requests pop up box
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	$("#vasplus_wall_friend_requests").hide(); // Hide the friends requests box on the current page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	$("#group_vides_left_box").show();
	
	//$("#vpb_display_page_owners_friends").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_videos").hide();
	$("#vasplus_group_page_members").show();
	
	$('html, body').animate({
		scrollTop: $("#vasplus_group_page_members").offset().top-parseInt(120)+'px'
	}, 1600, 'easeInOutExpo');
}
function vpb_load_more_group_page_members()
{	
	var total_group_members = $("#vtotal_group_members").val(); //The total page owner's friends
	var vpb_start = $("#vpb_group_members_start").val(); //Where to start loading the friends
	
	var vpb_total_per_load = $("#vpb_total_group_members_per_load").val(); //Total friends to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var group_id = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(total_group_members)) 
	{
		var dataString = {"vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "group_id":group_id, "page_id":page_id, "page":"load-more-group-members"}
		
		$("#vpb_load_more_group_box").hide();
		
		$("#vpb_loading_group_members").html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_group_members_outer").show();
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_group_members_outer").hide(); 
			$("#vpb_loading_group_members").html('');
			
			var total_loaded_members = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_group_members_start").val(parseInt(total_loaded_members)); 
			$("#v_this_members_totals").html(parseInt(total_loaded_members)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_group_members").prepend(
				$(response).hide().fadeIn('fast')
			);
			
			if(parseInt($("#vpb_group_members_start").val()) < parseInt(total_group_members)) 
			{ $("#vpb_load_more_group_box").show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_group_page_members();", 10000);
		});
	}
	else

	{
		//Hide load more friends buttons when there is no more friend
		$("#vpb_load_more_group_box").hide();
	}
}

function vpb_load_group_photos(the_group_name)
{
	$("#v-wall-message").html(the_group_name != "" ? '<b>'+the_group_name+'</b> '+$("#group_has_no_photo_text").val() : 'This '+$("#group_has_no_photo_text").val());
	$("#v-wall-alert-box").click();
	return false;
}


// Show all Page Group Members
function vpb_show_group_videos()
{
	$("#group_page_menu span").removeClass('group_menu_wrapper_active');
	$("#group_page_menu span").addClass('group_menu_wrapper');
	
	$("#g_videos").removeClass('group_menu_wrapper');
	$("#g_videos").addClass('group_menu_wrapper_active');
    
	$("#group_vides_left_box").hide();
	$("#view_all_frnds").show();
	
	// Hide the notification box since a call to this function can also come from the notification box
	$("#v_notifications_box").hide();
	$("#v_notifications").removeClass('vpb_notifications_icon_active');
	$("#v_notifications").addClass('vpb_notifications_icon');
	
	$("#v_message_box").hide();
	$("#v_new_messages").removeClass('vpb_notifications_icon_active');
	$("#v_new_messages").addClass('vpb_notifications_icon');
	
	$("#vpb_display_search_results").hide(); // Hide the search results pop up box
	$("#vpb_display_wall_friend_requests").html(''); // Empty the friend requests pop up box
	$("#vpb_display_friend_requests").html(''); // Remove the previous displayed friend requests from the friend requests pop up box
	$("#vpb_display_wall_find_friends").html(''); // Remove the found friends
	$("#v_friend_requests_box").hide(); // Then hide the friend requests pop up box
	$("#vasplus_wall_status_updates").hide(); // Hide the status updates box on the current page
	$("#vasplus_wall_find_friends").hide(); // Hide the find friends box on the current page
	$("#vasplus_wall_friend_requests").hide(); // Hide the friends requests box on the current page
	
	$("#vpb_display_about_page_owner").html('');
	$("#vasplus_about_page_owner").hide(); // Hide about the page owner page
	
	$("#vpb_display_notifications").html('');
	$("#vasplus_notifications").hide(); // Hide notification page
	
	$("#v_friend_requests").removeClass('vpb_notifications_icon_active');
	$("#v_friend_requests").addClass('vpb_notifications_icon');
	
	//Process is running
	$("#vpb_is_process_running").val('1');
	
	//$("#vpb_display_page_owners_friends").html($("#vpb_loading_image_gif").val()); //Show loading image
	$("#vasplus_page_owners_friends").hide();
	$("#vasplus_group_page_members").hide();
	$("#vasplus_group_page_videos").show();
	
	$('html, body').animate({
		scrollTop: $("#vasplus_group_page_videos").offset().top-parseInt(120)+'px'
	}, 1600, 'easeInOutExpo');
}
function vpb_load_more_group_videos()
{	
	var total_group_videos = $("#vtotal_group_videos").val(); //The total page owner's friends
	var vpb_start = $("#vpb_group_videos_start").val(); //Where to start loading the friends
	
	var vpb_total_per_load = $("#vpb_total_group_videos_per_load").val(); //Total friends to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	var group_id = $("#vpb_page_owner").val(); //The username of the page owner
	var page_id = $("#page_id").val(); //The page id which identifies the current page viewed
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(total_group_videos)) 
	{
		var dataString = {"vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "group_id":group_id, "page_id":page_id, "page":"load-more-group-videos"}
		
		$("#vpb_load_more_group_videos_box").hide();
		
		$("#vpb_loading_group_videos").html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_group_videos_outer").show();
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_group_videos_outer").hide(); 
			$("#vpb_loading_group_videos").html('');
			
			var total_loaded_videos = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_group_videos_start").val(parseInt(total_loaded_videos)); 
			$("#v_this_videos_totals").html(parseInt(total_loaded_videos)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_group_videos").prepend(
				$(response).hide().fadeIn('fast')
			);
			
			if(parseInt($("#vpb_group_videos_start").val()) < parseInt(total_group_videos)) 
			{ $("#vpb_load_more_group_videos_box").show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_group_videos();", 10000);
		});
	}
	else

	{
		//Hide load more friends buttons when there is no more friend
		$("#vpb_load_more_group_videos_box").hide();
	}
}

//Join group sending requests function
function vpb_send_request_to_join_group(group_id, group_manager, username, action)
{
	if(group_id == "" || group_manager == "" || username == "" || action == "") 
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		var unknow_request = 0;
		if(action == "join")
		{
			$("#group_join_"+group_id).hide();
			$("#group_requestsent_"+group_id).show();
		}
		else if(action == "cancel")
		{
			$("#group_requestsent_"+group_id).hide();
			$("#group_join_"+group_id).show();
		}
		else
		{
			unknow_request = 1
		}
		
		if(parseInt(unknow_request) == 1)
		{
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else
		{
			var dataString = {"group_id":group_id, "group_manager":group_manager, "username":username, "action":action, "page":"request-to-join-group"};
		
			$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
			{
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 ) {}
				else
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
			}).fail(function(error_response) 
			{
				setTimeout("vpb_send_request_to_join_group('"+parseInt(group_id)+"', '"+group_manager+"', '"+username+"', '"+action+"');", 10000);
			});
		}
	}
}
function vpb_send_request_to_join_groups(group_id, group_manager, username, action)
{
	if(group_id == "" || group_manager == "" || username == "" || action == "") 
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		var unknow_request = 0;
		if(action == "join")
		{
			$("#groups_join_"+group_id).hide();
			$("#groups_requestsent_"+group_id).show();
		}
		else if(action == "cancel")
		{
			$("#groups_requestsent_"+group_id).hide();
			$("#groups_join_"+group_id).show();
		}
		else
		{
			unknow_request = 1
		}
		
		if(parseInt(unknow_request) == 1)
		{
			$("#v-wall-message").html($("#general_system_error").val());
			$("#v-wall-alert-box").click(); 
			return false;
		}
		else
		{
			var dataString = {"group_id":group_id, "group_manager":group_manager, "username":username, "action":action, "page":"request-to-join-group"};
		
			$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
			{
				var response_brought = response.indexOf('process_completed');
				if( response_brought !=- 1 ) {}
				else
				{
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click(); 
					return false;
				}
			}).fail(function(error_response) 
			{
				setTimeout("vpb_send_request_to_join_groups('"+parseInt(group_id)+"', '"+group_manager+"', '"+username+"', '"+action+"');", 10000);
			});
		}
	}
}


//Join group sending requests function
function vpb_allow_deny_request_to_join_group(group_id, username, action)
{
	if(group_id == "" || username == "" || action == "") 
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	} 
	else 
	{
		$("#request_pending_"+username+group_id).hide();
		$("#request_resolved_"+username+group_id).show();
		
		var dataString = {"group_id":group_id, "username":username, "action":action, "page":"allow-deny-request-to-join-group"};
	
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var response_brought = response.indexOf('process_completed');
			if( response_brought !=- 1 ) {}
			else
			{
				$("#v-wall-message").html($("#general_system_error").val());
				$("#v-wall-alert-box").click(); 
				return false;
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_allow_deny_request_to_join_group('"+parseInt(group_id)+"', '"+username+"', '"+action+"');", 10000);
		});
	}
}


// Conform before removing a friend from the tagged list
function vpb_confirm_delete_current_group_details(group_id, group_manager, group_name)
{
	$("#dgroupid").val(group_id);
	$("#dgroupmanager").val(group_manager);
	$("#dgroupname").val(group_name);
	$("#delete_group_message_text").html($("#group_delete_message_text").val()+' <b>'+group_name+'</b>?');
	$("#v-delete-this-group-alert-box").click();
}

function vpb_delete_this_group_now() 
{
	var group_id = $("#dgroupid").val();
	var group_manager = $("#dgroupmanager").val();
	var group_name = $("#dgroupname").val();
	
	var dataString = {"group_id": group_id, "group_manager": group_manager, "group_name": group_name, "page":"delete_this_group"};
	
	$.ajax({
		type: "POST",
		url: vpb_site_url+'wall-processor.php',
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			vpb_show_status_updates();
			$("#vasplus_wall_status_updates").hide();
			
			$("#not_deleting_group").hide();
			$("#deleting_group").html($("#vpb_loading_image_gif").val());
			
			$('html, body').animate({
				scrollTop: $("#deleting_group").offset().top-parseInt(120)+'px'
			}, 1600, 'easeInOutExpo');
		},
		success: function(response) 
		{
			var response_brought = response.indexOf('no_proper_data');
			if(response_brought != -1)
			{
				$("#deleting_group").html('');
				$("#not_deleting_group").show();
				$("#vasplus_wall_status_updates").show();
				$("#v-wall-message").html($("#general_system_error").val());
				$("#v-wall-alert-box").click();
				
			}
			else
			{
				window.location.replace(vpb_site_url+'wall/'+group_manager);
			}
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_delete_this_group_now();", 10000);
	});
}



function vpb_confirm_stay_or_leave_a_group(group_id, group_manager, group_name, username, action, type) 
{
	var dataString = {"group_id": group_id, "group_manager": group_manager, "group_name": group_name, "username": username, "action": action, "page":"confirm_stay_or_leave_this_group"};
	
	if(group_id == "" || group_manager == "" || group_name == "" || username == "" || action == "")
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				if(action == "stay")
				{
					if(type == "top")
					{
						$("#vpb_top_group_confirmation_box").hide();
						$("#vleavethisgroup_1").fadeIn();
					}
					else
					{
						$("#vpb_top_group_confirmation_box").html($("#vpb_loading_image_gif").val());
					}
				}
				else
				{
					$("#vpb_top_group_confirmation_box").html($("#vpb_loading_image_gif").val());
				}
			},
			success: function(response) 
			{
				var response_brought = response.indexOf('no_proper_data');
				if(response_brought != -1)
				{
					$("#vpb_top_group_confirmation_box").html('');
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click();
				}
				else
				{
					if(action == "stay"){}
					else {
						window.location.replace(vpb_site_url+'wall/'+group_manager);
					}
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_confirm_stay_or_leave_a_group('"+parseInt(group_id)+"', '"+group_manager+"', '"+group_name+"', '"+username+"', '"+action+"', '"+type+"');", 10000);
		});
	}
}

function vpb_confirm_leave_a_group(group_id, group_manager, group_name, username, action, type)
{
	$("#leave_group_id").val(group_id);
	$("#leave_group_manager").val(group_manager);
	$("#leave_group_name").val(group_name);
	$("#leave_group_user").val(username);
	$("#leave_group_action").val(action);
	$("#leave_group_message_text").html($("#group_leave_message_text").val()+'<b>'+group_name+'</b>?');
	$("#v-leave-this-group-alert-box").click();
}

function vpb_leave_this_group_now() 
{
	var group_id = $("#leave_group_id").val();
	var group_manager = $("#leave_group_manager").val();
	var group_name = $("#leave_group_name").val();
	var username = $("#leave_group_user").val();
	var action = $("#leave_group_action").val();
	var type = "leave";
	
	var dataString = {"group_id": group_id, "group_manager": group_manager, "group_name": group_name, "username": username, "action": action, "page":"confirm_stay_or_leave_this_group"};
	
	if(group_id == "" || group_manager == "" || group_name == "" || username == "" || action == "")
	{
		$("#v-wall-message").html($("#general_system_error").val());
		$("#v-wall-alert-box").click(); 
		return false;
	}
	else
	{
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#vleavethisgroup_1").hide();
				$("#vpb_loading_to_leave_the_group").html('<div class="vpb_top_group_info_box">'+$("#vpb_loading_image_gif").val()+'</div>');
			},
			success: function(response) 
			{
				var response_brought = response.indexOf('no_proper_data');
				if(response_brought != -1)
				{
					$("#vpb_loading_to_leave_the_group").html('');
					$("#v-wall-message").html($("#general_system_error").val());
					$("#v-wall-alert-box").click();
				}
				else
				{
					window.location.replace(vpb_site_url+'wall/'+group_manager);
				}
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_leave_this_group_now();", 10000);
		});
	}
}

	  
	  
// Show report this group box
function vpb_shoq_report_this_group_box(fullname, username, email, group_id, group_name)
{
	$("#the_groupID").val(group_id);
	$("#the_groupNamed").val(group_name);
	$('#report-this-group').modal('show');
}

// Report a post
function vpb_report_the_group(session_fullname, session_username, session_email)
{
	var group_id = $("#the_groupID").val();
	var group_name = $("#the_groupNamed").val();
	
	var report_group_data = vpb_trim($("#report_group_data").val());
	
	if(group_id == "" || session_fullname == "" || session_username == "" || session_email == "" || group_name == "")
	{
		$("#report_group_status").html('<div class="vwarning">'+$("#general_system_error").val()+'</div>');
		return false;
	}
	else if(report_group_data == "")
	{
		$("#report_group_data").focus();
		$("#report_group_status").html('<div class="vwarning">'+$("#empty_reporting_post_field_text").val()+'</div>');
		return false;
	}
	else if(report_group_data.length < 5)
	{
		$("#report_group_data").focus();
		$("#report_group_status").html('<div class="vwarning">'+$("#not_enough_reporting_post_field_text").val()+'</div>');
		return false;
	}
	else
	{
		var dataString = {'group_id':group_id, 'group_name':group_name, 'session_fullname':session_fullname, 'session_username':session_username, 'session_email':session_email, 'report_group_data':report_group_data, 'page':'report-a-group'};
		
		$("#report_group_status").html('<center><div align="center"><img style="margin-top:10px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
		
		$("#report-this-group").removeClass('enable_this_box');
		$("#report-this-group").addClass('disable_this_box');
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#report-this-group").removeClass('disable_this_box');
			$("#report-this-group").addClass('enable_this_box');
		
			var response_brougght = response.indexOf('completed_successfuly');
			if(response_brougght != -1)
			{
				$("#report_group_status").html('<div class="vsuccess">'+$("#report_send_successfully_message").val()+'</div>');
				$("#report_group_data").val('');
				setTimeout(function() {
					$('.modal').modal('hide');
					$("#report_group_status").html('');
				},10000);
				return false;
			}
			else
			{
				$("#report_group_status").html(response);
				return false;
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_report_the_group('"+session_fullname+"', '"+session_username+"', '"+session_email+"');", 10000);
		});	
	}
}

//Groups pagination
function vpb_load_more_groups()
{	
	var vtotal_groups = $("#vtotal_groups").val(); //The total page owner's friends
	var vpb_start = $("#vpb_groups_start").val(); //Where to start loading the friends
	
	var vpb_total_per_load = $("#vpb_total_groups_per_load").val(); //Total friends to load each time
	var session_uid = $("#session_uid").val(); //The username of the current logged in user
	
	//There are still more records to load
	if(parseInt(vpb_start) <= parseInt(vtotal_groups)) 
	{
		var dataString = {"vpb_start":vpb_start, "vpb_total_per_load":vpb_total_per_load, "session_uid":session_uid, "page":"load-more-groups"}
		
		$("#vpb_load_more_group_box").hide();
		
		$("#vpb_loading_group_members").html($("#v_loading_btn").val()); //Show loading image
		$("#vpb_loading_group_members_outer").show();
					
		$.post(vpb_site_url+'wall-processor.php', dataString, function(response)
		{
			//Hide the loading image after loading data onto the page
			$("#vpb_loading_group_members_outer").hide(); 
			$("#vpb_loading_group_members").html('');
			
			var total_loaded_members = parseInt(vpb_start)+parseInt(vpb_total_per_load);
			
			$("#vpb_groups_start").val(parseInt(total_loaded_members)); 
			$("#v_this_members_totals").html(parseInt(total_loaded_members)); 
			
			//Append the received data unto the current page
			$("#vpb_loaded_group_members").prepend(response).hide().fadeIn('fast');
			
			if(parseInt($("#vpb_groups_start").val()) < parseInt(vtotal_groups)) 
			{ $("#vpb_load_more_group_box").show();  }
			else {}
			
		}).fail(function(xhr, ajaxOptions, theError) 
		{	
			setTimeout("vpb_load_more_groups();", 10000);
		});
	}
	else

	{
		//Hide load more friends buttons when there is no more friend
		$("#vpb_load_more_group_box").hide();
	}
}

function vpb_admin_time()
{
	var currentTime = new Date();
	
	var day = currentTime.getDate();
	var month = currentTime.getMonth() + 1;
	var year = currentTime.getFullYear();
	
	var the_date = day + "/" + month + "/" + year;
	
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();
	
	if (minutes < 10)
	{
		minutes = "0" + minutes
	}
	var the_time = parseInt(hours) > 11 ? hours + ":" + minutes + ":" + seconds + " PM" : hours + ":" + minutes + ":" + seconds + " AM";
	
	$("#vpb_display_timw").html(the_date+' - '+the_time);
	
	setTimeout(vpb_admin_time, 1000);
}

// Load and display post likes
function vpb_load_post_shares(post_id, username, label) 
{
	var dataString = {'page':'load_people_who_shared_post', 'post_id': post_id, 'username': username};
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		beforeSend: function() 
		{
			$("#vpb_system_data_title").html(label);
			$("#vpb_display_wall_gen_data").html($("#v_loading_btn").val());
			$("#v-wall-g-data-alert-box").click();
		},  
		success: function(response)
		{
			$("#vpb_display_wall_gen_data").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_load_post_shares('"+parseInt(post_id)+"', '"+username+"', '"+label+"');", 10000);
	});
}

function vpb_security_check_points()
{
	// This is the security check point
	if(vpb_getcookie('session_user_data') != "" && vpb_getcookie('session_user_data') != undefined && vpb_getcookie('session_user_data') != null)
	{
		if(vpb_getcookie('vpb_ckpoint') != "" && vpb_getcookie('vpb_ckpoint') != undefined && vpb_getcookie('vpb_ckpoint') != null)
		{
			var dataString = {"session_user_id":vpb_getcookie('session_user_data'), "page":"system_security_check_points"}
		
			$.post(vpb_site_url+'wall-processor.php', dataString, function(responseData)
			{
				if(responseData == vpb_getcookie('vpb_ckpoint')) 
				{ /* This is a valid login session */ }
				else
				{
					// The user has changed the session username to a different name therefore, take them out
					vpb_log_user_off(vpb_site_url+'login/user-session-has-expired');
					return false;
				}
			}).fail(function(xhr, ajaxOptions, theError) 
			{	
				setTimeout("vpb_security_check_points();", 10000);
			});
		}
		else
		{
			// No proper session is created therefore, take the user out to login properly
			vpb_log_user_off(vpb_site_url+'login/user-session-has-expired');
			return false;
		}
	}
	else {}
}


function vpb_get_all_the_groups_members() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_group_members_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "total_per_load":total_per_load, "page":"vpb_get_all_the_groups_members"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_groups_members").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_groups_members").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_groups_members();", 10000);
	});
}
function vpb_get_all_the_groups_videos() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_group_videos_per_load").val(); //Total videos to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "total_per_load":total_per_load, "page":"vpb_get_all_the_groups_videos"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_groups_videos").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_groups_videos").html(response);
			
			vpb_get_all_the_groups_members();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_groups_videos();", 10000);
	});
}
function vpb_get_all_the_group_confirmations_box() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_group_confirmations_box"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() {},  
		success: function(response)
		{
			$("#vpb_get_all_the_group_confirmations_box").html(response);
			
			vpb_get_all_the_groups_videos();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_group_confirmations_box();", 10000);
	});
}
function vpb_get_all_the_group_confirmation_box() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_group_confirmation_box"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() {},  
		success: function(response)
		{
			$("#vpb_get_all_the_group_confirmation_box").html(response);
			
			vpb_get_all_the_group_confirmations_box();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_group_confirmations_box();", 10000);
	});
}
function vpb_get_all_the_group_videos() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_group_videos_per_load").val(); //Total videos to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "total_per_load":total_per_load, "page":"vpb_get_all_the_group_videos"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_group_videos").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_group_videos").html(response);
			
			vpb_get_all_the_group_confirmation_box();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_group_videos();", 10000);
	});
}
function vpb_get_all_the_group_photos() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "total_per_load":total_per_load, "page":"vpb_get_all_the_group_photos"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_group_photos").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_group_photos").html(response);
			
			vpb_get_all_the_group_videos();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_group_photos();", 10000);
	});
}
function vpb_get_all_the_group_members() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "total_per_load":total_per_load, "page":"vpb_get_all_the_group_members"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_group_members").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_group_members").html(response);
			
			vpb_get_all_the_group_photos();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_group_members();", 10000);
	});
}
function vpb_get_all_the_users_grouped() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_users_grouped"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			//$("#vpb_get_all_the_users_grouped").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_users_grouped").html(response);
			
			vpb_get_all_the_group_members();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_users_grouped();", 10000);
	});
}
function vpb_get_all_the_users_groups() 
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_users_groups"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_users_groups").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_users_groups").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_users_groups();", 10000);
	});
}
function vpb_get_all_the_user_videos()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_user_videos"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_user_videos").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_user_videos").html(response);
			
			vpb_get_all_the_users_groups();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_user_videos();", 10000);
	});
}
function vpb_get_all_the_user_photos()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_user_photos"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_user_photos").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_user_photos").html(response);
			
			vpb_get_all_the_user_videos();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_user_photos();", 10000);
	});
}
function vpb_get_all_the_users_friends()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "start":"default", "zero":"1", "total_per_load":total_per_load, "page":"vpb_get_all_the_users_friends"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_users_friends").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_users_friends").html(response);
			
			vpb_get_all_the_user_photos();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_users_friends();", 10000);
	});
}
function vpb_get_all_the_user_friends()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "start":"start", "zero":"0", "total_per_load":total_per_load, "page":"vpb_get_all_the_user_friends"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_user_friends").html('<div style="padding:10px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_user_friends").html(response);
			
			vpb_get_all_the_users_friends();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_user_friends();", 10000);
	});
}

function vpb_get_all_the_user_groups()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	var total_per_load = $("#vpb_total_friends_per_load").val(); //Total friends to load each time
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_get_all_the_user_groups"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_get_all_the_user_groups").html('<div style="padding:10px;padding-bottom:0px;">'+$("#v_loading_btn").val()+'</div>');
		},  
		success: function(response)
		{
			$("#vpb_get_all_the_user_groups").html(response);
			
			vpb_get_all_the_user_friends();
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_get_all_the_user_groups();", 10000);
	});
}

function vpb_show_friendship_button()
{
	var session_username = $("#session_uid").val(); //The username of the current logged in user
	var page_username = $("#vpb_page_owner").val(); //The username of the page owner
	
	var dataString = {"page_username":page_username, "session_username":session_username, "page":"vpb_show_friendship_button"};
	
	$.ajax({  
		type: "POST",  
		url: vpb_site_url+'wall-processor.php',  
		data: dataString,
		cache: false,
		beforeSend: function() 
		{
			$("#vpb_show_friendship_button").html($("#v_loading_btn").val());
		},  
		success: function(response)
		{
			$("#vpb_show_friendship_button").html(response);
		}
	}).fail(function(error_response) 
	{
		setTimeout("vpb_show_friendship_button();", 10000);
	});
}

function vpb_show_post_bg()
{
	$('#vpb_close_post_box').show();
	$('.post_box_bg').show();
	$('#v_status_update_box').addClass('fixed_post_box');
	$('#vpb_status_update_wraps').addClass('fixed_post_wraps');
}

function vpb_close_post_box()
{
	$('#vpb_close_post_box').hide();
	$('.post_box_bg').hide();
	$('#vpb_status_update_wraps').removeClass('fixed_post_wraps');
	$('#v_status_update_box').removeClass('fixed_post_box');
}