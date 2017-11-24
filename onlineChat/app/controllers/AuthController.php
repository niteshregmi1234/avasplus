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
    public function __construct() {
        // Instantiate the APIs the controller will use which is placed in model.
        $this->authApi = new ApiAuth();
    }
    public function login() {
        return View::make('login');
    }
    public function loginPost(){
        if (Auth::attempt(array('email' => Input::get('ue_data'),'password'=>Input::get('uep_data'),"page"=>Input::get("page")))) {
            $arr=array(
            "fullname"=>Session::get('fullName'),
            "email"=>Session::get('email'),
            "passwd"=>Session::get('password'),
            "username"=>Session::get('userName'),
            "user-is-validated"=>true
        );
        echo json_encode($arr);
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
        if(Auth::attempt(array('email' => Input::get('semail'),"page"=>Input::get("page")))){
            $email=Input::get('semail');
            $response="<div class=\"vwarning\">Sorry, the email address: <b>$email</b> is already in use with another account and duplicate email addresses are not allowed.<br>Please login with the existing account if you already have an account or enter a different email address to proceed.</div>";
            echo $response;
        }else{
              $credentials=array('fullName' => Input::get('sfullname'),'userName' => Input::get('susername'),'email' => Input::get('semail'),'password'=>Input::get('spass'),'country'=>Input::get('vpb_ucounty'),"process-completed-status"=>false);
              $is_email_exists=$this->authApi->validateEmail($credentials['email']);
              if($is_email_exists){
                  $this->authApi->signUpPost($credentials);
                  $this->authApi->sendMail($credentials['email']);
//                  $response=$this->authApi->signUpAuthBy($credentials['email']);
//                  if($response['hits']['hits'][0]['process-completed-status']){
//                      $credentials['process-completed-status']=true;
//                      $response="<div class=\"vwarning\">Sorry, the email address: <b>$email</b> is already in use with another account and duplicate email addresses are not allowed.<br>Please login with the existing account if you already have an account or enter a different email address to proceed.</div>";
//                      echo $response;
//                  }else{
//
//                  }
//                  echo json_encode($response);
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
}