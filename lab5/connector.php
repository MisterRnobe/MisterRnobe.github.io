<?php

function getConnection()
{
    $connection = new mysqli('localhost', 'root', 'nikita', 'counter', '3306');
    return $connection;

}