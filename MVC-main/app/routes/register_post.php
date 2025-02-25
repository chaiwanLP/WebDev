<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $date_of_birth = !empty($_POST['date']) ? trim($_POST['date']) : NULL;
    $phone_number = trim($_POST['phone']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format!")
        window.location.href = "/register_get";</script>';
        exit;
    }

    if (strlen($password) < 6) {
        echo '<script>alert("Password must be at least 6 characters long!")
        window.location.href = "/register";</script>';
        exit;
    }

    $conn = getConnection();

    $stmt = $conn->prepare("SELECT student_id FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("Email already exists!")
        window.location.href = "/register_get";</script>';
        
        exit;
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, password, date_of_birth, phone_number, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email, $hashed_password, $date_of_birth, $phone_number, $image);


    if ($stmt->execute()) {
        echo '<script>alert("Registration successful! Please log in.")
        window.location.href = "/login";</script>';
        exit;
    } else {
        echo '<script>alert("Registration failed. Please try again.")
        window.location.href = "/login";</script>';
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>
