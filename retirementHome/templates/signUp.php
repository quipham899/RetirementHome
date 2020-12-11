<?php
include '../PHPFiles/register.php'
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script type='text/javascript'>window.onload=function(){
      const role = document.getElementById('role');
      role.addEventListener('change', function(){
        var input = this.value;
        var fam = document.getElementsByClassName('FamCode');
        var EContact = document.getElementsByClassName('EContact');
        var relation = document.getElementsByClassName('Relation');
        if(input == 'F'){
          console.log(input);
          console.log(fam);
          for(i=0; i < fam.length;i++){
            fam[i].style.display = 'block';
            EContact[i].style.display = 'block';
            relation[i].style.display = 'block';
          }
        }
      });
    }
    </script>
  </head>
  <body>
  <form class="register_page" action="../PHPFiles/register.php" method="post">
    <div class="mb-3">
      <text>First_Name</text>
       <input type="text" name="first_name" id="firstName"></input>
       <text>Last_Name</text>
       <input type="text" name="last_name" id="lastName"></input>
       <text>Email-Address</text>
       <input type="text" name="email_id" id="email_id"></input>
       <text>Phone</text>
       <input type="text" name="phone" id="phone"></input>
       <text>Password</text>
       <input type="text" name="password" id="password"></input>
       <text>Date of Birth</text>
      <input type="text" name="DOB" id="DOB"></input>
      <text>Role</text>
     <select name='role' id='role'>
       <?php
         $roles = mysqli_query($link, $select);
         while($row = mysqli_fetch_array($roles)){
           echo "<option name='role'value='{$row['accessLevel']}'>". $row['roleName']."</option>";
         }
       ?>
     </select>
     <text class='FamCode' style="display: none;">Family Code</text>
    <input type="text" name="FamCode" class="FamCode" style='display: none;' id='FamcoDE'></input>
    <text class="EContact" style='display: none;'>Emergency Contact</text>
   <input type="text" name="EContact" class="EContact" style='display: none;' id='EContact'></input>
   <text class="Relation" style='display: none;'>Relation</text>
  <input type="text" name="Relation" class="Relation" style='display: none;' id='Relation'></input>
    </div>
      <input type="submit" name = "Register" value="submit">
  </form>
  </body>
</html>
