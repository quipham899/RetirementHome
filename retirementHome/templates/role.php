<?php
include '../PHPFiles/roleManagement.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Role Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </head>

  <body>
    <form method="post">
      <p>
        <?php
        if(!empty(mysqli_query($link,$sql))){
          $result = mysqli_query($link,$sql);
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['roleName'] . "</td>";
            echo "<td>" . $row['accessLevel'] . "</td>";
            echo "</tr>";
          }
        }
        ?>
      </p>
      <p>
          <label for="newRole">New Role:</label>
          <input type="text" name="newRole" id="newRole">
      </p>
      <p>
          <label for="accessLevel">Access Level:</label>
          <input type="text" name="accessLevel" id="accessLevel">
      </p>
      <input type="submit" name="roleOk"></input>
      <a class="buttons" href=" ">Cancel</a>

  </form>

  </body>
</html>
