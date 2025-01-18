<?php
session_start();

$id = $_GET['id'];

if (!isset($_SESSION['students'][$id])) {
    header("Location: index.php");
    exit();
}

$student = $_SESSION['students'][$id];
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dateyear = $_POST['dateyear'];
    $level = $_POST['level'];
    $grade = $_POST['grade'];

    if ($level === false || $grade === false || $level < 0 || $level > 5 || $grade < 0 || $grade > 4.00) {
      $err = 'Year Level must be between 0-5 and Grade must be between 0.00-4.00.';
  } else {
        $_SESSION['students'][$id] = [
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

<body >
  <div class="container mt-5 p-5">  
    <h1 class="text-center mb-4">Edit Student</h1>

    <?php if ($err): ?>
      <div class="alert alert-danger"><?= $err ?></div>
    <?php endif; ?>

    <form action="edit.php?id=<?= $id ?>" method="POST">
    <div class="col-lg-6 p-3 shadow rounded justify-content-center mx-auto">
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
        <label for="dateyear" class="form-label">Date of Birth :</label>
        <input type="date" id="dateyear" name="dateyear" class="form-control" value="<?= $student['dateyear'] ?>" required>
      </div>

      <div class="mb-3">
        <label for="level" class="form-label">Year Level :</label>
        <input type="number" id="level" name="level" class="form-control" value="<?= $student['level'] ?>" required min="0">
      </div>

      <div class="mb-3">
        <label for="grade" class="form-label">Grade :</label>
        <input type="number" id="grade" name="grade" class="form-control" value="<?= $student['grade'] ?>" required min="0" step="0.01">
      </div>

      <button type="submit" class="btn btn-success">Update</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
    </div>
  </div>
  
</body>
</html>
