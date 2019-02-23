<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-27
 * Time: 下午8:02
 * POST only
 * Contains: name, password, reCAPTCHA token.
 * "type":"query" for looking for duplicate name, "crea...."for signing up.
 */
include_once "../core/util.php";
include_once "../core/recaptcha.php";
include_once "../core/accountkit.php";
global $sql;
/* @var mysqli $sql*/
if($_SERVER["REQUEST_METHOD"]!="POST")
    dieout(405);
if(!isset($_POST["type"])||!isset($_POST["name"]))
    dieout(400);
$name=$_POST["name"];
if($_POST["type"]=="query"){
    header("Content-type: application/json");
    $res=$sql->query("SELECT * FROM account WHERE name=\"$name\"");
    if ($res->num_rows==0&&strlen($name)!=0)
        $code=0;
    else
        $code=1;
    $response=array(
        "code"=>$code
    );
    echo json_encode($response);
}
elseif ($_POST["type"]=="create"){
    if(!isset($_POST["g-recaptcha-response"])||!isset($_POST["password"])||!isset($_POST["redirect"])||!isset($_POST["csrf"])||!isset($_POST["code"])
        ||!isset($_COOKIE["session_id"]))
        dieout(400);
    $redir=$_POST["redirect"];
    $token=$_POST["g-recaptcha-response"];
    $password=$_POST["password"];
    $csrf=$_POST["csrf"];
    $session_id=$_COOKIE["session_id"];
    $code=$_POST["code"];
    $contact=get_contact($code);
    if (!validate_csrf($session_id,$csrf)||!$contact)
        dieout(403);
    /** @var string name */
    if(!validate_token($token))
        dieout(403);
    $name_res=$sql->query("SELECT * FROM account WHERE name=\"$name\"");
    if($name_res->num_rows!=0||strlen($name)==0)
        dieout(400);
    $name=$sql->escape_string($name);
    $hash=$sql->escape_string(password_hash($password,PASSWORD_DEFAULT));
    $res=$sql->query("INSERT INTO account VALUES(\"$name\",\"$hash\",\"\",\"User\",\"$contact \")");

    $token=check_passwd($name,$password);
    $res=$sql->query("UPDATE account SET token=\"$token\" WHERE name=\"$name\"");
    if($res) {
        setcookie("token", $token, time() + 86400 * 7, "/", "162.105.146.180");
        redirect($redir);
    }
    else
        dieout(500);
}


