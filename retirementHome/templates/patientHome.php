<?php
include '../PHPFiles/PatientHome.php'

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Patient's Home</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  </head>

  <body>

    <form action="form.php" method="post">
      <table>
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
      </table>
      <a class="buttons" href=" ">Ok</a>
      <a class="buttons" href=" ">Cancel</a>

    </form>

  </body>
</html>
