<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-26
 * Time: 下午4:14
 */
include_once "auth.php";

function dieout($num){
    if($num==400){
        header("HTTP/1.1 400 Bad Request");
    echo <<<INF
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>400 Bad Request</title>
</head><body>
<h1>Bad Request</h1>
<p>Your browser sent a request that this server could not understand.<br />
You may want to go back to <a href="/">Home Page</a>.
</p>
</body></html>
INF;
    }
    elseif ($num==500){
        header("HTTP/1.1 500 Internal Server Error");
    echo <<<INF
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>500 Internal Server Error</title>
</head><body>
<h1>Internal Server Error</h1>
<p>The server encountered an internal error or misconfiguration and was unable to complete your request.<br />
You may want to go back to <a href="/">Home Page</a>.
</p>
</body></html>

INF;
    }
    elseif ($num==403){
        header("HTTP/1.1 403 Forbidden");
        echo <<<ECO

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>403 Forbidden</title>
</head><body>
<h1>Forbidden</h1>
<p>You don't have permission to access certain resources
on this server.<br />
You may want to go back to <a href="/">Home Page</a>.
</p>
</body></html>

ECO;

    }
    elseif ($num==405){
        header("HTTP/1.1 405 Method Not Allowed");
        echo <<<INF
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>405 Method Not Allowed</title>
</head><body>
<h1>Method Not Allowed</h1>
<p>Your browser sent a request, the method of which is not allowed.<br />
You may want to go back to <a href="/">Home Page</a>.
</p>
</body></html>
INF;
    }
    die("");
}

function redirect($url){
    header("HTTP/1.1 303 See Other");
    header("Location: $url",false);

}

function session_csrf(){
    $sessid=bin2hex(random_bytes(16));
    $csrf=bin2hex(random_bytes(16));
    global $sql;
    $sql->query("INSERT INTO session VALUES (\"$sessid\",\"$csrf\")");
    $res=[
        "session_id"=>$sessid,
        "csrf"=>$csrf
    ];
    return $res;
}

function getcsrf($sessid){
    global $sql;
    $res=$sql->query("SELECT csrf FROM session WHERE session_id=\"$sessid\"");
    if($res->num_rows==0)
        return false;
    return $res->fetch_row()[0];
}

function validate_csrf($sessid,$csrf){
    global $sql;
    $sessid=$sql->escape_string($sessid);
    $csrf=$sql->escape_string($csrf);
    $res=$sql->query("SELECT * FROM session WHERE session_id=\"$sessid\" AND csrf=\"$csrf\"");
    if ($res->num_rows>0)
        return true;
    return false;
}


// Method to send Get request to url
function doCurl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return $data;
}