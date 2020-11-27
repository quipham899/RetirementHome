<?php
include '../PHPFiles/caregiver.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Caregiver's Home</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

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
