<?php
function getInfo()
{
    return array("ip"=>$_SERVER['REMOTE_ADDR'], "agent" => $_SERVER['HTTP_USER_AGENT']);

}