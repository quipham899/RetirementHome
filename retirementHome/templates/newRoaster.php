<?php
include '../PHPFiles/RosterManagement.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Roster</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>

    <form method="post">
      <p>
          <label for="date">Date:</label>
          <input type="date" name="date" id="date">
      </p>
      <p>
        <label for="supervisor">Supervisor:</label>
        <select name='supervisor'>
        <?php
        if(!empty(mysqli_query($link, $supervisor))){
          $resultSupervisor = mysqli_query($link, $supervisor);
          while($rowSupervisor = mysqli_fetch_array($resultSupervisor)){
            echo "<option name='number'value='{$rowSupervisor['id']}'>". $rowSupervisor['firstName'], $rowSupervisor['lastName'] ."</option>";
          }
        }
        ?>
      </select>
      </P>
      <p>
        <label for="doctor">Doctor:</label>
        <select name='doctor'>
          <?php if(!empty(mysqli_query($link, $doctor))){
            $resultDoctor = mysqli_query($link, $doctor);
            while($rowDoctor = mysqli_fetch_array($resultDoctor)){
              echo "<option name='doctor'value='{$rowDoctor['id']}'>". $rowDoctor['firstName'], $rowDoctor['lastName'] ."</option>";
            }
          } ?>
        </select>
      </p>
      <p>
          <label for="caregiver1">Caregiver 1:</label>
          <select name='caregiver1'>
          <?php
          if(!empty(mysqli_query($link, $caregiver1))){
            $resultCaregiver1 = mysqli_query($link, $caregiver1);
            while($rowCaregiver1 = mysqli_fetch_array($resultCaregiver1)){
              echo "<option name='number'value='{$rowCaregiver1['id']}'>". $rowCaregiver1['firstName'], $rowCaregiver1['lastName'] ."</option>";
            }
          }
          ?>
        </select>
      </p>
      <p>
        <select name='caregiver2'>
        <label for="caregiver2">Caregiver 2:</label>
        <?php
        if(!empty(mysqli_query($link, $caregiver2))){
          $resultCaregiver2 = mysqli_query($link, $caregiver2);
          while($rowCaregiver2 = mysqli_fetch_array($resultCaregiver2)){
            echo "<option name='number'value='{$rowCaregiver2['id']}'>". $rowCaregiver2['firstName'], $rowCaregiver2['lastName'] ."</option>";
          }
        }
        ?>
      </select>
      </P>
      <p>
          <label for="caregiver3">Caregiver 3:</label>
          <select name='caregiver3'>
          <?php
          if(!empty(mysqli_query($link, $caregiver3))){
            $resultCaregiver3 = mysqli_query($link, $caregiver3);
            while($rowCaregiver3 = mysqli_fetch_array($resultCaregiver3)){
              echo "<option name='number'value='{$rowCaregiver3['id']}'>". $rowCaregiver3['firstName'], $rowCaregiver3['lastName'] ."</option>";
            }
          }
          ?>
        </select>
      </p>
      <p>
        <label for="caregiver4">Caregiver 4:</label>
        <select name='caregiver4'>
        <?php
        if(!empty(mysqli_query($link, $caregiver4))){
          $resultCaregiver4 = mysqli_query($link, $caregiver4);
          while($rowCaregiver4 = mysqli_fetch_array($resultCaregiver4)){
            echo "<option name='number'value='{$rowCaregiver4['id']}'>". $rowCaregiver4['firstName'], $rowCaregiver4['lastName'] ."</option>";
          }
        }
        ?>
      </select>
      </p>
      <p>
        <label for="group">Group:</label>
        <input type='text' name='group'></input>
    </p>
      <input type=submit name='rosterSubmit'/>
       <a class="buttons" href=" ">Cancel</a>

    </form>

  </body>
</html>
