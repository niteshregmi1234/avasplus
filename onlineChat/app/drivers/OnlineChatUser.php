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
        return $this->id;
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {
        return null;
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        return null;
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        return null;
        // TODO: Implement getRememberTokenName() method.
    }
}