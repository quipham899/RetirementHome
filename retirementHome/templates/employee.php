<?php
include '../PHPFiles/EmployeeManagement.php'
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

    <form method="post">
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>role</th>
          <th>Salary</th>
          <?php
          if(!empty(mysqli_query($link,$sql))){
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['firstName'], $row['lastName'] . "</td>";
              echo "<td>" . $row['roleName'] . "</td>";
              if($row['salary'] != Null){
              echo "<td>" . $row['salary']. "</td>";
            } else{
              echo "<td> 0 </td>";
            }
              echo "</tr>";
            }
          }
          ?>
      </table>
      <p>
          <label for="id">Employee-ID:</label>
          <input type="text" name="empID" id="newSalary">
      </p>
      <p>
          <label for="newSalary">New Salary:</label>
          <input type="number" name="newSalary" id="newSalary" step=".01" />
      </p>
      <input type="submit">Submit</input>
      <a class="buttons" href=" ">Cancel</a>

  </form>

  </body>
</html>
