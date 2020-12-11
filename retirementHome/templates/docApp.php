<?php
include '../PHPFiles/Doc.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Doctor's Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type='text/javascript'>window.onload=function(){
      const patient = document.getElementById('patientId');
      document.getElementById('date').addEventListener('change', function(){
        var input = this.value;
        var doctor = document.getElementById('doctor');
        $.ajax({
              url:"../PHPFiles/Doc.php",    //the page containing php script
              type: "post",    //request type,
              dataType: 'json',
              data: {day: input},
              success:function(result){
                while(doctor.firstChild){
                  doctor.removeChild(doctor.lastChild);
                }
                console.log(result);
                for(i = 0; i < result.length; i++){
                  var select = document.createElement('option');
                  select.value = result[i][0];
                  select.name = 'doctor';
                  select.innerHTML = result[i][2], result[i][3];
                  document.getElementById('doctor').appendChild(select);
                }
          }
        });
      });
    patient.addEventListener('change', function(){
      var id = this.value;
      $.ajax({
        url:"../PHPFiles/Doc.php",
        type: "post",
        dataType: 'json',
        data: {patientNum: id},
        success:function(result){
          console.log(result)
          document.getElementById('patient').appendChild(document.createTextNode(result[3]));
          document.getElementById('patient').appendChild(document.createTextNode(result[4]));
        }
      });
    });
  }
    </script>
  </head>

  <body>

    <form action="docApp.php" method="post">
        <p>
            <label for="patient">Patient Id:</label>
            <input type="text" name="patient" id="patientId" />
        </p>
        <p>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date">
        </p>
        <select name='doctor' id='doctor'>
        </select>
        <p>
            <label for="patientName">Patient Name:</label>
            <text id='patient'></text>
        </p>
        <input type="submit" name="ok" id="ok">
          <a class="buttons" href=" ">Cancel</a>

    </form>
  </body>
</html>
