
<?php
include '../PHPFiles/DocHome.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor's Home</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>

    <form method="post">
      <table>
      <tr>
      <th>Name</th>
      <th>Date</th>
      <th>Comment</th>
      <th>Morning Medication</th>
      <th>Afternoon Medication</th>
      <th>Night Medication</th>
    </tr>
    <?php
      $result = mysqli_query($link,$sql);
      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['firstName'], $row['lastName'] . "</td>";
        echo "<td>" . $row['Appointments'] . "</td>";
        echo "<td>" . $row['Comment']. "</td>";
        if(!empty($row['MorMed'])){
        echo "<td>" . $row['MornMed'] . "</td>";
      } else{
        echo "<th>None</th>";
      }
      if(!empty($row['AfternoonMed'])){
        echo "<td>" . $row['AfternoonMed'] . "</td>";
      } else{
        echo "<th>None</th>";
      }
      if(!empty($row['NightMed'])){
        echo "<td>" . $row['NightMed'] . "</td>";
      }
      else{
        echo "<th>None</th>";
      }
      echo"<th><input type='submit' name='moveOn' value='{$row['id']}'/></th>";
        echo "</tr>";
      }
    ?>
    </table>
      <p>
          <label for="appointments">Appointments:</label>
          <input type="date" name="appointments" id="appointments">
      </p>
      <table>
        <tr>
          <th>Patient</th>
          <th>Date</th>
            <th>View-Patient</th>
        </tr>
        <?php
        if(!empty($get)){
          $data = mysqli_query($link,$get);
          while($record = mysqli_fetch_array($data)){
            echo "<td>" . $record['firstName'], $record['lastName'] . "</td>";
            echo "<td>" . $record['Appointments'] . "</td>";
          }
        }
        ?>
      </table>
      <input type="submit" name='AppointmentTill'>Submit</a>
    </form>

  </body>
</html>
