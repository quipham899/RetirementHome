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

$sql = "SELECT Accounts.id, Accounts.firstName, Accounts.lastName, Accounts.role, Salary.salaryID, Salary.salary, Role.accessLevel, Role.roleName FROM  Accounts LEFT JOIN Salary ON Accounts.id=Salary.salaryID RIGHT JOIN Role ON Accounts.role=Role.accessLevel WHERE (Accounts.role = 'B' OR Accounts.role = 'C') ";

if(isset($_POST['newSalary'])){
$salary = $_POST['newSalary'];
$id = $_POST['empID'];
$search = "SELECT * FROM Salary WHERE salaryID = '$id'";
$searchResult = mysqli_query($link, $search);
$getResults = mysqli_fetch_array($searchResult);
if(count($getResults) != 0) {
  $set = "UPDATE Salary SET salary = '$salary' WHERE salaryID = '$id'";
} else {
$set = "INSERT INTO Salary(salaryID,salary)VALUES('$id', '$salary')";
}
if(mysqli_query($link,$set)){
  echo "Works";
} else{
  echo "ERROR: Could not able to execute $set. " . mysqli_error($link);
}
}
?>
