<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 10:25 AM
 */
use GuzzleHttp\Client;
abstract  class ApiBase
{
    protected function getServiceClient() {
        $opts = [
            'base_url' => Config::get('onlineChat.serviceUrl').'/api/',
            'defaults' => [
                'allow_redirects' => false,
                'connect_timeout' => 15
            ]
        ];
        return new Client($opts);
    }

}