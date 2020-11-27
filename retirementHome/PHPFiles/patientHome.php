<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
$patient_id = $_POST['patient_id'];
$date = $_POST['date'];
$patient_name = $_POST['patient_name'];


$sql = "SELECT patient_id, patient_name FROM Patient WHERE patient_id = $patient_id AND patient_name = $patient_name ";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    header("Location:/PHProject/retirementHome/templates/patientHome.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 ?>
