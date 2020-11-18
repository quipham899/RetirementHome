<?php
include '../PHPFile/EmployeeManagement.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employees</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>

    <form action="form.php" method="post">
      <p>
          <label for="empId">Emp ID:</label>
      </p>
      <p>
          <label for="Name">Name:</label>
      </p>
      <p>
          <label for="empId">Role:</label>
      </p>
      <p>
          <label for="empId">Salary:</label>
      </p>
      <p>
          <label for="newSalary">New Salary:</label>
          <input type="text" name="newSalary" id="newSalary">
      </p>
      <a class="buttons" href=" ">Ok</a>
      <a class="buttons" href=" ">Cancel</a>

  </form>

  </body>
</html>
