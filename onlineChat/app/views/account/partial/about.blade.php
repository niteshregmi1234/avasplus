
<div class="vprofile_about_detail" id="page_fullname_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Fullname</div>
<div class="vprofile_about_desc">
{{$data['fullname']}}</div>
</div>

<div id="page_fullname_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Fullname</span>
<input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="epage_fullname" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value="{{$data['fullname']}}">
</div>
<br clear="all"><br clear="all">

<div class="vprofile_about_detail" id="page_username_text" style="min-width:100%;display:inline-block;">
    <div class="vmiddle_about_title">Username</div>
    <div class="vprofile_about_desc">
        {{$data['username']}} </div>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<div class="vprofile_about_detail" id="page_email_text" style="min-width:100%;display:inline-block;">
<div class="vmiddle_about_title">Email Address</div>
<div class="vprofile_about_desc">
{{$data['email']}} </div>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">


<div class="vprofile_about_detail" id="about_us_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">About {{explode(" ",$data['fullname'])[0]}}</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['about_us'])?'No information provided yet':$data['about_us']}}</font>            </div>
</div>

<div id="about_us_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon"><label style="margin:0px; padding:0px; line-height: normal; font-weight:normal; cursor:pointer;font-weight:bold" for="eabout_us">Who are you?</label></span>
<textarea style="border-radius: 0px;" class="form-control" id="eabout_us" placeholder="Write brief introduction about your self..." autocomplete="off" autocorrect="off" autocapitalize="off" >{{empty($data['about_us'])?"":$data['about_us']}}</textarea>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">$("#eabout_us").expanding();</script>



<div class="vprofile_about_detail" id="favorite_quotes_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Favorite Quotes</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['favorite_quotes'])?'No information provided yet':$data['favorite_quotes']}}</font>            </div>
</div>

<div id="favorite_quotes_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon"><label style="margin:0px; padding:0px; line-height: normal; font-weight:normal; cursor:pointer;font-weight:bold" for="efavorite_quotes">What are your favorite quotes?</label></span>
<textarea style="border-radius: 0px;" class="form-control" id="efavorite_quotes" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off">{{empty($data['favorite_quotes'])?"":$data['favorite_quotes']}}</textarea>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">$("#efavorite_quotes").expanding();</script>


<div class="vprofile_about_detail" id="marital_status_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Relationship Status</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['marital_status'])?'No information provided yet':$data['marital_status']}}</font>            </div>
</div>

<div id="marital_status_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Relationship Status</span>

<select id="emarital_status" style="min-width: 100%; text-align: left; float: left;">

<?php if(empty($data['marital_status'])){
      echo   "<option value=\"\">Select an option</option>";

 } else{
echo "<option value=\"$data[marital_status]\">$data[marital_status]</option>
       <option value=\"\">Select an option</option>";
}?>

<option value="Single">Single</option>

<option value="In a relationship">In a relationship</option>

<option value="Engaged">Engaged</option>

<option value="Married">Married</option>

<option value="In a civil union">In a civil union</option>

<option value="In a domestic partnership">In a domestic partnership</option>

<option value="In an open relationship">In an open relationship</option>

<option value="It's complicated">It's complicated</option>

<option value="Separated">Separated</option>

<option value="Divorced">Divorced</option>

<option value="Widowed">Widowed</option>
</select>

<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">
$("#emarital_status").select2();
</script>




<div class="vprofile_about_detail" id="address_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Address</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['address'])?'No information provided yet':$data['address']}}</font>            </div>
</div>

<div id="address_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon"><label style="margin:0px; padding:0px; line-height: normal; font-weight:normal; cursor:pointer;font-weight:bold" for="eaddress">What's your address?</label></span>
<textarea style="border-radius: 0px;" class="form-control" id="eaddress" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off">{{empty($data['address'])?"":$data['address']}}</textarea>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">$("#eaddress").expanding();</script>


<div class="vprofile_about_detail" id="phone_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Phone Number(s)</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['phone'])?'No information provided yet':$data['phone']}}</font></div>
</div>

