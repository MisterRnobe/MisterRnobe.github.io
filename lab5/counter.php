<?php
include "connector.php";

function increment()
{
    $mysql = getConnection();
    $mysql->query("UPDATE counter SET visitors = visitors + 1;");
    $rs = $mysql->query("SELECT visitors FROM counter");
    $arr = $rs->fetch_assoc();
    $rs->close();
    $mysql->close();
    return $arr['visitors'];
}