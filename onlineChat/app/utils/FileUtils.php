<?php

/**
 * Created by PhpStorm.
 * User: nregmi
 * Date: 11/29/17
 * Time: 12:57 PM
 */
class FileUtils
{
public function makeSeparateDirectoryForUsersUsingEmails($username,$image){
    $dir = $_SERVER['DOCUMENT_ROOT'] . "/users/$username/profilePictures";
    $dateWithTime = (new DateTime("now",new DateTimeZone("Asia/kathmandu")))->format("Y-m-d-g:i:s_a");
    $imageFileName=$image->getClientOriginalName();
    $imageExtension=$image->getClientOriginalExtension();

    if(!file_exists($dir)){
        mkdir($dir,0777,true);
        chmod($dir,0777);
        $image->move($dir."/",$imageFileName);
        rename($dir."/".$imageFileName,$dir."/".($dateWithTime.".".$imageExtension));
        return ($dateWithTime.".".$imageExtension);
    }else{
        $image->move($dir."/",$imageFileName);
        rename($dir."/".$imageFileName,$dir."/".($dateWithTime.".".$imageExtension));
        return ($dateWithTime.".".$imageExtension);
    }

   }
}