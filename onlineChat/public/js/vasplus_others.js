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

function vpb_trim(s)
{
	return s.replace(/^\s+|\s+$/, '');
}

function vpb_setcookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

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

function vpb_removecookie(name) 
{
    vpb_setcookie(name,"",-1);
}

//vpb_setcookie('myCookie', 'The value of the cookie', 7)
//var myCookie = vpb_getcookie('myCookie');
//vpb_removecookie('myCookie')

function vpb_IE_detected()
{
    var ua = window.navigator.userAgent;
    var old_ie = ua.indexOf('MSIE ');
    var new_ie = ua.indexOf('Trident/');

    if ((old_ie > -1) || (new_ie > -1)) 
	{
        return true;
    } else {
		return false;
	}
}


// Password Request Link Sending
function vpb_request_password_link()
{
	var ue_data = $("#ue_data").val();
	
	if(ue_data == "")
	{
		$("#ue_data").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_username_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#ue_data').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	} else {
		var dataString = {'ue_data': ue_data, 'page':'reset-password-validation'};
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#this_page_errors").html('');
				$("#disable_or_enable_this_box").removeClass('enable_this_box');
				$("#disable_or_enable_this_box").addClass('disable_this_box');
				
				$("#forgot_password_buttoned").hide();
				$("#log_in_status").html('<center><div align="center"><img style="margin-top:-40px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
			},
			success: function(response)
			{
				$("#disable_or_enable_this_box").removeClass('disable_this_box');
				$("#disable_or_enable_this_box").addClass('enable_this_box');
		
				$("#log_in_status").html('');
				$("#forgot_password_buttoned").show();
					
				var response_brought = response.indexOf("process-completed-status");
				if(response_brought != -1)
				{
					$("#ue_data").val('');
					$("#this_page_errors").html(response);
					return false;
				}
				else
				{
					$("#this_page_errors").html(response);
					return false;
				}
			}
		});
	}
}


