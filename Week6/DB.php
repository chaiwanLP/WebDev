<?php
$host = 'db'; 
$dbname = 'MY_DATABASE'; 
$username = 'MYSQL_USER'; 
$password = 'DB6';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
