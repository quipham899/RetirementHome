<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}

/*if(isset($_POST['date'])){
$day = $_POST['date'];
$doctorGet = "SELECT Roster.doctor, Roster.rotationDate, Accounts.firstName, Accounts.lastName, Accounts.id FROM Roster LEFT JOIN Accounts ON Roster.doctor=Accounts.id WHERE rotationDate = '$day'";
$pull = mysqli_query($link,$doctorGet);
$get = mysqli_fetch_array($pull);
echo($get['doctor']);
echo($get['firstName']);
echo($get['lastName']);
}*/
if(isset($_POST['ok'])){
  session_start();
  $id = $_POST['patient'];
  $day = $_POST['date'];
  $doctor = "SELECT Roster.doctor, Roster.rotationDate, Accounts.firstName, Accounts.lastName, Accounts.id FROM Roster LEFT JOIN Accounts ON Roster.doctor=Accounts.id WHERE rotationDate = '$day'";
  $person = "SELECT * FROM Accounts WHERE id=$id";
  $results = mysqli_query($link, $person);
  $value = mysqli_fetch_array($results);
  $query = mysqli_query($link, $doctor);
  $variable = mysqli_fetch_array($query);
  $_SESSION['doctor'] = $variable;
  $_SESSION['patientInformation'] = $value;
  $_SESSION['rotationDate'] = $_POST['date'];
  session_write_close();
  header('Location:/PHProject/retirementHome/templates/doctApp2.php');
}
if(isset($_POST['docOkay'])){
  $doctorID = $_POST['doctor'];
  $rotationDate = $_SESSION['rotationDate'];
  $id = $_SESSION['information']['id'];
  $insert = "INSERT INTO Appointment(id, Appointments, PatientID, Comment) VALUES($doctorID ,'$rotationDate','$id', 'No') ";
  mysqli_query($link,$insert);
}
?>
