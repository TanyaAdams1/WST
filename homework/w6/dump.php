<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-11-9
 * Time: 下午10:32
 */
header("Content-type: text/plain");
foreach ($_GET as $key=>$val){
    echo "$key: $val\n\n";
}