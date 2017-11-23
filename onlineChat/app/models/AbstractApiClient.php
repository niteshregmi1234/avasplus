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
    public function getNow($resource) {
        try {
            $t0 = microtime(true);
            $data = $this->client->get($resource)->json();
            $t1 = microtime(true);
            Log::info('Resource Usage: ', ["message" => "|".sprintf("%6d", 1000*($t1-$t0))."|{$_SERVER['REQUEST_URI']}|$resource|"]);
            return $data;

        }catch(Exception $e) {
            if($e->getResponse()) {
                Log::error("HTTP ".$e->getRequest()->getMethod()." to ".$e->getResponse()->getEffectiveUrl().
                    " fails with payload ".$e->getRequest()->getBody());
            } // else service is not available?
            throw $e;

        }
    }
    public function postNow($resource,$param = null) {
        try {
            $t0 = microtime(true);
            $data = $this->client->post($resource,["json"=>$param])->json();
            $t1 = microtime(true);
            Log::info('Resource Usage: ', ["message" => "|".sprintf("%6d", 1000*($t1-$t0))."|{$_SERVER['REQUEST_URI']}|$resource|"]);
            return $data;

        }catch(Exception $e) {
            if($e->getResponse()) {
                Log::error("HTTP ".$e->getRequest()->getMethod()." to ".$e->getResponse()->getEffectiveUrl().
                    " fails with payload ".$e->getRequest()->getBody()->__toString());
            } // else service is not available?
            throw $e;

        }
    }
}