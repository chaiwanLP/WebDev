<?php

$student_id = $_SESSION['student_id'] ?? null;
if ($student_id !== NULL) {
    $student = getStudentById((int)$student_id);
    $course =  findCouseById((int)$student_id);
} else {
    $student = null; 
}
//echo $course;
renderView('info_get', array('student' => $student, 'course' => $course));
// while ($row = mysqli_fetch_assoc($course)):
//    echo $row['course_name'];
// endwhile;