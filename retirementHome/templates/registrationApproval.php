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
       <table>
         <tr>
           <th>Name</th>
           <th>Role</th>
           <th>Check</th>
         </tr>
         <?php
         if ($result = mysqli_query($link, $sql)) {
           print_r($result);
             if (!$result || mysqli_num_rows($result) > 0) {
               while($row = mysqli_fetch_array($result)){
                 echo "<tr>";
                 echo "<th>". $row['firstName'], $row['lastName']."</th>";
                 echo "<th>". $row['roleName']. "</th>";
                 echo "<th><input type='checkbox' name='userValue[]' value='{$row["id"]}'></th>";
                 echo "</tr>";
               }

             } else {
               echo "Didn't work bro";
             }
           }
         ?>
       </table>
         <input type="submit" name="regApprove" id="register">
     </form>

   </body>
 </html>
