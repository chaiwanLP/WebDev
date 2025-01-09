<?php
session_start();

$id = $_GET['id'];

// ตรวจสอบว่ามีข้อมูลใน Session หรือไม่
if (!isset($_SESSION['students'][$id])) {
    header("Location: index.php");
    exit();
}

$student = $_SESSION['students'][$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $level = $_POST['level'];
    $_SESSION['students'][$id] = [
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
  <title>Edit Student</title>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Edit Student</h1>
    <form action="index.php?id=<?= $id ?>" method="POST">

      <div class="mb-3">
        <label for="prefix" class="form-label">Prefix</label>
        <select id="prefix" name="prefix" class="form-select" required>
          <option value="Mr." <?= $student['prefix'] == 'Mr.' ? 'selected' : '' ?>>Mr.</option>
          <option value="Ms." <?= $student['prefix'] == 'Ms.' ? 'selected' : '' ?>>Ms.</option>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="first_name" class="form-label">First Name :</label>
        <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $student['first_name'] ?>" required>
      </div>
      
      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name :</label>
        <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $student['last_name'] ?>" required>
      </div>
      
      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth :</label>
        <input type="date" id="dob" name="dob" class="form-control" value="<?= $student['dob'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="level" class="form-label">Year Level :</label>
        <input type="number" id="level" name="level" class="form-control" value="<?= $student['level'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="grade" class="form-label">Year Level :</label>
        <input type="number" id="grade" name="grade" class="form-control" value="<?= $student['grade'] ?>" required>
      </div>

      <button type="submit" class="btn btn-success">Update</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