<div id="phone_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">What are your phone number(s)?</span>
<input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ephone" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['phone'])?"":$data['phone']}}>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="gender_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Gender</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['gender'])?'No information provided yet':$data['gender']}}</font></div>
</div>

<div id="gender_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Gender</span>
<select id="egender" style="min-width: 100%; text-align: left; float: left;" >
<?php if(empty($data['gender'])){
echo "<option value=\"\">Select an option</option>";
 } else{
echo "<option value=\"$data[gender]\">$data[gender]</option>
<option value=\"\">Select an option</option>";
}?>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>

<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">
$("#egender").select2();
</script>

<div class="vprofile_about_detail" id="interested_in_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Interested in</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['interested_in'])?'No information provided yet':$data['interested_in']}}</font></div>
</div>

<div id="interested_in_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Interested in</span>

<select id="einterested_in" style="min-width: 100%; text-align: left; float: left;" >
<?php if(empty($data['interested_in'])){
echo "<option value=\"\">Select an option</option>";
 } else{
 echo "<option value=\"$data[interested_in]\">$data[interested_in]</option>
    <option value=\"\">Select an option</option>";
}?>
<option value="Men">Men</option>
<option value="Women">Women</option>
<option value="Men and Women">Men and Women</option>
</select>

<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">
$("#einterested_in").select2();
</script>




<div class="vprofile_about_detail" id="birth_date_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Birthday</div>
<div class="vprofile_about_desc">
<font style="color:#999;"><?php
if(empty($data['year'])){
echo 'No information provided yet';
}else if($data['birth_date_privacy']=="full"||empty($data['birth_date_privacy'])){
echo $data['year']."-".$data['month']."-".$data['day'];
}else if($data['birth_date_privacy']=="half"){
echo  "month : ".$data["month"]." "."day : ".$data['day'];
}
?></font>            </div>
</div>

<div id="birth_date_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">What is your date of birth?</span>

<select id="eday" style="min-width: 30%; text-align: center; float: left; " >

<?php if(empty($data['day'])){
echo "<option value=\"\">Day</option>";
} else{
echo "<option value=\"$data[day]\">$data[day]</option>
<option value=\"\">Day</option>";
}?>

<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>            </select>


<select id="emonth" style="min-width: 30%; text-align: center; float: left;">
<?php if(empty($data['month'])){
echo "<option value=\"\">Month</option>";
 } else{
echo "<option value=\"$data[month]\">$data[month]</option>
<option value=\"\">Month</option>";
}?>
<option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>            </select>

<select id="eyear" style="min-width: 40%; text-align: center; float: left;" >
<?php if(empty($data['year'])){
echo "<option value=\"\">Year</option>";
 } else{
echo "<option value=\"$data[year]\">$data[year]</option>
<option value=\"\">Year</option>";
}?>
<option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>            </select>
<div style="clear:both;"></div><br>

<span class="input-group-addon vprofile_about_detail_addon">Privacy Settings</span>

<select id="ebirth_date_privacy" style="min-width: 100%; text-align: left; float: left; margin-bottom: 10px; ">
<?php if(empty($data['birth_date_privacy'])){
echo "<option value=\"\">Select an option</option>";
 } else{
echo "<option value=\"$data[birth_date_privacy]\">$data[birth_date_privacy]</option>
<option value=\"\">Select an option</option>";
}?>

<option value="full">Show my complete date of birth</option>
<option value="half">Show only day and month</option>
</select>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<script type="text/javascript">
$("#eday").select2();
$("#emonth").select2();
$("#eyear").select2();
$("#ebirth_date_privacy").select2();
</script>


<div class="vprofile_about_detail" id="company_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Works at</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['company'])?'No information provided yet':$data['company']}}</font>            </div>
</div>

<div id="company_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Where do you currently work?</span>
<input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ecompany" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['company'])?"":$data['company']}}>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="job_position_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Job Position</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['job_position'])?'No information provided yet':$data['job_position']}}</font>            </div>
</div>

