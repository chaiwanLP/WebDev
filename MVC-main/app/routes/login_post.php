<?php
declare(strict_types=1);

getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $conn = getConnection();
    $stmt = $conn->prepare('SELECT * FROM students WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        if (password_verify($password,$student['password'])) {
            $_SESSION['student_id'] = $student['student_id'];
            $_SESSION['student_name'] = $student['first_name'] . ' ' . $student['last_name'];
            $_SESSION['timestamp'] = time();
            echo'<script>alert("Login successful")</script>
            <script>window.location.href = "/";</script>';
            
            exit();
        }else{
            echo '<script>alert("Invalid Email or Password")</script>';
            renderView('login_get', ['error' => 'Invalid email or password']);
        }
    }else{
        echo '<script>alert("No Account Found")</script>';
        renderView('login_get');
    }

    exit();
}

