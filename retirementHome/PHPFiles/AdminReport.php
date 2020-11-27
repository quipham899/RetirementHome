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
if(isset($_POST['reportOK'])){
  $date = $_POST['date'];
  $query = "SELECT * FROM Schedule LEFT JOIN Accounts ON Schedule.patientID=Accounts.id WHERE RecordDate = '$date' AND 'False' in (MornMed,AfterMed,NightMed,Breakfast,Lunch,Dinner)";
  $doctorQuery = "SELECT Accounts.firstName, Accounts.lastName, Appointment.complete FROM Appointment LEFT JOIN Accounts on Appointment.id=Accounts.id WHERE Appointment.Appointments='$date'";
  if(mysqli_query($link, $query)){
    echo "Work";
  } else{
    echo "Didn't work .$query" .  mysqli_error($link);
  }
  if(mysqli_query($link, $doctorQuery)){
    echo "Work";
  } else{
    echo "Didn't work .$doctorQuery" .  mysqli_error($link);
  }
}
?>
