<?php
declare(strict_types=1);

session_start();
require_once INCLUDES_DIR . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // เชื่อมต่อฐานข้อมูล
    $conn = getConnection();
    $stmt = $conn->prepare('SELECT id, first_name, last_name, password FROM students WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_id'] = $student['id'];
            $_SESSION['student_name'] = $student['first_name'] . ' ' . $student['last_name'];
            $_SESSION['timestamp'] = time();

            header('Location: /');
            exit;
        }
    }

    // ถ้าข้อมูลไม่ถูกต้อง
    renderView('login', ['error' => 'Invalid email or password']);
    exit;
}

renderView('login');
