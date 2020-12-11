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
session_start();
$id = $_SESSION['Id'];
$sql = "SELECT Accounts.firstName,Accounts.lastName, Accounts.id,Appointment.Comment,Appointment.Appointments , Medication.PatientID, Medication.MornMed, Medication.AfternoonMed,Medication.NightMed FROM Appointment LEFT JOIN Accounts ON Appointment.PatientID=Accounts.id LEFT JOIN Medication ON Appointment.PatientID=Medication.PatientID WHERE Appointment.id ='$id'";
if(isset($_POST['AppointmentTill'])){
  $date = $_POST['appointments'];
  $get = "SELECT Patient.id, Appointment.Appointments, Appointment.PatientID, Accounts.id, Accounts.firstName, Accounts.lastName FROM Appointment LEFT JOIN Patient ON Appointment.PatientID=Patient.id LEFT JOIN Accounts ON Appointment.PatientID=Accounts.id WHERE Appointment.appointments <= '$date'";
  if(mysqli_query($link,$sql)){
    echo "Works";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
if(isset($_POST['moveOn'])){
  session_start();
  $_SESSION['patientID'] = $_POST['moveOn'];
  session_write_close();
  header("Location:/PHProject/retirementHome/templates/PatientDoctor.php");

}
?>
