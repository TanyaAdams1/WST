<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-12-6
 * Time: 下午6:54
 */
include_once "../core/util.php";
if ($_SERVER["REQUEST_METHOD"]!="GET") {
    $code = 2;
    $msg = "Invalid request";
}
elseif (!check_token($_GET["token"])){
    $code=1;
    $msg="Invalid token";
}
else{
    $info=get_info($_GET["token"]);
    $code=0;
    $msg=$info;
}
$response=[
    "success"=>$code,
    "result"=>$msg
];
header("Content-type: application/json");
echo json_encode($response);