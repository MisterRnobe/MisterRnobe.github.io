<?php
include "../lab5/connector.php";
header('Content-Type: application/json');

if (checkFields($_POST))
{
    exit(json_encode(array("status"=>"error", "msg"=>"Вы ввели не все поля!")));
}

$con = getConnection();
$con->set_charset("utf8");
if (checkExistence($con, $_POST['login']))
{
    exit(json_encode(array("status"=>"error", "msg"=>"Логин существует!")));
}
else {
    $stmt = $con->prepare("INSERT INTO users VALUES (?, ?, ?, SHA2(?, 256));");
    $stmt->bind_param("ssss", $_POST['login'], $_POST['name'], $_POST['email'], $_POST['password']);
    $stmt->execute();
    $stmt->close();
    echo json_encode(array("status"=>"ok"));
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}
$con->close();



function checkFields($array)
{
    $fields = array("login", "name", "password","email");
    foreach ($fields as $key)
    {
        if (!isset($array[$key]) || strlen($array[$key]) == 0)
            return true;
    }
    return false;
}
function checkExistence($con, $login)
{
    $stmt = $con->prepare("SELECT * FROM users WHERE login = ?;");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $rs = $stmt->get_result();
    if ($rs->fetch_assoc())
        $res = true;
    else
        $res = false;
    $rs->close();
    $stmt->close();
    return $res;
}