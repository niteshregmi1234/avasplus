<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:05 PM
 */
class ApiAuth extends AbstractApiClient
{

    public function authBy($username, $password) {
        return $this->getNow("authByEmailPass/_search?q=_id:"."\"".$username.":".$password."\"");
    }
    public function signUpAuthBy($username) {
        return $this->getNow("authByEmailPass/_search?q=username:"."\"".$username."\"");
    }
    public function signUpPost($credentials) {
        return $this->postNow("authByEmailPass/".$credentials["username"].":".$credentials["passwd"],$credentials);
    }
    public function authByCode($codeName,$code) {
        return $this->getNow("authByEmailPass/_search?q=$codeName:"."\"".$code."\"");
    }
    public function deleteOldRecordAfterChangingPass($credentials) {
        return $this->deleteNow("authByEmailPass/".$credentials["username"].":".$credentials["passwd"]);
    }
    public function searchGetBy($friend) {
        return $this->getNow("authByEmailPass/_search?q=username:$friend*");
    }

    public function validateEmail($email) {
        function get_curl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $res=curl_exec($ch);
            curl_close($ch);
            $result=json_decode($res,true);
            return $result;
        }

        $apikey = "live_ec0e70ece77b830b6b9297b5a026bd6d5e00765c22ff21bece51440b696c6ffa";
        $url = 'https://api.kickbox.io/v2/verify?email='.$email.'&apikey='.$apikey;
        $response = get_curl($url);
        if($response["result"]=='undeliverable'){
            return false;
        }else{
            return true;
        }
    }
    public function sendMail($credentials,$body) {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('niteshxxkkiller@gmail.com')
            ->setPassword('candycrush2');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('Verification Code')
            ->setFrom(array('niteshxxkkiller@gmail.com'))
            ->setTo(array($credentials["email"]))
            ->setBody($body,"text/html");
            $mailer->send($message);
    }
}