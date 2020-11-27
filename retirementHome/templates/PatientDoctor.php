<?php
include '../PHPFiles/DoctPatient.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <input type="submit" name='MedOk' />
</form>
  </body>
</html>
