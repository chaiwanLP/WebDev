<?php
session_start();
require 'DB.php'; 

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM students WHERE id = $id");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM students");
$students = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Student List</title>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Student Management</h1>
    <a href="AddSTD.php" class="btn btn-success mb-3">Add New Student</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Prefix</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Year Level</th>
          <th>Grade</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students)) : ?>
          <?php foreach ($students as $index => $student) : ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= $student['prefix'] ?></td>
              <td><?= $student['first_name'] ?></td>
              <td><?= $student['last_name'] ?></td>
              <td><?= $student['dob'] ?></td>
              <td><?= $student['level'] ?></td>
              <td><?= $student['grade'] ?></td>
              <td>
                <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="index.php?delete=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="8" class="text-center">No data available</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
