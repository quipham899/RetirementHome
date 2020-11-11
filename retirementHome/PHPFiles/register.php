<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email_id'];
$password = $_POST['password'];
$DOB = $_POST['DOB'];
$Phone = $_POST['phone'];
$Role = $_POST['Role'];

$sql = "INSERT INTO Accounts( firstName, lastName, email, password, DOB, phone, role) VALUES(
  '$first_name', ' $last_name', '$email', '$password', '$DOB', '$Phone','$Role')";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    header("Location:/PHProject/retirementHome/templates/login.html");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>
