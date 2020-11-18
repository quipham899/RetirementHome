<<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT id, email, password, role  FROM Accounts WHERE email ='$email' AND password ='$password'";

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      session_start();
      $_SESSION['Id'] = $row['id'];
      $_SESSION['role'] = $row['role'];
      session_write_close();
      if($row['role'] == 'doctor'){
      header("Location:/PHProject/retirementHome/templates/doctorshome.html");
    } else if($row['role'] == 'patient'){
        header("Location:/PHProject/retirementHome/templates/patientHome.html");
    } else if($row['role'] == 'family'){
      header('Location:/PHProject/retirementHome/templates/familyMembersHome.html');
    } else if($row['role'] == 'caregiver'){
      header('Location:/PHProject/retirementHome/templates/caregiversHome.html');
    } else if($row['role'] == 'supervisor'){
      header('Location:/PHProject/retirementHome/templates/patientHome.html');
    }
  }
}
 ?>
