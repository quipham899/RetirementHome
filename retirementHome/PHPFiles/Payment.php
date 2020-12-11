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
if(isset($_POST['updateButton'])){
  $id = $_POST['patientID'];
  $current = date("Y-m-d");
  $get = "SELECT updateDate FROM Patient WHERE id = '$id'";
  if (mysqli_query($link, $get)) {
    echo "work";
  } else {
      echo "ERROR: Could not able to execute $get. " . mysqli_error($link);
  }
  $pull = mysqli_query($link,$get);
  $info = mysqli_fetch_array($pull);
  if($current != $info){
    $totalMedicine = 0;
    $day = "SELECT updateDate FROM Patient WHERE id = '$id'";
    $fetch = mysqli_query($link, $day);
    $array = mysqli_fetch_array($fetch);
    $firstDate = date('Y-m-d',strtotime($array[0]));
    $totalDay = "SELECT RecordDate FROM Schedule WHERE  RecordDate BETWEEN '$firstDate' AND '$current' AND patientID = '$id' ";
    $appointment = "SELECT  Appointments FROM Appointment WHERE  Appointments BETWEEN '$firstDate' AND '$current' AND patientID = '$id' ";
    $medicine = "SELECT assignDate FROM Medication WHERE  assignDate BETWEEN '$firstDate' AND '$current' AND patientID = '$id'";
    $getMedicine = mysqli_query($link,$medicine);
    $getAppointment = mysqli_query($link, $appointment);
    $empty1 = array();
    while($fileApp = mysqli_fetch_array($getMedicine)){
      $time = date('M', strtotime($fileApp['assignDate']));
      if(!in_array($time, $empty1)){
        $empty1 = array();
        array_push($empty1, $time);
        $totalMedicine += 5;
      }
    }
    $AppointmentPrice = (float)mysqli_num_rows($getAppointment);
    $TotalDay = (float)mysqli_num_rows(mysqli_query($link, $totalDay));
    echo($TotalDay);
    echo($AppointmentPrice);
    echo($totalMedicine);
    $totalPrice = ($TotalDay*10) + ($AppointmentPrice*50) + $totalMedicine;

  }
}
?>
