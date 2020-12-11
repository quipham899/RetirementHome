<?php
session_start();
$accessLevel= ['A','B'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();
$link = mysqli_connect("localhost", "root", "", "Data");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }

if(isset($_POST['patientNum'])){
$id = $_POST['patientNum'];
$userArray = array();
$person = "SELECT * FROM Accounts WHERE id=$id";
$query = mysqli_query($link,$person);
$user = mysqli_fetch_array($query);
echo json_encode($user);
}
if(isset($_POST['InfoSubmit'])){
$patient = $_POST['patientId'];
$group = $_POST['group'];
$date = $_POST['admissionDate'];
$sql = "UPDATE Patient SET GroupName = '$group', AdmissionDate = '$date' WHERE id = '$patient'";
if(mysqli_query($link,$sql)){
  echo "Works";
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

?>
