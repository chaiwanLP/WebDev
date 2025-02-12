<?php

function getConnection(): mysqli
{
    $hostname = '26.12.207.51';
    $dbName = 'DB_webGoEventive';
    $username = 'DB_teamL';
    $password = 'DB_FinalProject';
    $port = 3306;
    $conn = new mysqli($hostname, $username, $password, $dbName, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
// require_once DATABASE_DIR . '/students.php';