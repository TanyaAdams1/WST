<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-27
 * Time: 上午10:45
 */
include_once "util.php";
function validate_token($token)
{
    $data = array(
        "secret" => "",
        "response" => $token
    );
    $option = array(
        "http" => array(
            "method" => "POST",
            "content" => http_build_query($data),
        )

    );
    $context = stream_context_create($option);
    $raw_res = file_get_contents("https://www.google.com/recaptcha/api/siteverify", false, $context);
    $res = json_decode($raw_res, true);
    if ($res["success"])
        return true;
    return false;
}
