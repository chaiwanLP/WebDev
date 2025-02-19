<?php

declare(strict_types=1);

if (!isset($_GET['id'])) {
    renderView('students_get');
    exit;
} else {
    $id = (int)$_GET['id'];
    $res = deleteStudentsById($id);
    echo $res;
    if($res) {
        renderView('students_get');
    }else {
        badRequest(message: 'Something went wrong! on delete student');
    }
    
}