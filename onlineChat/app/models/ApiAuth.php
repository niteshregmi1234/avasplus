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
    public function authByCode($code) {
        return $this->getNow("authByEmailPass/_search?q=code:"."\"".$code."\"");
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
    public function sendMail($credentials) {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('niteshxxkkiller@gmail.com')
            ->setPassword('candycrush2');

        $mailer = Swift_Mailer::newInstance($transport);
        $date= date("Y/m/d");
        $dateWithTime = (new DateTime("now",new DateTimeZone("Asia/kathmandu")))->format("F j, Y, g:i:s a");
        $fullName=$credentials["fullName"];
        $userName=$credentials["userName"];
        $email=$credentials["email"];
        $code=md5(rand(1000,99999999));
        $credentials["code"]=$code;
        $this->signUpPost($credentials);

        $message = Swift_Message::newInstance('Verification Code')
            ->setFrom(array('niteshxxkkiller@gmail.com'))
            ->setTo(array($credentials["email"]))
            ->setBody("<table width=\"650\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" style=\"border:10px solid #60a83a\">
                     <tbody><tr>
                     <td align=\"left\" valign=\"top\">
                     <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-bottom:1px solid #cccccc\">
                     <tbody><tr>
                     <td width=\"275\" align=\"left\" valign=\"middle\" style=\"padding:30px\">
                     <img src=".'http://localhost:8000/logo/logo-vasplus.png'." alt=\"Nepal Chat\" title=\"Nepal Chat\" width=255 height=55 border=\"0\" class=\"CToWUd\">
                     </td>
                     <td width=\"255\" align=\"right\" valign=\"middle\" style=\"font-family:Arial;font-size:14px;color:#555555;padding:30px\">
                     <strong>Date:</strong> $date </td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     <tr>
                     <td align=\"left\" valign=\"top\">
                     <table width=\"650\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                     <tbody><tr>
                     <td colspan=\"3\" width=\"100%\" height=\"20\">&nbsp;
                     </td>
                     </tr>
                     <tr>
                     <td width=\"20\">&nbsp;</td>
                     <td width=\"610\">
                     <p style=\"font-family:Arial;font-size:20px;margin-bottom:0.5em;margin-top:0\">Dear $fullName,</p>
                     </td>
                     <td width=\"20\">&nbsp;</td>
                     </tr>
                     <tr>
                     <td width=\"20\">&nbsp;</td>
                     <td width=\"610\" style=\"font-family:Arial;font-size:14px;padding-bottom:20px\">
                     <p style=\"font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#3e3e3e;line-height:24px\">Your account has been created successfully at Nepal Chat dated $dateWithTime.<br><br>
                     
                     Below are your account details.<br><br>
                     
                     Fullname: $fullName<br>
                     Username: $userName<br>
                     Email Address: <a href=\"mailto:\".$email target=\"_blank\">$email</a><br>
                     Password: The password you provided during your account creation.<br><br>
                     
                     Your Verification code is: <font color=\"blue\">$code</font> <br><br>
                     
                     Thank You!<br>
                     Nepal Chat Support Team.<br></p>
                     </td>
                     <td width=\"20\"></td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     </tbody></table>","text/html");
                     $mailer->send($message);
    }
}