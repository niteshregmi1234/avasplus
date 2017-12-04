<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/29/17
 * Time: 11:48 AM
 */
class ApiAccount extends AbstractApiClient
{
    public function aboutPostBy($email,$params) {
        return $this->postNow("account/$email",$params);
    }
    public function aboutGetBy($email) {
        return $this->getNow("account/$email");
    }

}