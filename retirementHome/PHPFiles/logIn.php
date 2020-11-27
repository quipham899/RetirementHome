<<?php
$link = mysqli_connect("localhost", "root", "", "Data");

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
      $_SESSION['approved'] = $row['approved'];
      session_write_close();
      if($row['role'] == 'C'){
      header("Location:/PHProject/retirementHome/templates/doctorsHome.php");
    } else if($row['role'] == 'F'){
        header("Location:/PHProject/retirementHome/templates/patientHome.php");
    } else if($row['role'] == 'G'){
      header('Location:/PHProject/retirementHome/templates/familyMembersHome.html');
    } else if($row['role'] == 'D'){
      header('Location:/PHProject/retirementHome/templates/caregiversHome.php');
    } else if($row['role'] == 'B' or $row['role'] == 'A'){
      header('Location:/PHProject/retirementHome/templates/adminsReport.php');
    }
  }
}
 ?>
