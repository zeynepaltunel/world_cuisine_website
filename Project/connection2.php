<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$database="record";

$conn=new mysqli($db_host, $db_user, $db_password);

if(!$conn)
{
    die("Database connection failed").mysqli_connect_error();
}


$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === false) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($database);

$sql = "CREATE TABLE IF NOT EXISTS records (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name_surname VARCHAR(40) NOT NULL,
    nickname VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(20) NOT NULL,
    membership_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === false) {
    die("Error creating table: " . $conn->error);
}
?>



