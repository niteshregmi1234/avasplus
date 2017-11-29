<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 12:49 PM
 */
class AccountController extends BaseController{
    protected $authApi;
    protected $accountApi;

    public function __construct() {
    // Instantiate the APIs the controller will use which is placed in model.
    $this->authApi=new ApiAuth();
    $this->accountApi = new ApiAccount();

     }

    public function index() {

            return View::make('account/wall')->withEmail(Session::get('email'))
                                             ->withFullname(Session::get('fullName'))
                                             ->withUsername(Session::get('userName'))
                                             ;
    }
    public function updateProfilePic(){
              $formData=Input::all();
              $email=Session::get("email");
              $image=$formData["profilepic"];
              $profilePicName["profilePicName"]=(new FileUtils())->makeSeparateDirectoryForUsersUsingEmails($email,$image);
              $this->accountApi->profilePicPostBy($email,$profilePicName);
              $data=$this->accountApi->profilePicGetBy($email);
              $response["completed"]=true;
              $response["profilePicName"]=$data["_source"]["profilePicName"];
              $response["email"]=$email;
              return json_encode($response);

    }
}