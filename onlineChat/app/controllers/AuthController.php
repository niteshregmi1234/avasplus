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
        if (Auth::attempt(array('email' => Input::get('ue_data')))) {
            $arr=array(
            "fullname"=>"nitesh regmi",
            "email"=>"nregmi@deerwalk.com",
            "passwd"=>"nitesh",
            "user-is-validated"
        );
        echo json_encode($arr);
        }
        else{
            $arr=array(
                "error"=>"<div class=\"vwarning\">Sorry but it seems you provided incorrect information.<br>Please enter your valid details if you have an account to proceed otherwise, sign up.</div>");
                echo json_encode($arr);

        }
    }
}