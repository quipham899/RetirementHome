<?php
include '../PHPFiles/EmployeeManagement.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employees</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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
