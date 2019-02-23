<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 18-1-3
 * Time: 下午4:36
 */
include_once "../core/util.php";
include_once "../core/accountkit.php";
$phone_login="/account/phone_login.php";
if (!isset($_POST["redirect"])){
    $redirect="/";
}
else{
    $redirect=$_POST["redirect"];
}
if ($_SERVER["REQUEST_METHOD"]!="POST"){
    dieout(400);
    exit(0);
}
if(!isset($_POST["csrf"])||!isset($_POST["code"])){
    dieout(400);
    exit(0);
}
if(!isset($_COOKIE["session_id"])||!validate_csrf($_COOKIE["session_id"],$_POST["csrf"])){
    dieout(403);
    exit(0);
}
$contact=get_contact($_POST["code"]);
if(!$contact){
    dieout(403);
    exit(0);
}
$token=get_token($contact);
if(!$token){
    redirect("verify_phone.php?invalid=true&foward=$phone_login&redirect=$redirect&contact=$contact");
    exit(0);
}
setcookie("token",$token,time()+86400*7,"/","162.105.146.180");
redirect($redirect);