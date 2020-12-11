<?php
include '../PHPFiles/patientSearch.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<form method='post'>
  <table>
    <tr>
      <th>ID</th>
      <th>First-Name</th>
      <th>Last-Name</th>
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
      echo "<th>" . $get['firstName']. "</th>";
      echo "<th>" . $get['lastName']. "</th>";
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
