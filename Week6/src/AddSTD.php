<?php
session_start();
include "DB.php";

$err = '';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dateyear'];
    $level = $_POST['level'];
    $grade = filter_var($_POST['grade'], FILTER_VALIDATE_FLOAT);

    if ($level < 0 || $level > 5 || $grade < 0 || $grade > 4.00) {
        $err = 'Year Level must be between 0-5 and Grade must be between 0.00-4.00.';
    } else {
        $prefix = htmlspecialchars($prefix);
        $first_name = htmlspecialchars($first_name);
        $last_name = htmlspecialchars($last_name);
        $dob = htmlspecialchars($dob);
        $level = htmlspecialchars($level);
        $grade = htmlspecialchars($grade);
        $stmt = $conn->prepare("INSERT INTO students (prefix, first_name, last_name, dob, level, grade) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdd", $prefix, $first_name, $last_name, $dob, $level, $grade);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $err = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Student</title>
</head>
<body>
  <div class="container mt-5 p-5">
    <h1 class="text-center mb-4">Add New Student</h1>
    <?php if ($err): ?>
      <div class="alert alert-danger"><?= $err ?></div>
    <?php endif; ?>
    <form action="AddSTD.php" method="POST">
      <div class="col-lg-6 p-3 shadow rounded justify-content-center mx-auto">
        <div class="mb-3">
          <label for="prefix" class="form-label">Prefix</label>
          <select id="prefix" name="prefix" class="form-select" required>
            <option value="">Select Prefix</option>
            <option value="Mr.">Mr.</option>
            <option value="Ms.">Ms.</option>
          </select>
        </div>
        
        <div class="mb-3">
          <label for="first_name" class="form-label">First Name :</label>
          <input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter Your First Name">
        </div>
        
        <div class="mb-3">
          <label for="last_name" class="form-label">Last Name :</label>
          <input type="text" id="last_name" name="last_name" class="form-control" required placeholder="Enter Your Last Name">
        </div>
        
        <div class="mb-3">
          <label for="dateyear" class="form-label">Date of Birth :</label>
          <input type="date" id="dateyear" name="dateyear" class="form-control" required>
        </div>
  
        <div class="mb-3">
          <label for="level" class="form-label">Year Level :</label>
          <input type="number" id="level" name="level" class="form-control" required placeholder="Enter Your Year Level" min="0" max="5">
        </div>
  
        <div class="mb-3">
          <label for="grade" class="form-label">Grade :</label>
          <input type="number"  id="grade" name="grade" class="form-control" required placeholder="Enter Your Grade" step="0.01" min="0" max="4.00">
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
