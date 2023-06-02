<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$database="message";

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

$sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(40) NOT NULL,
    l_name VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL,
    topic VARCHAR(20) NOT NULL,
    message VARCHAR(250) NOT NULL,
    message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === false) {
    die("Error creating table: " . $conn->error);
}
?>





