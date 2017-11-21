<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:02 PM
 */
class AuthController
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
        var_dump("i am here");
        die();
        if (Auth::attempt(array('email' => Input::get('email'),
            'pass'  => Input::get('password')))) {
            return Redirect::intended('/wall');

        }else{
                Session::flash('error', 'Username/password are not correct');
                return Redirect::to('/login');

        }
    }
}