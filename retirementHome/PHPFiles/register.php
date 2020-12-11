<?php
$link = mysqli_connect("localhost", "root", "", "Data");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
$select = "SELECT * FROM Role";
if(isset($_POST['Register'])){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email_id'];
$password = $_POST['password'];
$DOB = $_POST['DOB'];
$Phone = $_POST['phone'];
$Role = $_POST['role'];
$sql = "INSERT INTO Accounts( firstName, lastName, email, password, DOB, phone, role, approved) VALUES(
  '$first_name', ' $last_name', '$email', '$password', '$DOB', '$Phone','$Role', 'False')";
  if (mysqli_query($link, $sql)){
    if($Role == 'F'){
      $last = "SELECT MAX(id) FROM Accounts";
      $lastGet = mysqli_query($link,$last);
      $lastRecord = mysqli_fetch_array($lastGet);
      $Famcode = $_POST['FamCode'];
      $EContact = $_POST['EContact'];
      $Relation = $_POST['Relation'];
      $id = $lastRecord[0];
      $date = date("Y-m-d");
      $insertion = "INSERT INTO Patient(id,FamilyCode,EmergencyContact,Relation,updateDate) VALUES('$id', $Famcode,'$EContact','$Relation','$date')";
      if (mysqli_query($link, $insertion)) {
        echo "Valid";
      } else {
          echo "ERROR: Could not able to execute $insertion. " . mysqli_error($link);
      }
    }
      mysqli_close();
      header("Location:/PHProject/retirementHome/templates/login.html");
  } else {
      echo "Sorry the information you entered has an error." .mysqli_error($link);
  }
}
?>
