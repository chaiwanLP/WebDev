<?php
$student = getStudentById($_SESSION['student_id']);
renderView('home_get',array('student' => $student));