<div id="job_position_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">What is your current job position?</span>
<input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ejob_position" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['job_position'])?"":$data['job_position']}}>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="professional_skill_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Professional Skill(s)</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['professional_skill'])?'No information provided yet':$data['professional_skill']}}</font>            </div>
</div>

<div id="professional_skill_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">What professional skills do you have?</span>
<textarea style="border-radius: 0px; " class="form-control" id="eprofessional_skill" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off">{{empty($data['professional_skill'])?"":$data['professional_skill']}}</textarea>
</div>
<script type="text/javascript">$("#eprofessional_skill").expanding();</script>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="high_school_name_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">High School</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['high_school_name'])?'No information provided yet':$data['high_school_name']}}</font>            </div>
</div>

<div id="high_school_name_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Add a High School</span>
<input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ehigh_school_name" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['high_school_name'])?"":$data['high_school_name']}}>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="started_high_school_from_date_text" style="{{$style_for_view_details}}">
<div class="vmiddle_about_title">Date stated High School</div>
<div class="vprofile_about_desc">
<font style="color:#999;">{{empty($data['started_high_school_from_date'])?'No information provided yet':$data['started_high_school_from_date']}}</font>            </div>
</div>

<div id="started_high_school_from_date_html" style="{{$style_for_edit}}">
<span class="input-group-addon vprofile_about_detail_addon">Add the date you started your high school</span>
<select id="hs_started_day" style="min-width: 30%; text-align: center; float: left;">
<?php if($data['started_high_school_from_date']=="--"){
echo "<option value=\"\">Day</option>";
 } else{
echo "<option value=".explode("-",$data['started_high_school_from_date'])[2].">".explode("-",$data['started_high_school_from_date'])[2]."</option>
      <option value=\"\">Day</option>";
}?>

<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>            </select>


<select id="hs_started_month" style="min-width: 30%; text-align: center; float: left; " >

    <?php if($data['started_high_school_from_date']=="--"){
        echo "<option value=\"\">Month</option>";
    } else{
        echo "<option value=".explode("-",$data['started_high_school_from_date'])[1].">".explode("-",$data['started_high_school_from_date'])[1]."</option>
      <option value=\"\">Month</option>";
    }?>
<option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>            </select>

<select id="hs_started_year" style="min-width: 40%; text-align: center; float: left;">


    <?php if($data['started_high_school_from_date']=="--"){
        echo "<option value=\"\">Year</option>";
    } else{
        echo "<option value=".explode("-",$data['started_high_school_from_date'])[0].">".explode("-",$data['started_high_school_from_date'])[0]."</option>
      <option value=\"\">Year</option>";
    }?>

<option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>            </select>
<div style="clear:both;"></div><br>

<script type="text/javascript">
$("#hs_started_day").select2();
$("#hs_started_month").select2();
$("#hs_started_year").select2();
</script>
<div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">

<div class="vprofile_about_detail" id="ended_high_school_at_date_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Date ended High School</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['ended_high_school_at_date'])?'No information provided yet':$data['ended_high_school_at_date']}}</font>            </div>
</div>

<div id="ended_high_school_at_date_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">Add the date you ended your high school</span>
    <select id="hs_ended_day" style="min-width: 30%; text-align: center; float: left;">

            <?php if($data['ended_high_school_at_date']=="--"){
                echo "<option value=\"\">Day</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_high_school_at_date'])[2].">".explode("-",$data['ended_high_school_at_date'])[2]."</option>
      <option value=\"\">Day</option>";
            }?>

        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>            </select>


    <select id="hs_ended_month" style="min-width: 30%; text-align: center; float: left; " >

            <?php if($data['ended_high_school_at_date']=="--"){
                echo "<option value=\"\">Month</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_high_school_at_date'])[1].">".explode("-",$data['ended_high_school_at_date'])[1]."</option>
      <option value=\"\">Month</option>";
            }?>

        <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>            </select>

    <select id="hs_ended_year" style="min-width: 40%; text-align: center; float: left;" >


            <?php if($data['ended_high_school_at_date']=="--"){
                echo "<option value=\"\">Year</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_high_school_at_date'])[0].">".explode("-",$data['ended_high_school_at_date'])[0]."</option>
      <option value=\"\">Year</option>";
            }?>


            <option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>            </select>
    <div style="clear:both;"></div><br>

    <script type="text/javascript">
        $("#hs_ended_day").select2();
        $("#hs_ended_month").select2();
        $("#hs_ended_year").select2();
    </script>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="college_field_of_study_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Field of Study</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['college_field_of_study'])?'No information provided yet':$data['college_field_of_study']}}</font>            </div>
