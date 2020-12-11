<?php
$link = mysqli_connect("localhost", "root", "", "Data");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}
session_start();
$id = $_SESSION['Id'];
$pull = "SELECT firstName,lastName FROM Accounts WHERE id = '$id'";
$get = mysqli_query($link, $pull);
$push = mysqli_fetch_array($get);
session_write_close();
if(isset($_POST['okay'])){
  session_start();
  $id = $_SESSION['Id'];
  $date = $_POST['date'];
  $sql = "SELECT * FROM Schedule WHERE patientID = '$id' AND RecordDate = '$date'";
  $doctorQuery = "SELECT Accounts.firstName, Accounts.lastName, Appointment.complete FROM Appointment LEFT JOIN Accounts on Appointment.id=Accounts.id WHERE Appointment.Appointments='$date'";
  session_write_close();
}
?>
