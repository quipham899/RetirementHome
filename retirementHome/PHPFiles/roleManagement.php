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

$sql = "SELECT * FROM Role";

if(isset($_POST['roleOk'])){
  $role = $_POST['newRole'];
  $access = $_POST['accessLevel'];
  $query = "INSERT INTO Role(roleName, accessLevel) VALUES('$role', '$access') ";
  mysqli_query($link, $query);
}

?>
