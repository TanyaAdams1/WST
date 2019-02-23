<?php
/**
 * Created by IntelliJ IDEA.
 * User: bill
 * Date: 17-10-27
 * Time: 下午7:38
 */

include_once "../../core/util.php";
global $sql;
/* @var mysqli $sql */
if ($_SERVER["REQUEST_METHOD"] != "POST")
    dieout(405);
if ($_POST["type"] == "host") {
    if (!isset($_POST["name"]) || !isset($_POST["date"]) || !isset($_POST["place"]))
        dieout(400);
}