<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-26
 * Time: 下午2:36
 */
$app_id="162540087672331";
$secret="d038e839e0c1a03a918be5c541ebd21d";
$version="v1.0";
$access_token="AA|".$app_id."|".$secret;

// Initialize variables

function get_contact($code)
{
    global $app_id;
    global $secret;
    global $version;
    global $access_token;
// Exchange authorization code for access token
    $token_exchange_url = 'https://graph.accountkit.com/' . $version . '/access_token?' .
        'grant_type=authorization_code' .
        '&code=' . $_POST['code'] .
        "&access_token=AA|$app_id|$secret";
    $data = doCurl($token_exchange_url);
    $user_id = $data['id'];
    $user_access_token = $data['access_token'];
    $refresh_interval = $data['token_refresh_interval_sec'];
    $proof=hash_hmac("sha256",$user_access_token,$secret);
// Get Account Kit information
    $me_endpoint_url = 'https://graph.accountkit.com/' . $version . '/me?' .
        'access_token=' . $user_access_token."&appsecret_proof=".$proof;
    $data = doCurl($me_endpoint_url);
    if(isset($data["phone"]))
        return $data["phone"]["number"];
    elseif (isset($data["email"]))
        return $data["email"]["address"];
    else
        return false;
}