</div>

<div id="college_field_of_study_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">What's your field of study?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ecollege_field_of_study" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['college_field_of_study'])?'':$data['college_field_of_study']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="college_name_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">College</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['college_name'])?'No information provided yet':$data['college_name']}}</font>            </div>
</div>

<div id="college_name_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">What's the name of your college?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ecollege_name" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['college_name'])?'':$data['college_name']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="started_college_from_date_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Date stated College</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['started_college_from_date'])?'No information provided yet':$data['started_college_from_date']}}</font>            </div>
</div>

<div id="started_college_from_date_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">Add the date you started your college</span>
    <select id="c_started_day" style="min-width: 30%; text-align: center; float: left; " >

            <?php if($data['started_college_from_date']=="--"){
                echo "<option value=\"\">Day</option>";
            } else{
                echo "<option value=".explode("-",$data['started_college_from_date'])[2].">".explode("-",$data['started_college_from_date'])[2]."</option>
      <option value=\"\">Day</option>";
            }?>
        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>            </select>


    <select id="c_started_month" style="min-width: 30%; text-align: center; float: left;" >


            <?php if($data['started_college_from_date']=="--"){
                echo "<option value=\"\">Month</option>";
            } else{
                echo "<option value=".explode("-",$data['started_college_from_date'])[1].">".explode("-",$data['started_college_from_date'])[1]."</option>
      <option value=\"\">Month</option>";
            }?>

        <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>            </select>

    <select id="c_started_year" style="min-width: 40%; text-align: center; float: left;">

            <?php if($data['started_college_from_date']=="--"){
                echo "<option value=\"\">Year</option>";
            } else{
                echo "<option value=".explode("-",$data['started_college_from_date'])[0].">".explode("-",$data['started_college_from_date'])[0]."</option>
      <option value=\"\">Year</option>";
            }?>


        <option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>            </select>
    <div style="clear:both;"></div><br>

    <script type="text/javascript">
        $("#c_started_day").select2();
        $("#c_started_month").select2();
        $("#c_started_year").select2();
    </script>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="ended_college_at_date_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Date ended College</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['ended_college_at_date'])?'No information provided yet':$data['ended_college_at_date']}}</font>            </div>
</div>

<div id="ended_college_at_date_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">Add the date you ended your college</span>
    <select id="c_ended_day" style="min-width: 30%; text-align: center; float: left; " >

            <?php if($data['ended_college_at_date']=="--"){
                echo "<option value=\"\">Day</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_college_at_date'])[2].">".explode("-",$data['ended_college_at_date'])[2]."</option>
      <option value=\"\">Day</option>";
            }?>

        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>            </select>


    <select id="c_ended_month" style="min-width: 30%; text-align: center; float: left; " >

            <?php if($data['ended_college_at_date']=="--"){
                echo "<option value=\"\">Month</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_college_at_date'])[1].">".explode("-",$data['ended_college_at_date'])[1]."</option>
      <option value=\"\">Month</option>";
            }?>

            <option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>            </select>

    <select id="c_ended_year" style="min-width: 40%; text-align: center; float: left; ">

            <?php if($data['ended_college_at_date']=="--"){
                echo "<option value=\"\">Year</option>";
            } else{
                echo "<option value=".explode("-",$data['ended_college_at_date'])[0].">".explode("-",$data['ended_college_at_date'])[0]."</option>
      <option value=\"\">Year</option>";
            }?>

        <option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option>            </select>
    <div style="clear:both;"></div><br>

    <script type="text/javascript">
        $("#c_ended_day").select2();
        $("#c_ended_month").select2();
        $("#c_ended_year").select2();
    </script>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="from_city_name_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">From</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['from_city_name'])?'No information provided yet':$data['from_city_name']}}</font>            </div>
