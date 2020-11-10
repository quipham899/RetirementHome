<?php
if(!isset($_POST['ok'])) {
  $name = "None"
} else {
  $id = $_POST["patientId"];
  $link = mysqli_connect("localhost", "root", "", "Users");

  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "SELECT firstName, lastName, id FROM Accounts WHERE id = $id ";
    if($result = mysqli_query($link, $sql)){
      if (mysqli_num_rows($results) > 0){
        $name = mysqli_fetch_array($row);
      }

    }


}
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
            <label for="patientId">Patient Id: <?php echo $name['id'] ?></label>
            <input type="text" name="patient" id="patientId">
        </p>
        <p>
            <label for="date">Date:</label>
            <input type="text" name="date" id="date">
        </p>
        <p>
            <label for="doctor">Doctor:</label>
            <input type="text" name="doctor" id="doctor">
        </p>
        <p>
            <label for="patientName">Patient Name: <?php echo $name['firstName'], $name['lastName'] ?></label>
            <input type="text" name="patientName" id="patientName">
        </p>
        <input type="text" name="ok" id="ok">
          <a class="buttons" href=" ">Cancel</a>

    </form>

  </body>
</html>
