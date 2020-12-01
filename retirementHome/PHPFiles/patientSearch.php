<?php
session_start();
$accessLevel= ['A','B','C','D'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();
$link = mysqli_connect("localhost", "root", "", "Data");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}
if(isset($_POST['subInfo'])){
  $id = $_POST['id'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $EContact = $_POST['EContact'];
  $Admission = $_POST['AdmissionDate'];

  $check = array();
  if($id != "") $check[] = "Patient.id = {$id}";
  if($firstName != "") $check[] = "firstName = '{$firstName}'";
  if($lastName != "") $check[] = "lastName = '{$lastName}'";
  if($EContact != "") $check[] = "EmergencyContact = '{$EContact}'";
  if($Admission != "") $check[] = "AdmissionDate = '{$Admission}'";
  $query = implode(" AND ", $check);
  $search = "SELECT * FROM Patient LEFT JOIN Accounts ON Patient.id=Accounts.id WHERE {$query} ";
  if(mysqli_query($link, $search)){
    echo "Work";
    $res = mysqli_query($link, $search);
    print_r(mysqli_num_rows($res));
  } else{
    echo "Didn't work .$search" .  mysqli_error($link);
  }

}

?>
