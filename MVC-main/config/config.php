<?php
$dotenv = parse_ini_file(__DIR__ . '/../.env');

define('DB_HOST', $dotenv['DB_HOST']);
define('DB_NAME', $dotenv['DB_NAME']);
define('DB_USER', $dotenv['DB_USER']);
define('DB_PASS', $dotenv['DB_PASS']);

// ใช้ MySQLi แทน PDO
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
