<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Student</title>
</head>
<style>
    label{
        font-weight: bold;
    }
</style>
<body>
  <div class="container mt-5  p-4">
      <h1 class="text-center mb-4" style="font-weight: bold" >Add New Student</h1>
    <div class="row justify-content-center p-4 ">
      <div class="col-md-6 bg-warning p-4 rounded shadow">
      <form action="Add-student_Action.php" method="POST">
          <div class="mb-3">
              <label for="ID" class="form-label">ID</label>
              <input type="text" id="ID" name="ID" class="form-control" required placeholder="Enter Your ID">
            </div>

            <div class="mb-3">
              <label for="prefix" class="form-label">Prefix</label>
              <select id="prefix" name="prefix" class="form-select" required > 
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
              </select>
            </div>

      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" required placeholder="Enter Your First Name">
      </div>

      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required placeholder="Enter Your Last Name">
      </div>

      <div class="mb-3">
          <label for="dateofyear" class="form-label">Date of Birth</label>
          <input type="date" id="dateofyear" name="dateofyear" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="yearlevel" class="form-label">Year Level</label>
          <input type="number" id="yearlevel" name="yearlevel" class="form-control" required placeholder="Enter Your Year Level">
        </div>

        <div class="mb-3">
          <label for="GPA" class="form-label">GPA</label>
          <input type="number" id="GPA" name="GPA" class="form-control" required placeholder="Enter Your GPA : ">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
      
    </form>
    
      </div>
    </div>
    
  </div>
</body>
</html>
