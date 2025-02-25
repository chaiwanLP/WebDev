<?php

declare(strict_types=1);

// function insertCourse($course): bool
// {
//     $conn = getConnection();
//     $sql = 'insert into courses (course_name, course_code, instructor) VALUES (?,?,?)';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('sss',$course['name'], $course['code'], $course['instructor']);
//     $stmt->execute();
//     if ($stmt->affected_rows > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }

function getAllCourses() {
    $conn = getConnection();  
    $sql = 'SELECT * FROM courses';
    $result = $conn->query($sql); 
    return $result;
}
function HasEnroll(int $student_id, int $course_id){
    $conn = getConnection(); 
    $stmt_check = $conn->prepare("SELECT * FROM enrollment WHERE student_id = ? AND course_id = ?");
    $stmt_check->bind_param("ii", $student_id, $course_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $error = "Course already enrolled!";
        $stmt_check->close();   
        return false;
    } else {
        $stmt_check->close();  
        return true;
    }
}
function enrollStudentInCourse(int $student_id, int $course_id): bool {
    $conn = getConnection(); 
        $enrollment_query = 'INSERT INTO enrollment (student_id, course_id, enrollment_date) VALUES (?, ?, NOW())';
        $stmt = $conn->prepare($enrollment_query);
        $stmt->bind_param('ii', $student_id, $course_id);
        $success = $stmt->affected_rows > 0; 
        $stmt->close();
        return $success;
}
function UnEnroll(int $student_id, int $course_id): bool { 
    $conn = getConnection(); 
        $unenrollment_query = 'DELETE FROM enrollment WHERE student_id=? AND course_id=?';
        $stmt = $conn->prepare($unenrollment_query);
        $stmt->bind_param('ii', $student_id, $course_id);
        $stmt->execute();
        $success = $stmt->affected_rows > 0; 
        $stmt->close();
        return $success;
}