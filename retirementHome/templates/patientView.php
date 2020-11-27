<?php
include '../PHPFiles/patientSearch.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<form method='post'>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Emergency Contact</th>
      <th>Admission Date</th>
    </tr>
  <?php
  if(isset($search)){
    echo $search;
  if(!empty(mysqli_query($link,$search))){
    $result = mysqli_query($link,$search);
    while($get = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<th>" . $get['id'] . "</th>";
      echo "<th>" . $get['firstName'], $get['lastName'] . "</th>";
      echo "<th>" . $get['EmergencyContact'] . "</th>";
      echo "<th>" . $get['AdmissionDate'] . "</th>";
      echo "</tr>";
    }

  }
}
  ?>
</table>
  <input type="text" name='id'/>
  <input type="text" name='firstName'/>
  <input type="text" name='lastName'/>
  <input type="text" name='EContact'/>
  <input type="text" name='AdmissionDate'/>
  <input type="submit" name='subInfo'/>
</form>
  </body>
</html>
