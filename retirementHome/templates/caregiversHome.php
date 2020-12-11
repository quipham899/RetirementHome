<?php
include '../PHPFiles/caregiver.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Caregiver's Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </head>

  <body>

    <form method="post">
      <p>
        <table>
          <tr>
            <th>Name</th>
            <th>id</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Night Medicine</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
          </tr>
            <?php
            $i = 0;
            if(!empty(mysqli_query($link,$sql))){
              $result = mysqli_query($link,$sql);
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['firstName'], $row['lastName'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                for($x = 0; $x < 6; $x++){
                  $count = $i + $x;
                echo "<td> <input name='{$count}' type='checkbox' value='{$row['id']}'></td>";
              }
                echo "</tr>";
                $i += 6;
              }
            }
            ?>
        </table>
      </p>

      <input type="submit" name="careSub">Submit</a>
    </form>

  </body>
</html>
