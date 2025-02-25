<?php

declare(strict_types=1);
$course_id = $_GET['course_id'];
$student_id = $_SESSION['student_id'];

if(UnEnroll($student_id, (int)$course_id)){
    echo "<script type='text/javascript'>
        alert('ลบเรียนสําเร็จ');
        window.location.href = '/info';
      </script>";
} else {
    echo "<script type='text/javascript'>
        alert('ลบเรียนไม่สําเร็จ');
        window.location.href = '/info';
      </script>";
}

exit();
