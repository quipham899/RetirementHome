<?php
session_start();
$accessLevel= ['A','B','C'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();
$link = mysqli_connect("localhost", "root", "", "Data");


if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}

if(isset($_POST['day'])){
$day = $_POST['day'];
$doctorGet = "SELECT Roster.doctor, Roster.rotationDate, Accounts.firstName, Accounts.lastName, Accounts.id FROM Roster RIGHT JOIN Accounts ON Roster.doctor=Accounts.id WHERE Roster.rotationDate = '$day'";
$doctorDetails = array();
$pull = mysqli_query($link,$doctorGet);
while($get = mysqli_fetch_array($pull)){
$doctorDetails[] = $get;
}
echo json_encode($doctorDetails);
}
if(isset($_POST['patientNum'])){
$id = $_POST['patientNum'];
$userArray = array();
$person = "SELECT * FROM Accounts WHERE id=$id";
$query = mysqli_query($link,$person);
$user = mysqli_fetch_array($query);
echo json_encode($user);
}

if(isset($_POST['ok'])){
  $id = $_POST['patient'];
  $day = $_POST['date'];
  $doctor = $_POST['doctor'];
  $sql = "INSERT INTO Appointment(id,appointments,PatientId,Comment)VALUES('$doctor','$day','$id', 'No')";
  if (mysqli_query($link, $sql)) {
      mysqli_close($link);
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
?>
