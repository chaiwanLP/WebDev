<?php
session_start();

if (isset($_GET['delete'])) {
  $id = (int)$_GET['delete'];
  if (isset($_SESSION['students'][$id])) {
      unset($_SESSION['students'][$id]);
      $_SESSION['students'] = array_values($_SESSION['students']);
  }
  header("Location: index.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dateyear = $_POST['dateyear'];
    $level = $_POST['level'];
    $grade = $_POST['grade'];

    $_SESSION['students'][] = [
        'prefix' => $prefix,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dateyear' => $dateyear,
        'level' => $level,
        'grade' => $grade
    ];

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Student List</title>
</head>
<body >
  <div class="container mt-4" >
    <h1 class="text-center mb-4">Student Management</h1>
    <a href="AddStudent.php" class="btn btn-success mb-3">Add New Student</a>
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
        <?php if (!empty($_SESSION['students'])) : ?>
          <?php foreach ($_SESSION['students'] as $id => $student) : ?>
            <tr>
              <td><?= $id + 1 ?></td>
              <td><?= $student['prefix'] ?></td>
              <td><?= $student['first_name'] ?></td>
              <td><?= $student['last_name'] ?></td>
              <td><?= $student['dateyear'] ?></td>
              <td><?= $student['level'] ?></td>
              <td><?= $student['grade'] ?></td>
              <td>
                <a href="edit.php?id=<?= $id ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="index.php?delete=<?= $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7" class="text-center">No data available</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
