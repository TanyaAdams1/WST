<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-26
 * Time: 下午9:07
 */
include_once "../core/util.php";
if (!isset($_GET["redirect"]))
    $redirect = "/";
else
    $redirect = $_GET["redirect"];
if (isset($_COOKIE["token"])) {
    setcookie("token", $_COOKIE["token"], time() - 3600, "/", "162.105.146.180");
    delete_token($_COOKIE["token"]);
}
redirect($redirect);