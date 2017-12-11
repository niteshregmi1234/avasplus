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

    public function index($username) {
            $datas=$this->authApi->signUpAuthBy($username);
            $data=$datas["hits"]["hits"][0]["_source"];
            return View::make('account/wall')->withEmail($data['email'])
                                             ->withFullname($data['fullname'])
                                             ->withUsername($data['username'])
                                             ->withProfilePicName($data['profilePicName'])
                                             ->withCountry($data['country']);
    }
    public function updateProfilePic(){
              $formData=Input::all();
//              $credentials["email"]=Session::get("email");
              $datas=$this->authApi->signUpAuthBy(Session::get("username"));
              $credentials=$datas["hits"]["hits"][0]["_source"];
//              $credentials["password"]=Session::get("password");
              $image=$formData["profilepic"];
              $profilePicName["profilePicName"]=(new FileUtils())->makeSeparateDirectoryForUsersUsingEmails(Session::get("username"),$image);
              Session::put('profilePicName', $profilePicName["profilePicName"]);
              $credentials["profilePicName"]=Session::get("profilePicName");
              $this->authApi->signUpPost($credentials);
              $data=$this->authApi->signUpAuthBy($credentials["username"]);
              $response["completed"]=true;
              $response["profilePicName"]=$data["hits"]["hits"][0]["_source"]["profilePicName"];
              $response["username"]=Session::get("username");
              return json_encode($response);

    }
    public function about(){
        $datas=$this->accountApi->aboutGetBy(Input::get('username'));
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
        $this->accountApi->aboutPostBy(Input::get('username'),Input::all());
        $datas=$this->authApi->signUpAuthBy(Input::get('email'));
        $data=$datas['hits']['hits'][0]['_source'];
        $data['fullname']=Input::get('fullname');
        $data['username']=Input::get('username');
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
                $profilePicName=$data["profilePicName"];
                $fullname=$data["fullname"];
                if($data["username"]!=Session::get('username')){
                $datass=$this->accountApi->friendsGetBySessionUsername(Session::get('username'));
                    if($datass["hits"]["total"]>0)
                    {
                        $data_i=$datass["hits"]["hits"]["0"]['_source'];
                        foreach ($data_i as $key_i=>$value_i){
                            if($key_i==$data["username"]){
                                if($value_i['addFriend']==true){
                                    if($value_i['confirmFriend']==true){
                                        $response=View::make("search-list")
                                            ->withFullname($fullname)
                                            ->withProfilePicName($profilePicName)
                                            ->withUsername($data["username"])
                                            ->withAddFriendDisplay("none")
                                            ->withCancelDisplay("none")
                                            ->withUnfriendDisplay("inline")
                                            ->render();
                                        echo $response;
                                    }elseif($value_i['cancelRequest']==false){
                                        $response=View::make("search-list")
                                            ->withFullname($fullname)
                                            ->withProfilePicName($profilePicName)
                                            ->withUsername($data["username"])
                                            ->withAddFriendDisplay("none")
                                            ->withCancelDisplay("inline")
                                            ->withUnfriendDisplay("none")
                                            ->render();
                                        echo $response;
                                    }else{
                                        $response=View::make("search-list")
                                            ->withFullname($fullname)
                                            ->withProfilePicName($profilePicName)
                                            ->withUsername($data["username"])
                                            ->withAddFriendDisplay("inline")
                                            ->withCancelDisplay("none")
                                            ->withUnfriendDisplay("none")
                                            ->render();
                                        echo $response;
                                    }

                                }else{
                                    $response=View::make("search-list")
                                        ->withFullname($fullname)
                                        ->withProfilePicName($profilePicName)
                                        ->withUsername($data["username"])
                                        ->withAddFriendDisplay("inline")
                                        ->withCancelDisplay("none")
                                        ->withUnfriendDisplay("none")
                                        ->render();
                                    echo $response;
                                }

                            }else{
                                $response=View::make("search-list")
                                    ->withFullname($fullname)
                                    ->withProfilePicName($profilePicName)
                                    ->withUsername($data["username"])
                                    ->withAddFriendDisplay("inline")
                                    ->withCancelDisplay("none")
                                    ->withUnfriendDisplay("none")
                                    ->render();
                                echo $response;
                            }
                        }
                    }else{
                        $response=View::make("search-list")
                            ->withFullname($fullname)
                            ->withProfilePicName($profilePicName)
                            ->withUsername($data["username"])
                            ->withAddFriendDisplay("inline")
                            ->withCancelDisplay("none")
                            ->withUnfriendDisplay("none")
                            ->render();
                        echo $response;
                    }

//                $response=View::make("search-list")
//                    ->withFullname($fullname)
//                    ->withProfilePicName($profilePicName)
//                    ->render();
//                echo $response;
            }else{
                $response="";
                echo $response;
            }}

