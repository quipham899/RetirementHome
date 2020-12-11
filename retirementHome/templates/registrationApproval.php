<?php
include '../PHPFiles/RegApproval.php'
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Home Page</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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
         if(isset($sql)){
               while($row = mysqli_fetch_array($result)){
                 echo "<tr>";
                 echo "<th>". $row['firstName'], $row['lastName']."</th>";
                 echo "<th>". $row['roleName']. "</th>";
                 echo "<th><input type='checkbox' name='userValue[]' value='{$row["id"]}'></th>";
                 echo "</tr>";
               }
         }
         ?>
       </table>
         <input type="submit" name="regApprove" id="register">
     </form>

   </body>
 </html>
