<?php

include "../lab5/connector.php";
header('Content-Type: application/json');


if (checkFields($_POST))
{
    exit(json_encode(array("status"=>"error")));
}

$con = getConnection();
$con->set_charset("utf8");
$stmt = $con->prepare("SELECT * FROM users WHERE login  = ? AND password = SHA2(?, 256);");
$stmt->bind_param("ss", $_POST['login'], $_POST['password']);
$stmt->execute();
$rs = $stmt->get_result();

$response = "";
if ($arr = $rs->fetch_assoc())
{
    $response = json_encode(array("status"=>"ok"));
    session_start();
    $_SESSION['login'] = $arr['login'];
    $_SESSION['name'] = $arr['name'];
    $_SESSION['email'] = $arr['email'];
}
else
    $response = json_encode(array("status"=>"error"));
$rs->close();
$stmt->close();
$con->close();

echo $response;


function checkFields($array)
{
    $fields = array("login","password");
    foreach ($fields as $key)
    {
        if (!isset($array[$key]) || strlen($array[$key]) == 0)
            return true;
    }
    return false;
}