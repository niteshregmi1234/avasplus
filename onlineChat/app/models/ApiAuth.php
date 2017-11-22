<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:05 PM
 */
class ApiAuth extends AbstractApiClient
{
    public $userExistsVar;
    public function authBy($email, $password) {
        return $this->getNow("authByEmailPass/_search?q=_id:"."\"".$email.":".$password."\"");
    }
    public function signUpAuthBy($email) {
        return $this->getNow("authByEmailPass/_search?q=email:"."\"".$email."\"");
    }
    public function signUpPost($credentials) {
        return $this->postNow("authByEmailPass/_search?q=_id:"."\"".$credentials["email"].":".$credentials["password"]."\"");
    }
}