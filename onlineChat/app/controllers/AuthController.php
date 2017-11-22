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
        if(Auth::attempt(array('email' => Input::get('semail'),'password'=>Input::get('spass'),"page"=>Input::get("page"),'fullName' => Input::get('sfullname'),'country'=>Input::get('vpb_ucounty'),"userName"=>Input::get("susername")))){
          $arr=array("<div class=\"vwarning\">Sorry, the email: <b><?php Input::get('semail')?></b> has already been taken by someone else.<br>Please enter a different email of your choice in the required field to proceed.</div>");
          echo json_encode($arr);
        }else{
              $this->authApi->signUpPost(Input::get('semail'),Input::get('spass'),Input::get('sfullname'),Input::get('vpb_ucounty'),Input::get("susername"));
        }

    }
}