//
        }else{
            $response["VPB:"]=true;
            $response["message"]="Your keyword yielded no result";
            echo json_encode($response);
        }

    }
         public  function loadFriendShipPopup(){
        $datas=$this->accountApi->friendsGetBySessionUsername(Session::get('username'));
       if($datas["hits"]["total"]>0)
       {
           $data=$datas["hits"]["hits"]["0"]['_source'];
           foreach ($data as $key=>$value){
               if($key==Input::get('session_uid')){
                   if($value['addFriend']==true){
                       if($value['confirmFriend']==true){
                           $response=View::make("account/partial/friendship-button")
                               ->withUsername(Input::get('session_uid'))
                               ->withAddFriendDisplay("none")
                               ->withCancelDisplay("none")
                               ->withUnfriendDisplay("inline")
                               ->render();
                           echo $response;
                       }elseif($value['cancelRequest']==false){
                           $response=View::make("account/partial/friendship-button")
                               ->withUsername(Input::get('session_uid'))
                               ->withAddFriendDisplay("none")
                               ->withCancelDisplay("inline")
                               ->withUnfriendDisplay("none")
                               ->render();
                           echo $response;
                       }else{
                           $response=View::make("account/partial/friendship-button")
                               ->withUsername(Input::get('session_uid'))
                               ->withAddFriendDisplay("inline")
                               ->withCancelDisplay("none")
                               ->withUnfriendDisplay("none")
                               ->render();
                           echo $response;
                       }

                   }else{
                       $response=View::make("account/partial/friendship-button")
                           ->withUsername(Input::get('session_uid'))
                           ->withAddFriendDisplay("inline")
                           ->withCancelDisplay("none")
                           ->withUnfriendDisplay("none")
                           ->render();
                       echo $response;
                   }

               }else{
                   $response=View::make("account/partial/friendship-button")
                       ->withUsername(Input::get('session_uid'))
                       ->withAddFriendDisplay("inline")
                       ->withCancelDisplay("none")
                       ->withUnfriendDisplay("none")
                       ->render();
                   echo $response;
               }
           }
       }else{
           $response=View::make("account/partial/friendship-button")
               ->withUsername(Input::get('session_uid'))
               ->withAddFriendDisplay("inline")
               ->withCancelDisplay("none")
               ->withUnfriendDisplay("none")
               ->render();
               echo $response;
       }}

         public function addRejectConfirmFriends(){
                $username=Input::get('username');
                $addFriend=true;
                $cancelRequest=false;
                $confirmFriend=false;
                $deleteFriend=false;
                $blockFriend=false;
                $param=["addFriend"=>$addFriend,"cancelRequest"=>$cancelRequest,'confirmFriend'=>$confirmFriend,'deleteFriend'=>$deleteFriend,'blockFriend'=>$blockFriend];
                $params=array($username=>$param);
                $this->accountApi->friendsPostBy(Session::get('username'),$params);
         }
}