// Change Password
function vpb_change_password_now()
{
	var ue_data = $("#ue_data").val();
	var new_pass = $("#new_pass").val();
	var verify_pass = $("#verify_pass").val();
	
	if(ue_data == "")
	{
		$("#ue_data").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#ussername_not_found_text").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#ue_data').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	} 
	else if(new_pass == "")
	{
		$("#new_pass").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#new_password_field_blank_text").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#new_pass').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	} 
	else if(verify_pass == "")
	{
		$("#verify_pass").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#verify_new_password_field_blank_text").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#verify_pass').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	} 
	else if(verify_pass != new_pass)
	{
		$("#verify_pass").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#verify_and_new_password_field_not_match_text").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#verify_pass').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	} 
	else 
	{
		var dataString = {'ue_data': ue_data, 'new_pass': new_pass, 'verify_pass': verify_pass, 'page':'change-user-password'};
		$.ajax({
			type: "POST",
			url: vpb_site_url+'wall-processor.php',
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#this_page_errors").html('');
				$("#disable_or_enable_this_box").removeClass('enable_this_box');
				$("#disable_or_enable_this_box").addClass('disable_this_box');
				
				$("#login_buttoned").hide();
				$("#log_in_status").html('<center><div align="center"><img style="margin-top:-40px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
			},
			success: function(response)
			{
				$("#disable_or_enable_this_box").removeClass('disable_this_box');
				$("#disable_or_enable_this_box").addClass('enable_this_box');
		
				$("#log_in_status").html('');
				$("#login_buttoned").show();
					
				var response_brought = response.indexOf("process-completed-status");
				if(response_brought != -1)
				{
					$("#new_pass").val('');
	                $("#verify_pass").val('');
					$("#this_page_errors").html('<div class="vsuccess" align="left">'+$("#password_changed_successfully_text").val()+'</div>');
					return false;
				}
				else
				{
					$("#this_page_errors").html(response);
					return false;
				}
			}
		});
	}
}



// Users Login
function vpb_login()
{
	var ue_data = vpb_trim($("#ue_data").val());
	var uep_data = vpb_trim($("#uep_data").val());
	
	if(ue_data == "" || ue_data == "Username")
	{
		$("#ue_data").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_username_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#ue_data').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else if(uep_data == "" || uep_data == "Password")
	{
		$("#uep_data").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_password_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#uep_data').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else
	{
		var dataString = {'ue_data':ue_data, 'uep_data':uep_data, 'page':'users-log-in'};
		
		$("#this_page_errors").html('');
		$("#disable_or_enable_this_box").removeClass('enable_this_box');
		$("#disable_or_enable_this_box").addClass('disable_this_box');
		
		$("#login_buttoned").hide();
		$("#log_in_status").html('<center><div align="center"><img style="margin-top:-40px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
		
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			var vlog = JSON.parse(response); // this contains the json data from the php file
			
			var vasplus_response_brougght_a = response.indexOf('user-is-validated');
			if(vasplus_response_brougght_a != -1)
			{
				if(vlog.fullname && vlog.email && vlog.passwd)
				{
					// Remember field was checked
					if($("#vpb_checkbox").is(':checked')) {
						 vpb_setcookie('session_user_datas', ue_data, 90);
						 vpb_setcookie('uep_datas', uep_data, 90);
					} 
					else if(vpb_IE_detected())
					{
						vpb_setcookie('session_user_datas', ue_data, 90);
						vpb_setcookie('uep_datas', uep_data, 90);
					}
					else { }
					
					vpb_setcookie('session_user_data', ue_data, 90);
					vpb_setcookie('user_status_data', ue_data, 90);
					vpb_setcookie('csname', vlog.fullname, 90);
					vpb_setcookie('csemail', vlog.email, 90);
					vpb_setcookie('uep_data', uep_data, 90);
					vpb_setcookie('vpb_ckpoint', vlog.passwd, 90);
					
					if(vpb_getcookie('last_visited_url') != "" && vpb_getcookie('last_visited_url') != null && vpb_getcookie('last_visited_url') != undefined)
					{
						setTimeout(function() {
							window.location.replace(vpb_getcookie('last_visited_url')); 
						},500);
					}
					else
					{
						setTimeout(function() {
							window.location.replace(vpb_site_url+'feeds/'); 
						},500);
					}
					$("#ue_data").val('');
					$("#uep_data").val('');
					return false;
				}
				else
				{
					$("#disable_or_enable_this_box").removeClass('disable_this_box');
					$("#disable_or_enable_this_box").addClass('enable_this_box');
			
					$("#log_in_status").html('');
					$("#login_buttoned").show();
					
					//$("#uep_data").focus();
					$("#this_page_errors").html(vlog.error);
					$('html, body').animate({
						scrollTop: $('#uep_data').offset().top-parseInt(200)+'px'
					}, 1600);
				}
			}
			else
			{
				$("#disable_or_enable_this_box").removeClass('disable_this_box');
				$("#disable_or_enable_this_box").addClass('enable_this_box');
		
				$("#log_in_status").html('');
				$("#login_buttoned").show();
				
				//$("#uep_data").focus();
				$("#this_page_errors").html(vlog.error);
				$('html, body').animate({
					scrollTop: $('#uep_data').offset().top-parseInt(200)+'px'
				}, 1600);
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_login();", 2000);
		});
	}
}

// Validate email addresses
function email_is_valid(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
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


//Sign Up
function vpb_sign_up()
{
	var sfullname = $("#sfullname").val();
	var susername = $("#susername").val();
	var semail = $("#semail").val();
	var spass = $("#spass").val();
	var vpb_ucounty = $("#vpb_ucounty").val();
	
	
	if(sfullname == "")
	{
		$("#sfullname").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_fullname_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#sfullname').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else if(susername == "")
	{
		$("#susername").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_username_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#susername').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else if(semail == "")
	{
		$("#semail").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_email_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#semail').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else if(semail != "" && !email_is_valid(semail))
	{
		$("#semail").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#invalid_email_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#semail').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else if(spass == "")
	{
		$("#spass").focus();
		$("#this_page_errors").html('<div class="vwarning">'+$("#empty_password_field").val()+'</div>');
		$('html, body').animate({
			scrollTop: $('#spass').offset().top-parseInt(200)+'px'
		}, 1600);
		return false;
	}
	else
	{
		var dataString = {"sfullname":sfullname, "susername":susername, "semail":semail, "spass":spass, "vpb_ucounty":vpb_ucounty, "page":"user-sign-up"};
		
		
		$("#this_page_errors").html('');
		$("#disable_or_enable_this_box").removeClass('enable_this_box');
		$("#disable_or_enable_this_box").addClass('disable_this_box');
		
		$("#signup_buttons").hide();
		$("#sign_up_status").html('<center><div align="center"><img style="margin-top:-40px;" src="'+vpb_site_url+'img/loadings.gif" align="absmiddle"  alt="Loading" /></div></center>');
		
			
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#disable_or_enable_this_box").removeClass('disable_this_box');
			$("#disable_or_enable_this_box").addClass('enable_this_box');
			
			var response_brought = response.indexOf('process-completed-status');
			if(response_brought != -1)
			{
				var responseData = response.split('|');
				var checkPoint = responseData[1];
				
				if(checkPoint != "")
				{
					$("#this_page_errors").html('');
					
					$("#sfullname").val('');
					$("#semail").val('');
					$("#susername").val('');
					
					$("#spass").val('');
					
					if(vpb_IE_detected())
					{
						vpb_setcookie('session_user_datas', susername, 90);
						 vpb_setcookie('uep_datas', spass, 90);
					}
					else { }
					vpb_setcookie('session_user_data', susername, 90);
					vpb_setcookie('uep_data', spass, 1);
					vpb_setcookie('user_status_data', susername, 90);
					vpb_setcookie('csname', sfullname, 90);
					vpb_setcookie('csemail', semail, 90);
					vpb_setcookie('vpb_ckpoint', checkPoint, 90);
					
					setTimeout(function() {
						window.location.replace(vpb_site_url+'feeds/'+susername); 
					},500);
					return false;
				}
				else
				{
					$("#sign_up_status").html('');
					$("#signup_buttons").show();
						
					$("#this_page_errors").html('Sorry, there was a general system error. Please refresh this page and try again.');
					return false;
				}
			}
			else
			{
				$("#sign_up_status").html('');
				$("#signup_buttons").show();
					
				$("#this_page_errors").html(response);
				return false;
			}
		}).fail(function(error_response) 
		{
			setTimeout("vpb_sign_up();", 2000);
		});
	}
}



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
	
	var cookie = document.cookie.split(';');
	for (var i = 0; i < cookie.length; i++) 
	{
		var chip = cookie[i],
		entry = chip.split("="),
		name = entry[0];
		document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	setTimeout(function() {
		window.location.replace(url);
	},500);
}

function vpb_contact_us_now()
{
	var fname = vpb_trim($("#fname").val());
	var uname = vpb_trim($("#uname").val());
	var femail = vpb_trim($("#femail").val());
	var fsubject = vpb_trim($("#fsubject").val());
	var fmessage = vpb_trim($("#fmessage").val());
	
	if(fname == "")
	{
		$("#fname").val('').focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_a_text").val()+'</div>');
	}
	else if(uname == "")
	{
		$("#uname").val('').focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_b_text").val()+'</div>');
	}
	else if(femail == "")
	{
		$("#femail").val('').focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_c_text").val()+'</div>');
	}
	else if(!email_is_valid(femail))
	{
		$("#femail").focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_d_text").val()+'</div>');
	}
	else if(fsubject == "")
	{
		$("#fsubject").val('').focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_e_text").val()+'</div>');
	}
	else if(fmessage == "")
	{
		$("#fmessage").val('').focus();
		$('#contact_status').html('<div class="vwarning">'+$("#ct_error_f_text").val()+'</div>');
	}
	else
	{
		var dataString = {'fname':fname, 'uname':uname, 'femail':femail, 'fsubject':fsubject, 'fmessage':fmessage, 'page':'contact-us-for-help'};
		
		$("#no_waiting").hide();
		$("#waiting").show();
		
		$("#contact_status").html('<center><div align="center"><img style="margin:10px;" src="'+vpb_site_url+'img/loading.gif" align="absmiddle"  title="Loading..." /></div></center>');
		
		$.post(vpb_site_url+'wall-processor.php', dataString,  function(response) 
		{
			$("#waiting").hide();
			$("#no_waiting").show();
		
			var respons_brought = response.indexOf('vsuccess');
			if(respons_brought != -1)
			{
				$("#uname").val('');
				$("#fname").val('');
				$("#femail").val('');
				$("#fsubject").val('').change();
				$("#fmessage").val('');
				$("#contact_status").html(response);
				$("textarea#fmessage").animate({
						"height": "80px"
				}, "fast" );
				$('html, body').stop().animate({
					scrollTop: 0
			    }, 1500, 'easeInOutExpo');
				$("#fmessage").val(' ').change();
				setTimeout(function() { $("#contact_status").html(''); },8000);
				return false;
			}
			else
			{
				$("#contact_status").html(response);
				return false;
			}
			
		}).fail(function(error_response) 
		{
			setTimeout("vpb_contact_us_now();", 1000);
		});
	}
}




$(function()
{
	$('#vas-scroll-to-top').hide();

	$(window).scroll(function () 
	{
		if ($(this).scrollTop() > 100) 
		{
			$('#vas-scroll-to-top').fadeIn();
		} else {
			$('#vas-scroll-to-top').fadeOut();
		}
	});
	
	$('#vpb_checkbox').click(function (e) 
	{
		if($("#vpb_checkbox").is(':checked')) {} 
		else if(vpb_getcookie('session_user_datas') && vpb_getcookie('uep_datas')) {
			vpb_removecookie('session_user_datas');
			vpb_removecookie('uep_datas');
			$("#ue_data").val('');
	        $("#uep_data").val('');
		}
		else {}
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
	
	
});