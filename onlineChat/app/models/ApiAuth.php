<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/20/17
 * Time: 6:05 PM
 */
class ApiAuth extends AbstractApiClient
{
    public $userExistsVar;
    public function authBy($email, $password) {
        return $this->getNow("authByEmailPass/_search?q=_id:"."\"".$email.":".$password."\"");
    }
    public function signUpAuthBy($email) {
        return $this->getNow("authByEmailPass/_search?q=email:"."\"".$email."\"");
    }
    public function signUpPost($credentials) {
        return $this->postNow("authByEmailPass/".$credentials["email"].":".$credentials["password"],$credentials);
    }
    public function authByCode($codeName,$code) {
        return $this->getNow("authByEmailPass/_search?q=$codeName:"."\"".$code."\"");
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

        $apikey = "live_e0151a0d127ea1873e1aed8c7dd13a3af6309fb96a6f672ad683f4e3406895ea";
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