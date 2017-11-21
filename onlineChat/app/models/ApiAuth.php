<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:05 PM
 */
class ApiAuth extends AbstractApiClient
{
    public function authBy($email, $pass, $ip, $ua) {
        return $this->postNow('authByEmailPass', get_defined_vars());
    }
}