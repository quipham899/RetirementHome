<?php
include '../PHPFiles/Payment.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
            if(isset($totalDay)){
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
