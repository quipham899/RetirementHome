<?php
include '../PHPFiles/Payment.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>

    <form method="post">
        <p>
            <label for="patientID">Patient ID:</label>
            <input type="text" name="patientID" id="patientID">
        </p>
        <p>
            <label for="totalDue">Total Due:</label>
            <?php
            if(gettype($totalDay) != NULL){
              echo '<label>' . '$'.$totalPrice .'.00'. '</label>';
            } else {
              echo "None";
            }
            ?>
        </p>
        <p>
            <label for="newPayment">New Payment:</label>
            <?php
            if(isset($totalPrice)){
              echo '<label>' . '$'.$totalPrice .'.00'. '</label>';
            }
            ?>
        </p>
        <input type="submit" name='paymentSub'></input>
        <a class="buttons" href=" ">Cancel</a>
        <input type='submit' name='updateButton'></input>

    </form>

  </body>
</html>
