<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 5:25 PM
 */
class OnlineChatNotAuthenticatedException extends Exception
{
    protected $request;

    public function __construct(Illuminate\Http\Request $request) {
        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }
}