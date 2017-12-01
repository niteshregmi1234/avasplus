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
                                             ->withProfilePicName(Session::get('profilePicName'));
    }
    public function updateProfilePic(){
              $formData=Input::all();
              $email=Session::get("email");
              $image=$formData["profilepic"];
              $profilePicName["profilePicName"]=(new FileUtils())->makeSeparateDirectoryForUsersUsingEmails($email,$image);
              Session::put('profilePicName', $profilePicName["profilePicName"]);
              $this->accountApi->profilePicPostBy($email,$profilePicName);
              $data=$this->accountApi->profilePicGetBy($email);
              $response["completed"]=true;
              $response["profilePicName"]=$data["_source"]["profilePicName"];
              $response["email"]=$email;
              return json_encode($response);

    }
    public function about(){
        $datas=$this->accountApi->aboutGetBy(Input::get('email'));
        $data=$datas['_source'];

        if(Input::get("action")=='normal') {

            $about = View::make("account/partial/about")
                ->withData($data)
                ->withAction(Input::get("action"))
                ->withStyleForViewDetails("min-width:100%;display:inline-block;")
                ->withStyleForEdit("min-width:100%;display:none;")
                ->render();
                return $about;
        }else if (Input::get("action")=='edit'){
            $about = View::make("account/partial/about")
                ->withData($data)
                ->withAction(Input::get("action"))
                ->withStyleForViewDetails("display:none;")
                ->withStyleForEdit("display:inline-block;min-width:100% !important;width:100% !important;")
                ->render();
                return $about;
        }


    }

    public function aboutEditDetail(){
        $this->accountApi->aboutPostBy(Input::get('email'),Input::all());
        $datas=$this->authApi->signUpAuthBy(Input::get('email'));
        $data=$datas['hits']['hits'][0]['_source'];
        $data['fullName']=Input::get('fullname');
        $data['userName']=Input::get('username');
        $this->authApi->signUpPost($data);
        $response["VPB:"]=true;
        return json_encode($response);
    }
}