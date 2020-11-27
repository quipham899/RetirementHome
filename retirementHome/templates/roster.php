<?php
include '../PHPFiles/rosterView.PHP'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

  </body>
</html>
