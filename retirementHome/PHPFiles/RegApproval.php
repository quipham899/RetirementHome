<?php
$link = mysqli_connect("localhost", "root", "", "Users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }


$sql = "SELECT firstName, lastName, role, id, approved FROM Accounts WHERE approved = 'False' ";
echo $sql;
if(isset($_POST['regApprove']) and isset($_POST['userValue'])){
echo "It worked";
$id = $_POST['userValue'];
echo $id;
foreach($id as $var){
  $sql = "UPDATE Accounts SET approved = REPLACE(approved, 'False', 'True') WHERE id = $var";
  mysqli_query($link,$sql);
}
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
 ?>
