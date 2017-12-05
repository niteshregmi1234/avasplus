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

    public function index($email) {
            $datas=$this->authApi->signUpAuthBy($email);
            $data=$datas["hits"]["hits"][0]["_source"];
            return View::make('account/wall')->withEmail($data['email'])
                                             ->withFullname($data['fullName'])
                                             ->withUsername($data['userName'])
                                             ->withProfilePicName($data['profilePicName']);
    }
    public function updateProfilePic(){
              $formData=Input::all();
//              $credentials["email"]=Session::get("email");
              $datas=$this->authApi->signUpAuthBy(Session::get("email"));
              $credentials=$datas["hits"]["hits"][0]["_source"];
//              $credentials["password"]=Session::get("password");
              $image=$formData["profilepic"];
              $profilePicName["profilePicName"]=(new FileUtils())->makeSeparateDirectoryForUsersUsingEmails(Session::get("email"),$image);
              Session::put('profilePicName', $profilePicName["profilePicName"]);
              $credentials["profilePicName"]=Session::get("profilePicName");
              $this->authApi->signUpPost($credentials);
              $data=$this->authApi->signUpAuthBy($credentials["email"]);
              $response["completed"]=true;
              $response["profilePicName"]=$data["hits"]["hits"][0]["_source"]["profilePicName"];
              $response["email"]=Session::get("email");
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
        $response["response"]="<div class=\"vsuccess\" align=\"left\">The profile information have been updated successfully.</div>";
        echo json_encode($response);
    }

    public function searchFriends(){
        $is_datas=$this->authApi->searchGetBy(Input::get('friend'));
        if($is_datas["hits"]["total"]>0){
            $datas=$is_datas["hits"]["hits"];
            foreach ($datas as $key=>$value){

                $data=$value["_source"];
                if($data["email"]!=Session::get('email')){
                $email=$data["email"];
                $profilePicName=$data["profilePicName"];
                $username=$data["userName"];
                $fullname=$data["fullName"];
                $response=View::make("search-list")
                    ->withFullname($fullname)
                    ->withEmail($email)
                    ->withUsername($username)
                    ->withProfilePicName($profilePicName)
                    ->render();
                echo $response;
            }

            }

//
        }else{
            $response["VPB:"]=true;
            $response["message"]="Your keyword yielded no result";
            echo json_encode($response);
        }

    }

         public  function loadFriendShipPopup(){
        $datas=$this->authApi->signUpAuthBy(Input::get('session_uid'));
        $data=$datas["hits"]["hits"][0]["_source"];
        $response='<span id="addfriend_1955" onclick="vpb_friend_ship(\'1955\', \'abcdef\', \'addfriend\');" class="cbt_friendship"><i class="fa fa-user-plus"></i> Add Friend</span>
				
				<span style="opacity:0.6;cursor:default;display:none;" id="requestsent_1955" class="cbt_friendship"><i class="fa fa-reply"></i> Request Sent</span>
				
				<span style="display:none;" title="Cancel Request" id="cancelrequest_1955" onclick="vpb_friend_ship(\'1955\', \'abcdef\', \'cancelrequest\');" class="cbt_friendship vpb_cbtn"><i class="fa fa-times"></i></span>';
        echo $response;
         }
}