<?php
include '../PHPFiles/RegApproval.php'
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Home Page</title>

     <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
     <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

   </head>

   <body>

     <form method="post">
         <?php
         if ($result = mysqli_query($link, $sql)) {
             if (mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_array($result)){
                 echo "<label>". $row['firstName']."</label>";
                 echo "<label>". $row['role']. "</label>";
                 echo "<input type='checkbox' name='userValue[]' value='{$row["id"]}'>";
               }

             } else {
               echo "Didn't work bro";
             }
           }
         ?>
         <input type="submit" name="regApprove" id="register">
     </form>

   </body>
 </html>
