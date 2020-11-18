<?php
include '../PHPFiles/Doc.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Doctor's Appointments</title>
    <link href = "styles.css" rel= "stylesheet">
  </head>

  <body>

    <form action="docApp.php" method="post">
        <p>
            <label for="patientId">Patient Id:</label>
            <input type="text" name="patient" id="patientId">
        </p>
        <p>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
        </p>
        <p>
            <label for="patientName">Patient Name: <?php if(!empty($value['firstName'])){echo $value['firstName'];}?></label>
        </p>
        <input type="submit" name="ok" id="ok">
          <a class="buttons" href=" ">Cancel</a>

    </form>

  </body>
</html>
