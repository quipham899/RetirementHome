<?php
$link = mysqli_connect("localhost", "root", "", "Data");

if($link == False){
  die("Couldn't connect." .mysqli_connect_error());
}
if(isset($_POST['patientInfo'])){

}
?>
