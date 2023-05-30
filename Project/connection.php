<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="yummy!";

$connected=mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(!$connected)
{
    die("Database connection failed").mysqli_connect_error();
}

?>