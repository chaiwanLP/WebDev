<?php
session_start();

$student_name = $_SESSION['student_name'] ?? 'Guest';

echo "<h1>Welcome, $student_name</h1>";

if (isset($_SESSION['student_id'])) {
    echo "<nav>
        <a href='/'>Home</a>
        <a href='/students'>Students</a>
        <a href='/courses'>Courses</a>
        <a href='/logout'>Logout</a>
    </nav>";
} else {
    echo "<nav><a href='/login'>Login</a></nav>";
}
?>
