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
        // TODO: Implement retrieveByCredentials() method.
//        var_dump("ia ma here");
//        die();
        $resp = $this->authApi->authBy(
            $id = $credentials['email'],
            "",
            isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'],
            isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null);
//        Session::put($this->getSessionKey($id), $resp);
//        Session::put('first_name', $resp['first_name']);
//        Session::put('last_name', $resp['last_name']);
//        Session::put('email', $credentials['email']);
        return new OnlineChatUser($id, $resp);
    }

    public function validateCredentials(\Illuminate\Auth\UserInterface $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
    }
}