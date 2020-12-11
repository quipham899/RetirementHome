<?php
include '../PHPFiles/PatientHome.php'

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient's Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </head>

  <body>

    <form method="post">
      <table>
        <tr>
          <th>Doctor's Name</th>
          <th>Doctor's appointment</th>
          <th>Morning Medicine</th>
          <th>Afternoon Name</th>
          <th>Night Medicine</th>
          <th>Breakfast</th>
          <th>Lunch</th>
          <th>Dinner</th>
        </tr>
        <?php
        if(isset($sql)){
        if(!empty(mysqli_query($link,$sql))){
          $result = mysqli_query($link,$sql);
          while($get = mysqli_fetch_array($result)){
            $pull = mysqli_query($link, $doctorQuery);
            while($fetch = mysqli_fetch_array($pull)){
              echo "<tr>";
              echo "<th>" .$fetch['firstName']. " " .$fetch['lastName']. "</th>";
              if(isset($fetch['complete'])){
                echo "<th> Complete </th>";
              } else {
                  echo "<th> Not-Complete </th>";
              }
            }
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
      } else{
        echo "False";
      }
        ?>
      </table>
      <input type ='date' name='date'/>
      <label name = 'PName'>Patient Name:</label>
      <?php
      echo "<label>" . $push['firstName']. " " . $push['lastName']."</label>";
      ?>
      <input type ="submit" name="okay">Ok</button>
      <a class="buttons" href=" ">Cancel</a>
    </form>

  </body>
</html>
