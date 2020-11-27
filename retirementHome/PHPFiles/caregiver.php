<?php
session_start();
$accessLevel= ['A','B','D'];
if(!in_array($_SESSION['role'],$accessLevel)){
  header("Location:/PHProject/retirementHome/templates/home.html");
}
session_write_close();

$link = mysqli_connect("localhost", "root", "", "Data");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
session_start();
$id = $_SESSION['Id'];
$date = date("Y-m-d");
$sql = "SELECT Roster.groupName, Roster.rotationDate, Patient.GroupName, Patient.id, Accounts.id, Accounts.firstName, Accounts.lastName FROM Roster RIGHT JOIN Patient ON Roster.groupName=Patient.GroupName LEFT JOIN Accounts ON Patient.id=Accounts.id WHERE Roster.rotationDate='$date' AND $id IN(caregiver1,caregiver2,caregiver3,caregiver4)";
$store = array();
$val = array();
$true = TRUE;
$false = FALSE;
if(isset($_POST['careSub'])){
  $careID = $_SESSION['Id'];
  $k = 0;
  $arr = array();
  $name = mysqli_query($link,$sql);
  while($pull = mysqli_fetch_array($name)){
    $val [] = $pull['id'];
    $store[] = $pull;
  }
  for($i = 0; $i < ((count($store)+1)*6); $i++){
    if (((count($arr)+1) % 7) == 0){
      echo count($arr);
      $patientID = $val[$k];
      $open = "INSERT INTO Schedule(RecordDate,careID,patientID,MornMed,AfterMed,NightMed,Breakfast,Lunch,Dinner) VALUES('$date','$careID','$patientID','$arr[0]', '$arr[1]','$arr[2]', '$arr[3]','$arr[4]','$arr[5]')";
      if(mysqli_query($link,$open)){
        echo "Works";
      } else{
        echo "ERROR: Could not able to execute $open. " . mysqli_error($link);
      }
      $k += 1;
      $arr = array();
    }
    if(isset($_POST[strval($i)])){
      array_push($arr, "True");
    } else{
      array_push($arr, "False");
    }
  }
/*print_r($arr);
/*print_r($store);
print_r($val);*/
}
?>
