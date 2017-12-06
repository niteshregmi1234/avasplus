<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/29/17
 * Time: 11:48 AM
 */
class ApiAccount extends AbstractApiClient
{
    public function aboutPostBy($username,$params) {
        return $this->postNow("account/$username",$params);
    }
    public function aboutGetBy($username) {
        return $this->getNow("account/$username");
    }
    public function friendsPostBy($username,$params) {
        return $this->postNow("friends/$username",$params);
    }

}