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


$sql = "SELECT Accounts.firstName, Accounts.lastName, Accounts.role, Accounts.id, Accounts.approved,Role.roleName,Role.accessLevel FROM Accounts LEFT JOIN Role on Accounts.role=Role.accessLevel WHERE Accounts.approved = 'False' ";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
if(isset($_POST['regApprove']) and isset($_POST['userValue'])){
$id = $_POST['userValue'];
foreach($id as $var){
  $sql = "UPDATE Accounts SET approved = REPLACE(approved, 'False', 'True') WHERE id = $var";
  mysqli_query($link,$sql);
}
if (mysqli_query($link, $sql)) {
    echo "works!";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 ?>
