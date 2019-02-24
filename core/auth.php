<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-26
 * Time: 下午3:26
 */
if (!isset($sql)) {
    $sql = new mysqli("",
        "",
        "",
        "");
}
if(!$sql||$sql->errno){
    dieout(500);
}
function check_token($token)
{
    /** @var mysqli $sql */
    global $sql;
    $token=$sql->escape_string($token);
    $res = $sql->query("SELECT name,type FROM account WHERE token=\"$token\"");
    if (!$res||$res->num_rows==0 || $sql->errno)
        return false;
    $row = $res->fetch_row();
    return $row[1];
}

/**
 * @param $name
 * @param $password
 * @return bool|string FLASE or token
 */
function check_passwd($name, $password)
{
    /** @var mysqli $sql */
    global $sql;
    $name=$sql->escape_string($name);
    $res = $sql->query("SELECT hash,token FROM account WHERE name=\"$name\"");
    if($res->num_rows==0)
        return false;
    $row=$res->fetch_row();
    if (!$res || !password_verify($password, $row[0]))
        return false;
    if(strlen($row[1])<20) {
        do {
            $token = $sql->escape_string(bin2hex(random_bytes(50)));
            $token_res = $sql->query("SELECT * FROM account WHERE token=\"$token\"");
        } while ($token_res->num_rows != 0);
        $res = $sql->query("UPDATE account SET token=\"$token\" WHERE name=\"$name\"");
    }
    else
        $token=$row[1];
    return $token;
}

function get_info($token){
    global $sql;
    if(!isset($token)||strlen($token)<20)
        return false;
    /** @var mysqli $sql */
    $token=$sql->escape_string($token);
    $res=$sql->query("SELECT name,type,contact FROM account WHERE token=\"$token\"");
    if(!$res||$res->num_rows==0)
        return false;
    $ret=array();
    $row=$res->fetch_row();
    $ret["name"]=$row[0];
    $ret["type"]=$row[1];
    $ret["contact"]=$row[2];
    return $ret;
}

function delete_token($token){
    global /** @var mysqli $sql */$sql;
    if(get_info($token)){
        $sql->query("UPDATE account SET token=\"\" WHERE token=\"$token\"");
    }

}

function get_token($contact){
    global /** @var mysqli $sql */ $sql;
    $res=$sql->query("SELECT token FROM account WHERE contact=\"$contact\"");
    if(!$res||$res->num_rows==0)
        return false;
    $row=$res->fetch_row();
    if(strlen($row[1])<20) {
        do {
            $token = $sql->escape_string(bin2hex(random_bytes(50)));
            $token_res = $sql->query("SELECT * FROM account WHERE token=\"$token\"");
        } while ($token_res->num_rows != 0);
        $res = $sql->query("UPDATE account SET token=\"$token\" WHERE contact=\"$contact\"");
    }
    else
        $token=$row[1];
    return $token;
}
