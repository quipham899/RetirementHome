<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}

$sql = "SELECT * FROM Role";

if(isset($_POST['roleOk'])){
  $role = $_POST['newRole'];
  $access = $_POST['accessLevel'];
  $sql = "INSERT INTO Role(roleName, accessLevel) VALUES('$role', '$access') ";
}

?>
