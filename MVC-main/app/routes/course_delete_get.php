<?php

declare(strict_types=1);
$course_id = $_GET['course_id'];
$student_id = $_SESSION['student_id'];

if(UnEnroll($student_id, (int)$course_id)){
    echo "<script type='text/javascript'>
        alert('Delete Course Successfully');
        window.location.href = '/info';
      </script>";
} else {
    echo "<script type='text/javascript'>
        alert('Delete Course Failed');
        window.location.href = '/info';
      </script>";
}

exit();