</div>

<div id="from_city_name_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">Which city are you from?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="efrom_city_name" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['from_city_name'])?'':$data['from_city_name']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="lives_in_city_name_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Lives in</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['lives_in_city_name'])?'No information provided yet':$data['lives_in_city_name']}}</font>            </div>
</div>

<div id="lives_in_city_name_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">In which city do you currently live?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="elives_in_city_name" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['lives_in_city_name'])?'':$data['lives_in_city_name']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="language_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Primary Language</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['language'])?'No information provided yet':$data['language']}}</font>            </div>
</div>

<div id="language_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon"></span>

    <select id="elanguage" style="min-width: 100%;" >
        <?php if(empty($data['language'])){
        echo "<option value=\"\">Select your language</option>";
         } else{
       echo "<option value=\"$data[language]\">$data[language]</option>
        <option value=\"\">Select your language</option>";
        }?>
        <option value="English">English</option>
        <option value="Afrikaans">Afrikaans</option>
        <option value="Albanian">Albanian</option>
        <option value="Arabic">Arabic</option>
        <option value="Armenian">Armenian</option>
        <option value="Azerbaijani">Azerbaijani</option>
        <option value="Basque">Basque</option>
        <option value="Belarusian">Belarusian</option>
        <option value="Bulgarian">Bulgarian</option>
        <option value="Catalan">Catalan</option>
        <option value="Chinese (Simplified)">Chinese (Simplified)</option>
        <option value="Chinese (Traditional)">Chinese (Traditional)</option>
        <option value="Croatian">Croatian</option>
        <option value="Czech">Czech</option>
        <option value="Danish">Danish</option>
        <option value="Deutsch">Deutsch</option>
        <option value="Estonian">Estonian</option>
        <option value="Filipino">Filipino</option>
        <option value="Finnish">Finnish</option>
        <option value="French">French</option>
        <option value="Galician">Galician</option>
        <option value="Georgian">Georgian</option>
        <option value="German">German</option>
        <option value="Greek">Greek</option>
        <option value="Haitian Creole">Haitian Creole</option>
        <option value="Hebrew">Hebrew</option>
        <option value="Hindi">Hindi</option>
        <option value="Hungarian">Hungarian</option>
        <option value="Icelandic">Icelandic</option>
        <option value="Indonesian">Indonesian</option>
        <option value="Irish">Irish</option>
        <option value="Italian">Italian</option>
        <option value="Japanese">Japanese</option>
        <option value="Korean">Korean</option>
        <option value="Latvian">Latvian</option>
        <option value="Lithuanian">Lithuanian</option>
        <option value="Macedonian">Macedonian</option>
        <option value="Malay">Malay</option>
        <option value="Maltese">Maltese</option>
        <option value="Norwegian">Norwegian</option>
        <option value="Persian">Persian</option>
        <option value="Polish">Polish</option>
        <option value="Portuguese">Portuguese</option>
        <option value="Romanian">Romanian</option>
        <option value="Russian">Russian</option>
        <option value="Serbian">Serbian</option>
        <option value="Slovak">Slovak</option>
        <option value="Slovenian">Slovenian</option>
        <option value="Spanish">Spanish</option>
        <option value="Swahili">Swahili</option>
        <option value="Swedish">Swedish</option>
        <option value="Thai">Thai</option>
        <option value="Turkish">Turkish</option>
        <option value="Ukrainian">Ukrainian</option>
        <option value="Urdu">Urdu</option>
        <option value="Vietnamese">Vietnamese</option>
        <option value="Welsh">Welsh</option>
        <option value="Yiddish">Yiddish</option>
    </select>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">
<script type="text/javascript">
    $("#elanguage").select2();
