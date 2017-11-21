<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 12:00 PM
 */
class OnlineChatUser implements Illuminate\Auth\UserInterface
{
    protected $id;
    protected $authorization;

    public function __construct($id, $authorization) {
        $this->id = $id;
        $this->authorization = $authorization;
    }
    /**
     * Get the API authorization data for the user.
     *
     * @return array
     */
    public function getApiAuthorization() { return $this->authorization; }
    public function getApiSessionId() { return $this->authorization['jwt']['jti']; }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}