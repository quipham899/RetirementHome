
<?php
include '../PHPFiles/DocHome.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor's Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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
        echo "<td>" . $row['firstName'].  " " .$row['lastName'] . "</td>";
        echo "<td>" . $row['Appointments'] . "</td>";
        if(isset($row['comment'])){
        echo "<td>" . $row['Comment']. "</td>";
      } else{
        echo "<td> None </td>";
      }
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
            echo "<tr>";
            echo "<td>" . $record['firstName'], $record['lastName'] . "</td>";
            echo "<td>" . $record['Appointments'] . "</td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
      <input type="submit" name='AppointmentTill'>Submit</a>
    </form>

  </body>
</html>
