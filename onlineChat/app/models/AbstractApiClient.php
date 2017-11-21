<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/21/17
 * Time: 10:22 AM
 */
class AbstractApiClient extends ApiBase
{
    protected $client;
    public function __construct() {
        $this->client = $this->getServiceClient();
    }
    public function postNow($resource, $param = null) {
            $data = $this->client->post($resource, ['json' => $param])->json();
            return $data;
    }
}