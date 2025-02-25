<?php

if (!isset($_SESSION['student_id'])) {
    header("Location: login");
    exit();
}

if (!isset($_GET['course_id'])) {
    die("ไม่พบรหัสวิชา");
}

$student_id = $_SESSION['student_id']; 
$course_id = $_GET['course_id'];

if(HasEnroll($student_id, $course_id)){
    if (enrollStudentInCourse($student_id, $course_id)) {
        echo "<script type='text/javascript'>
        alert('ลงทะเบียนเรียนสําเร็จ!');
        window.location.href = '/info';
      </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('เกิดข้อผิดพลาดในการลงทะเบียนเรียน');
        window.location.href = '/info';
      </script>";
        
    }
}else{
    echo "<script type='text/javascript'>
        alert('คุณลงทะเบียนวิชานี้ไปแล้ว');
        window.location.href = '/info';
      </script>";
}