<?php
session_start();
$accessLevel= ['C'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();
$link = mysqli_connect("localhost", "root", "", "Data");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }

session_start();
$myId = $_SESSION['Id'];
$id = $_SESSION['patientID'];
$date = date("Y-m-d");
$search = "SELECT Appointment.Appointments, Appointment.Comment, Appointment.PatientID, Medication.PatientID, Medication.MornMed,Medication.AfternoonMed,Medication.NightMed FROM Appointment LEFT JOIN Medication ON Appointment.PatientID=Medication.PatientID WHERE Appointment.PatientID='$id'";
$last = "SELECT MAX(Appointments) FROM Appointment WHERE PatientID='$id' AND id = '$myId'";
$pull = mysqli_query($link,$last);
$get = mysqli_fetch_array($pull);
if(isset($_POST['MedOk'])){
  $Comment = $_POST['Comment'];
  $Morn = $_POST['MornMed'];
  $After = $_POST['AfterMed'];
  $Night = $_POST['NightMed'];
  $insertion = "INSERT INTO Medication(PatientID,assignDate,MornMed,AfternoonMed,NightMed)VALUES('$id','$date','$Morn','$After','$Night')";
  $check = "UPDATE Schedule SET complete = 'True' WHERE patientID='$id' AND id = ";
  mysqli_query($link,$check);
  if (mysqli_query($link, $insertion)) {
    echo "work";
  } else {
      echo "ERROR: Could not able to execute $insertion. " . mysqli_error($link);
  }
}
?>
