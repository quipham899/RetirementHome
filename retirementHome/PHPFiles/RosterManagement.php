<?php
session_start();
$accessLevel= ['A','B'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();
$link = mysqli_connect("localhost", "root", "", "Data");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}

$doctor = "SELECT * FROM Accounts WHERE role = 'C'";
$supervisor = "SELECT * FROM Accounts WHERE role = 'B'";
$caregiver1 = "SELECT * FROM Accounts WHERE role = 'D'";
$caregiver2 = "SELECT * FROM Accounts WHERE role = 'D'";
$caregiver3 = "SELECT * FROM Accounts WHERE role = 'D'";
$caregiver4 = "SELECT * FROM Accounts WHERE role = 'D'";

if(isset($_POST['rosterSubmit'])){
  $group = $_POST['group'];
  $select = "SELECT * FROM Patient WHERE GroupName = '$group'";
  $process = mysqli_query($link, $select);
  $get = mysqli_fetch_array($process);
  $date = $_POST['date'];
  $doctorChoice = $_POST['doctor'];
  $supervisorChoice = $_POST['supervisor'];
  $caregiver1Choice = $_POST['caregiver1'];
  $caregiver2Choice = $_POST['caregiver2'];
  $caregiver3Choice = $_POST['caregiver3'];
  $caregiver4Choice = $_POST['caregiver4'];
  $sql = "INSERT INTO Roster(rotationDate,supervisor,doctor,caregiver1,caregiver2,caregiver3,caregiver4, groupName)VALUES('$date', '$supervisorChoice',$doctorChoice, '$caregiver1Choice', '$caregiver2Choice', '$caregiver3Choice', '$caregiver4Choice', '$group')";
  if (mysqli_query($link, $sql)) {
      mysqli_close($link);
      header("Location:/PHProject/retirementHome/templates/login.html");
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
?>
