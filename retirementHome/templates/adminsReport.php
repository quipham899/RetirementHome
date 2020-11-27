<?php
include '../PHPFiles/AdminReport.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin's Report</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>
    <form method="post">
        <p>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
        </p>
        <p>
            <label for="missedPatientActivity">Missed Patient Activity:</label>
            <table>
              <tr>
                <th>Doctor's Name</th>
                <th>Doctor's appointment</th>
                <th>Patient's Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Name</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
              </tr>
              <?php
              if(isset($doctorQuery)){
                $pull = mysqli_query($link, $doctorQuery);
                while($pullInfo = mysqli_fetch_array($pull)){
                  echo "<tr>";
                  if(isset($pullInfo['firstName'])){
                    echo "<tr>";
                    echo "<th>" . $pullInfo['firstName'], $pullInfo['lastName']. "</th>";
                  } else{
                    echo "<th>None</th>";
                  }
                  if(isset($pullInfo['complete'])){
                    echo "<th> Completed </th>";
                  } else{
                    echo "<th>None</th>";
                  }
                }
              }
              if(isset($query)){
                $row = mysqli_query($link, $query);
                while($get = mysqli_fetch_array($row)){
                  echo "<th>" . $get['firstName'], $get['lastName'] . "</th>";
                  if(isset($get['MornMed']) and $get['MornMed'] != 'False') {
                  echo "<th> Completed</th>";
                } else{
                  echo "<th> Not complete</th>";
                }
                if(isset($get['AfterMed']) and $get['AfterMed'] != 'False') {
                echo "<th> Completed</th>";
              } else{
                echo "<th> Not complete</th>";
              }
              if(isset($get['NightMed']) and $get['NightMed'] != 'False') {
              echo "<th> Completed</th>";
            } else{
              echo "<th> Not complete</th>";
            }
            if(isset($get['Breakfast']) and $get['Breakfast'] != 'False') {
            echo "<th> Completed</th>";
          } else{
            echo "<th> Not complete</th>";
          }
          if(isset($get['Lunch']) and $get['Lunch'] != 'False') {
          echo "<th> Completed</th>";
        } else{
          echo "<th> Not complete</th>";
        }
        if(isset($get['Dinner']) and $get['Dinner'] != 'False') {
        echo "<th> Completed</th>";
      } else{
        echo "<th> Not complete</th>";
      }
                  echo "</tr>";
                }
              }
              ?>
            </table>
        </p>

        <input name='reportOK' type='submit' />
        <a class="buttons" href=" ">Cancel</a>

    </form>
  </body>
</html>
