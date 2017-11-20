<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:02 PM
 */
class AuthController
{
    protected $authApi;
    public function __construct() {
        // Instantiate the APIs the controller will use which is placed in model.
        $this->authApi = new ApiAuth();
    }
}