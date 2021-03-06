<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 11:48 AM
 */
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;
use GuzzleHttp\Exception\RequestException;
class OnlineChatApiUserProvider implements UserProviderInterface
{
    protected $authApi;

    public function __construct() {
        $this->authApi = new ApiAuth();
    }
    protected function getSessionKey($id) {
        return get_class() . '|' . $id;
    }
    public function retrieveById($identifier)
    {
        // TODO: Implement retrieveById() method.
    }

    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    public function retrieveByCredentials(array $credentials)
    {
        try{
        // TODO: Implement retrieveByCredentials() method.
            if($credentials['page']=="user-log-in"){
        $resp = $this->authApi->authBy(
            $id = $credentials['username'],
            $credentials['passwd']);
            if(!empty($resp["hits"]["hits"])){
                $respond=$resp["hits"]["hits"][0]["_source"];
                Session::put($this->getSessionKey($id), $respond);
                Session::put('fullname', $respond['fullname']);
                Session::put('email', $respond['email']);
                Session::put('passwd', $credentials['passwd']);
                Session::put('username',  $credentials['username']);
                Session::put('profilePicName',  $respond['profilePicName']);
                Session::put('processCompletedStatus',$respond['process-completed-status']);
                return new OnlineChatUser($id, $respond);
            }else{
                return null;
        }
    }else if($credentials['page']=="user-sign-up"){
            $resp=$this->authApi->signUpAuthBy($id = $credentials['username']);
            if(!empty($resp["hits"]["hits"])){
                $respond=$resp["hits"]["hits"][0]["_source"];
                return new OnlineChatUser($id, $respond);
            }else{
                return null;
            }
        }


        }
    catch(RequestException $exc) {
        if($exc->getResponse() && $exc->getResponse()->getStatusCode() == 403) {
            return null;
        }
        throw $exc;
    }
    }

    public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
        return true;
    }
}