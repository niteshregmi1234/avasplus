<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:02 PM
 */
class AuthController extends BaseController
{
    protected $authApi;
    protected $accountApi;

    public function __construct() {
        // Instantiate the APIs the controller will use which is placed in model.
        $this->authApi = new ApiAuth();
        $this->accountApi=new ApiAccount();
    }
    public function login() {
        return View::make('login');
    }
    public function loginPost(){
        if (Auth::attempt(array('username' => Input::get('ue_data'),'passwd'=>Input::get('uep_data'),"page"=>Input::get("page")))) {
            if(Session::get("processCompletedStatus")) {
                $arr = array(
                    "fullname" => Session::get('fullname'),
                    "email" => Session::get('email'),
                    "passwd" => Session::get('passwd'),
                    "username" => Session::get('username'),
                    "processCompletedStatus" => true
                );
                echo json_encode($arr);
            }else{
                $arr = array(
                    "fullname" => Session::get('fullname'),
                    "email" => Session::get('email'),
                    "passwd" => Session::get('passwd'),
                    "username" => Session::get('username'),
                    "processCompletedStatus" => false
                );
                echo json_encode($arr);
            }
        } else{
            $arr=array(
                "error"=>"<div class=\"vwarning\">Sorry but it seems you provided incorrect information.<br>Please enter your valid details if you have an account to proceed otherwise, sign up.</div>");
                echo json_encode($arr);

        }
    }
    public function signUp(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        $country  = "Unknown";

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in,true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }
        return View::make('sign-up')
               ->withCountry($country);
    }
    public function signUpPost(){
        $username= explode("@",Input::get('semail'))[0];
        $email=Input::get('semail');
        if(Auth::attempt(array('username' => $username,"page"=>Input::get("page")))){
            $response="<div class=\"vwarning\">Sorry, the email address: <b>$email</b> is already in use with another account and duplicate email addresses are not allowed.<br>Please login with the existing account if you already have an account or enter a different email address to proceed.</div>";
            echo $response;
        }else{
              $credentials=array('fullname' => Input::get('sfullname'),'username' => $username,'email' => Input::get('semail'),'passwd'=>Input::get('spass'),'country'=>Input::get('vpb_ucounty'),"process-completed-status"=>false);
              $is_email_exists=$this->authApi->validateEmail($credentials['email']);
              if($is_email_exists){
                  $date= date("Y/m/d");
                  $dateWithTime = (new DateTime("now",new DateTimeZone("Asia/kathmandu")))->format("F j, Y, g:i:s a");
                  $fullname=$credentials["fullname"];
                  $username=$credentials["username"];
                  $email=$credentials["email"];
                  $code=md5(rand(1000,99999999));
                  $credentials["code"]=$code;
                  $body="<table width=\"650\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" style=\"border:10px solid #60a83a\">
                     <tbody><tr>
                     <td align=\"left\" valign=\"top\">
                     <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-bottom:1px solid #cccccc\">
                     <tbody><tr>
                     <td width=\"275\" align=\"left\" valign=\"middle\" style=\"padding:30px\">
                     <font color=\"blue\">Nepal Chat</font>
                     </td>
                     <td width=\"255\" align=\"right\" valign=\"middle\" style=\"font-family:Arial;font-size:14px;color:#555555;padding:30px\">
                     <strong>Date:</strong> $date </td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     <tr>
                     <td align=\"left\" valign=\"top\">
                     <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                     <tbody><tr>
                     <td colspan=\"3\" width=\"100%\" height=\"20\">&nbsp;
                     </td>
                     </tr>
                     <tr>
                     <td width=\"20\">&nbsp;</td>
                     <td width=\"610\">
                     <p style=\"font-family:Arial;font-size:20px;margin-bottom:0.5em;margin-top:0\">Dear $fullname,</p>
                     </td>
                     <td width=\"20\">&nbsp;</td>
                     </tr>
                     <tr>
                     <td width=\"20\">&nbsp;</td>
                     <td width=\"610\" style=\"font-family:Arial;font-size:14px;padding-bottom:20px\">
                     <p style=\"font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#3e3e3e;line-height:24px\">Your account has been created successfully at Nepal Chat dated $dateWithTime.<br><br>
                     
                     Below are your account details.<br><br>
                     
                     Fullname: $fullname<br>
                     Username: $username<br>
                     Email Address: $email<br>
                     Password: The password you provided during your account creation.<br><br>
                     
                     Your Verification code is: <font color=\"blue\">$code</font> <br><br>
                     
                     Thank You!<br>
                     Nepal Chat Support Team.<br></p>
                     </td>
                     <td width=\"20\"></td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     </tbody></table>";
                  $credentials["profilePicName"]="";
                  $this->authApi->signUpPost($credentials);
                  $this->authApi->sendMail($credentials,$body);
                  $cred["done-signup"]=true;
                  echo json_encode($cred);

              }else{
                  $email=Input::get('semail');
                  $response="<div class=\"vwarning\">Sorry, we were unable to verify your email address: <b style=\"color:blue;\">$email</b><br>Please enter a working email address in the required email field to proceed.<br>Thank you.</div>";
                  echo $response;
              }


        }

    }
    public function verification(){
        return View::make('verification');
    }
    public function verificationPost(){
        $code=$_POST["verification_code"];
        $codeName="code";
        $is_data=$this->authApi->authByCode($codeName,$code);
        if(!empty($is_data["hits"]["hits"])) {
            if (!$is_data["hits"]["hits"][0]["_source"]["process-completed-status"]){
                $is_data["hits"]["hits"][0]["_source"]["process-completed-status"]=true;
                $is_data["hits"]["hits"][0]["_source"]["code"]=null;
                $data=$is_data["hits"]["hits"][0]["_source"];
                $this->authApi->signUpPost($is_data["hits"]["hits"][0]["_source"]);
                $params=array('email'=>$data['email'],'fullname'=>$data['fullname'],'username'=>$data['username'],
                'vpb_page_owner'=>$data['email'],'about_us'=>null,'favorite_quotes'=>null,'marital_status'=>null,
                    'address'=>null,  'phone'=>null,  'gender'=>null,  'interested_in'=>null,  'day'=>null,  'month'=>null,
                    'year'=>null,  'birth_date_privacy'=>null,  'company'=>null, 'job_position'=>null,  'professional_skill'=>null,
                    'high_school_name'=>null,  'started_high_school_from_date'=>"--",  'ended_high_school_at_date'=>'--',  ''=>null,  'college_field_of_study'=>null,
                    'college_name'=>null,  'started_college_from_date'=>'--', 'ended_college_at_date'=>'--',  'from_city_name'=>null,
                    'lives_in_city_name'=>null,  'language'=>null,  'religion'=>null,  'politicl_view'=>null,  'country'=>null,  'page'=>null
                );
                $this->accountApi->aboutPostBy(Session::get('username'),$params);
                return Redirect::to("wall/" . $is_data["hits"]["hits"][0]["_source"]["username"]);

        }else{

                return Redirect::to("login")->withMessage("<div class=\"vwarning\">Already Verified, Please login to proceed</div>");
            }
        }else{
            return View::make("verification")->withMessage("<div class=\"vwarning\">Sorry, but that's not your correct verification code. Please check your gmail account and enter the correct verification code to proceed.</div>");
        }
    }
    public  function forgetPassword(){
        return View::make("forget-password");
    }
    public function forgetPasswordPost(){

            $email=$_POST["ue_data"];
            $username= explode("@",Input::get('semail'))[0];
            $is_data=$this->authApi->signUpAuthBy($username);
            if(!empty($is_data["hits"]["hits"])) {
                if (!$is_data["hits"]["hits"][0]["_source"]["process-completed-status"]){
                    $response["processCompletedStatus"]=false;
                    echo json_encode($response);
                }else{
                    $credentials=$is_data["hits"]["hits"][0]["_source"];
                    $date= date("Y/m/d");
                    $dateWithTime = (new DateTime("now",new DateTimeZone("Asia/kathmandu")))->format("F j, Y, g:i:s a");
                    $fullname=$credentials["fullname"];
                    $code=md5(rand(100,9999999999));
                    $body="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                               <tbody><tr>
                               <td>
                               <table width=\"650\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" style=\"border:10px solid #60a83a\">
                               <tbody><tr>
                               <td align=\"left\" valign=\"top\">
                               <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-bottom:1px solid #cccccc\">
                               <tbody><tr>
                               <td width=\"275\" align=\"left\" valign=\"middle\" style=\"padding:30px\">
                               <font color=\"blue\">Nepal Chat</font>
                               </td>
                               <td width=\"255\" align=\"right\" valign=\"middle\" style=\"font-family:Arial;font-size:14px;color:#555555;padding:30px\">
                               <strong>Date:</strong> $date </td>
                               </tr>
                               </tbody></table>
                               </td>
                               </tr>
                               <tr>
                               <td align=\"left\" valign=\"top\">
                               <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                               <tbody><tr>
                               <td colspan=\"3\" width=\"100%\" height=\"20\">&nbsp;
                               </td>
                               </tr>
                               <tr>
                               <td width=\"20\">&nbsp;</td>
                               <td width=\"610\">
                               <p style=\"font-family:Arial;font-size:20px;margin-bottom:0.5em;margin-top:0\">Dear $fullname,</p>
                               </td>
                               <td width=\"20\">&nbsp;</td>
                               </tr>
                               <tr>
                               <td width=\"20\">&nbsp;</td>
                               <td width=\"610\" style=\"font-family:Arial;font-size:14px;padding-bottom:20px\">
                               <p style=\"font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#3e3e3e;line-height:24px\">You have received this message as a result of the request made with your account username to send you a link to enable you change or reset your forgotten password at Nepal Chat dated $dateWithTime.<br><br>
                               
                               To change or reset your password, please click on the below link or copy the link to your web browser address bar and press the enter key on your computer keyboard but if you did not request for any password reset link then you can ignore this message.<br><br>
                               
                               <a href=\"http://localhost:8000/forget-password/$code\" style=\"color:blue\">Password Reset Link</a><br><br>
                               
                               
                               Thank You!<br>
                               Nepal Chat Support Team.<br></p>
                               </td>
                               <td width=\"20\"></td>
                               </tr>
                               </tbody></table>
                               </td>
                               </tr>
                               </tbody></table>
                               </td>
                               </tr>
                               </tbody></table>";
                               $this->authApi->sendMail($credentials,$body);
                               $credentials["password-reset-code"]=$code;
                               $this->authApi->signUpPost($credentials);
                               $response["processCompletedStatus"]=true;
                               $response["response"]="<div class=\"vsuccess\" align=\"left\">Dear <b>$email</b>,<br>A link to enable you change your forgotten password has been sent to your email box.<br>Please check your email Inbox or your Spam box in case you did not see the mail in your Inbox to change your password.<br>Thank you.</div>";
                               echo json_encode($response);
                }
            }
        else{
            $email=Input::get('ue_data');
            $response["response"]="<div class=\"vwarning\">Sorry, the email: <b>$email</b> is invalid, please enter a valid email in the required field to proceed.</div>";
            echo json_encode($response);
        }
    }
    public function newPassword($code){
        $codeName="password-reset-code";
        $is_data=$this->authApi->authByCode($codeName,$code);
        if(!empty($is_data["hits"]["hits"])) {
            $credentials=$is_data["hits"]["hits"][0]["_source"];
            $credentials["password-reset-code"]=null;
            $this->authApi->signUpPost($credentials);
            return View::make("new-password")->withFullname($credentials["fullname"])
                                             ->withUsername($credentials["username"]);
            }else{
            return "Bad Request";
        }
    }
    public function newPasswordPost(){

            $username=Input::get("ue_data");
            $newPasssword=Input::get("new_pass");
            $is_data=$this->authApi->signUpAuthBy($username);
            $credentials=$is_data["hits"]["hits"][0]["_source"];
            $this->authApi->deleteOldRecordAfterChangingPass($credentials);
            $credentials["passwd"]=$newPasssword;
            $this->authApi->signUpPost($credentials);
            $response["processCompletedStatus"]=true;
            echo json_encode($response);
    }
}