</script>



<div class="vprofile_about_detail" id="religion_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Religious Views</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['religion'])?'No information provided yet':$data['religion']}}</font>            </div>
</div>

<div id="religion_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">What's your Religious Views?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="ereligion" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['religion'])?'':$data['religion']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">




<div class="vprofile_about_detail" id="politicl_view_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Political Views</div>
    <div class="vprofile_about_desc">
        <font style="color:#999;">{{empty($data['politicl_view'])?'No information provided yet':$data['politicl_view']}}</font>            </div>
</div>

<div id="politicl_view_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">What are your Political Views?</span>
    <input style="border-radius: 0px 0px 0px 0px;" type="text" class="form-control" id="epoliticl_view" placeholder="" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" value={{empty($data['politicl_view'])?'':$data['politicl_view']}}>
    <div style="clear:both;"></div>
</div>
<br clear="all"><br clear="all">


<div class="vprofile_about_detail" id="page_country_text" style="{{$style_for_view_details}}">
    <div class="vmiddle_about_title">Country</div>
    <div class="vprofile_about_desc">
        {{empty($data['country'])?'No information provided yet':$data['country']}}            </div>
</div>

<div id="page_country_html" style="{{$style_for_edit}}">
    <span class="input-group-addon vprofile_about_detail_addon">What country are you from?</span>
    <select id="ecountry" style="min-width: 100%;" >
        <?php if(empty($data['country'])){
        echo "<option value=\"\">Select your country</option>";
         } else{
        echo "<option value=\"$data[country]\">$data[country]</option>
        <option value=\"\">Select your country</option>";
        }?>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Bouvet Island">Bouvet Island</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
        <option value="Brunei Darussalam">Brunei Darussalam</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Cote D'ivoire">Cote D'ivoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Territories">French Southern Territories</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guinea">Guinea</option>
        <option value="Guinea-bissau">Guinea-bissau</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
        <option value="Korea, Republic of">Korea, Republic of</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macao">Macao</option>
        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malawi">Malawi</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
        <option value="Moldova, Republic of">Moldova, Republic of</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Namibia">Namibia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherlands">Netherlands</option>
        <option value="Netherlands Antilles">Netherlands Antilles</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau">Palau</option>
        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Philippines">Philippines</option>
        <option value="Pitcairn">Pitcairn</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Reunion">Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russian Federation">Russian Federation</option>
        <option value="Rwanda">Rwanda</option>
        <option value="Saint Helena">Saint Helena</option>
        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
        <option value="Saint Lucia">Saint Lucia</option>
        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
        <option value="Samoa">Samoa</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
        <option value="Thailand">Thailand</option>
        <option value="Timor-leste">Timor-leste</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="United States">United States</option>
        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Viet Nam">Viet Nam</option>
        <option value="Virgin Islands, British">Virgin Islands, British</option>
        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
        <option value="Wallis and Futuna">Wallis and Futuna</option>
        <option value="Western Sahara">Western Sahara</option>
        <option value="Yemen">Yemen</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>            </select>
    <script type="text/javascript">
        $("#ecountry").select2();
    </script>
    <div style="clear:both;"></div>
</div>


<br clear="all"><br clear="all">
<div id="update_acct_status" style="margin:0 auto;" align="center"></div><br clear="all">

@if($action=='edit')
    <div class="modal-footer" style="padding-top:20px; padding-bottom:20px; border:1px solid #E6E6E6; border-left:0px solid;border-right:0px solid; text-align:center; border-bottom:0px solid !important;">
        <div id="update_acct_wait" style="margin:0 auto;" align="center">
            <span class="btn btn-default btn btn-success btn-wall-continue" style=" font-size:16px;padding-top:8px; padding-bottom:10px;" onclick="vpb_save_profile_details();">Save changes</span>

            <span class="btn btn-default" style=" margin-top:0px; margin-left:30px;padding-top:8px; padding-bottom:10px;" onclick="vpb_show_status_updates();">Cancel</span>
        </div>
    </div>
@endif



