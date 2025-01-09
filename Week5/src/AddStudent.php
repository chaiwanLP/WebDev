<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $level = $_POST['level'];
    $grade = $_POST['grade'];

    $_SESSION['students'][] = [
        'prefix' => $prefix,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dob' => $dob,
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
  <title>Add Student</title>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Add New Student</h1>
    <form action="index.php" method="POST">
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
        <label for="dob" class="form-label">Date of Birth :</label>
        <input type="date" id="dob" name="dob" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="level" class="form-label">Year Level :</label>
        <input type="number" id="level" name="level" class="form-control" required placeholder="Enter Your Year Level">
      </div>

      <div class="mb-3">
        <label for="grade" class="form-label">Grade :</label>
        <input type="number" id="grade" name="grade" class="form-control" required placeholder="Enter Your Grade">
      </div>


      <button type="submit" class="btn btn-success">Save</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
