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
        return $this->postNow("authByEmailPass/_search?q=email:nregmi@deerwalk.com", get_defined_vars());
    }
}