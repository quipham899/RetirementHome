<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>
      <form method='post'>
        <label for="doctor">Doctor:</label>
        <select name='doctor'>
        <?php
        session_start();
          echo "<option name='number'value='{$_SESSION['doctor']['id']}'>". $_SESSION['doctor']['firstName'], $_SESSION['doctor']['lastName'] ."</option>";
        session_destroy();
         ?>
       </select>
       <p>
         <?php
         session_start();
         echo "<label>" .$_SESSION['patientInformation']. "</label>"
         session_destroy();
         ?>
       </p>
       <input type="submit" name="finalSubmit" id="ok">
     </form>
    </p>
  </body>
</html>
