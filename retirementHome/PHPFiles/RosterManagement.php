<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}

$doctor = "SELECT * FROM Accounts WHERE role = 'doctor'";
$supervisor = "SELECT * FROM Accounts WHERE role = 'supervisor'";
$caregiver1 = "SELECT * FROM Accounts WHERE role = 'caregiver'";
$caregiver2 = "SELECT * FROM Accounts WHERE role = 'caregiver'";
$caregiver3 = "SELECT * FROM Accounts WHERE role = 'caregiver'";
$caregiver4 = "SELECT * FROM Accounts WHERE role = 'caregiver'";

if(isset($_POST['rosterSubmit'])){
  $date = $_POST['date'];
  $doctorChoice = $_POST['doctor'];
  $supervisorChoice = $_POST['supervisor'];
  $caregiver1Choice = $_POST['caregiver1'];
  $caregiver2Choice = $_POST['caregiver2'];
  $caregiver3Choice = $_POST['caregiver3'];
  $caregiver4Choice = $_POST['caregiver4'];
  $sql = "INSERT INTO Roster(rotationDate,supervisor,doctor,caregiver1,caregiver2,caregiver3,caregiver4)VALUES('$date', '$supervisorChoice',$doctorChoice, '$caregiver1Choice', '$caregiver2Choice', '$caregiver3Choice', '$caregiver4Choice')";
  if (mysqli_query($link, $sql)) {
      mysqli_close($link);
      header("Location:/PHProject/retirementHome/templates/login.html");
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
?>
