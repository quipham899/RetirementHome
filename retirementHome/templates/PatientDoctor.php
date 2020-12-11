<?php
include '../PHPFiles/DoctPatient.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<table>
  <tr>
<th>Date</th>
<th>Comment</th>
<th>Morning Medication</th>
<th>Afternoon Medication</th>
<th>Night Medication</th>
</tr>
<?php
if(!empty(mysqli_query($link,$search))){
  $pull=  mysqli_query($link, $search);
  while($fetch = mysqli_fetch_array($pull)){
    echo "<tr>";
    echo "<td>" . $fetch['Appointments'] . "</td>";
    echo "<td>" .$fetch['Comment'] . "</td>";
    echo "<td>" . $fetch['MornMed'] . "</td>";
    echo "<td>" . $fetch['AfternoonMed'] . "</td>";
    echo "<td>" . $fetch['NightMed'] . "</td>";
    echo "</tr>";
   }
}
?>
</table>
<form method='post'>
  <label>New Prescription</label>
  <table>
  <tr>
  <th>Comment</th>
  <th>Morning Medication</th>
  <th>Afternoon Medication</th>
  <th>Night Medication</th>
</tr>
<tr>
  <th><input type='text' name='Comment'/></th>
  <th><input type='text' name='MornMed'/></th>
  <th><input type='text' name='AfterMed'/></th>
  <th><input type='text' name='NightMed'/></th>
</tr>
</table>
<?php
  if($get[0] == $date){
  echo "<input type='submit' name='MedOk' />";
}
  ?>
</form>
  </body>
</html>
