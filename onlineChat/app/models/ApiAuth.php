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
    public function validateEmail($email) {
        $results =  (new SMTP_validateEmail())->validate(array($email));
        if ($results[$email]) {
            return true;
        } else {
            return false;
        }
    }
    public function sendMail($email) {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('niteshxxkkiller@gmail.com')
            ->setPassword('candycrush2');

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance('Verification Code')
            ->setFrom(array('niteshxxkkiller@gmail.com'))
            ->setTo(array($email))
            ->setBody('<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border:10px solid #60a83a">
                     <tbody><tr>
                     <td align="left" valign="top">
                     <table width="650" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px solid #cccccc">
                     <tbody><tr>
                     <td width="275" align="left" valign="middle" style="padding:30px">
                     <a href="http://www.vasplus.info" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.vasplus.info&amp;source=gmail&amp;ust=1511525902100000&amp;usg=AFQjCNEGVbojBzNPnQ9juSgu8Ii0FtfLyw"><img src="https://ci4.googleusercontent.com/proxy/wQFexNhVXBbhIicg14KHNe7Bdq6qLXP61f0VliT5Piytvzqi5d-fNawBPtMwPUK-SLw2NiMTlzgTB5accoUFE_h1fOo57cGc=s0-d-e1-ft#http://www.vasplus.info/logo/logo-vasplus-blog.png" alt="Vasplus Programming Blog" title="Vasplus Programming Blog" width="255" height="55" border="0" class="CToWUd"></a>
                     </td>
                     <td width="255" align="right" valign="middle" style="font-family:Arial;font-size:14px;color:#555555;padding:30px">
                     <strong>Date:</strong> 7th November, 2017 </td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     <tr>
                     <td align="left" valign="top">
                     <table width="650" border="0" cellspacing="0" cellpadding="0">
                     <tbody><tr>
                     <td colspan="3" width="100%" height="20">&nbsp;
                     </td>
                     </tr>
                     <tr>
                     <td width="20">&nbsp;</td>
                     <td width="610">
                     <p style="font-family:Arial;font-size:20px;margin-bottom:0.5em;margin-top:0">Dear Ab ab,</p>
                     </td>
                     <td width="20">&nbsp;</td>
                     </tr>
                     <tr>
                     <td width="20">&nbsp;</td>
                     <td width="610" style="font-family:Arial;font-size:14px;padding-bottom:20px">
                     <p style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#3e3e3e;line-height:24px">Your account has been created successfully at Vasplus Programming Blog dated 7th November, 2017 04:29 PM.<br><br>
                     
                     Below are your account details.<br><br>
                     
                     Fullname: Ab ab<br>
                     Username: nitesh1234<br>
                     Email Address: <a href="mailto:niteshxxkkiller@gmail.com" target="_blank">niteshxxkkiller@gmail.com</a><br>
                     Password: The password you provided during your account creation.<br><br>
                     
                     To get your account email address verified, please click on the following link:<br><br>
                     
                     <a href="http://www.vasplus.info/login/@073cfa1ce69f4534a72f6d16425fb4e5dcf9ad937e479becc2cbb875c20e77276df6ba758f49002eb6403dc9936f4fcbd22a8f6776a670e063eb7e0483f75036" style="color:blue" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.vasplus.info/login/@073cfa1ce69f4534a72f6d16425fb4e5dcf9ad937e479becc2cbb875c20e77276df6ba758f49002eb6403dc9936f4fcbd22a8f6776a670e063eb7e0483f75036&amp;source=gmail&amp;ust=1511525902100000&amp;usg=AFQjCNEnzv0MUwcxIG3nnzwkPRFXEK2ArA">Verification Link</a><br><br>
                     
                     You can at any time request the forgot password link at the <a href="http://www.vasplus.info/forgot-password" style="color:blue" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.vasplus.info/forgot-password&amp;source=gmail&amp;ust=1511525902100000&amp;usg=AFQjCNG2NnuvRx6x3ZErHfASipNuBcMDLg">Forgot Password Page</a> to change your current password if you don\'t remember it any longer.<br><br>
                     
                     Should you for any reason need our assistance, you can always reach us by visiting our <a href="http://www.vasplus.info/contact-us" style="color:blue" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=http://www.vasplus.info/contact-us&amp;source=gmail&amp;ust=1511525902100000&amp;usg=AFQjCNFEVgcwCwM8TIEiuYDLqDvpsBw9Lg">Contact Us Page</a><br><br>
                     
                     
                     Thank You!<br>
                     The Vasplus Programming Blog Support Team.<br></p>
                     </td>
                     <td width="20"></td>
                     </tr>
                     </tbody></table>
                     </td>
                     </tr>
                     </tbody></table>',"text/html");

        $result = $mailer->send($message);
    }
}