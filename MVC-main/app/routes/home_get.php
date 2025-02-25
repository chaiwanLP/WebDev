<?php


if (!isset($_SESSION['student_id'])) {
    header("Location: login");
    exit(); 
}

$student_id = $_SESSION['student_id'] ?? null;

if ($student_id !== null) {
    $student = getStudentById((int)$student_id);
} else {
    $student = null; 
}

renderView('home_get', array('student' => $student));
?>
