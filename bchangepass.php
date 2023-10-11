<?php
   session_start();
   $host = "localhost";  
   $user = "root";  
   $password = '';  
   $db_name = "attack";  
     
   $con = mysqli_connect($host, $user, $password, $db_name);  
   if(mysqli_connect_errno()) {  
       die("Failed to connect with MySQL: ". mysqli_connect_error());  
   }

   $email = $_SESSION['Email'];

   $oldPass = $_POST['oldpsw'];
   $newPass = $_POST['newpsw'];
   $cnewPass = $_POST['cnewpsw'];

   $oldPass = stripcslashes($oldPass); 
   $newPass = stripcslashes($newPass);
   $cnewPass = stripcslashes($cnewPass);
   $oldPass = mysqli_real_escape_string($con, $oldPass);
   $newPass = mysqli_real_escape_string($con, $newPass);
   $cnewPass = mysqli_real_escape_string($con, $cnewPass);

   $sql = "SELECT `Password` from `border` WHERE `Email` = '$email'";
   $result = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   if($row['Password'] == $oldPass)
   {
       if($newPass == $cnewPass)
       {
          $update = "UPDATE `border` set `Password` = '$newPass' where `Email` = '$email'";
          $result = mysqli_query($con, $update);
          if($result)
          {
             ?>
                <script>
                    alert('Password Updated Successfully');
                    window.location.href = "borderProfile.php";
                </script>
             <?php
          }
          else
          {
             ?>
                <script>
                    alert('Error updating password');
                    window.location.href = "borderProfile.php";
                </script>
             <?php
          }
       }
       else{
          ?>
            <script>
                alert('New passwords does not match. Please Try Again');
                window.location.href = "borderProfile.php";
            </script>
          <?php
       }
   }
   else{
      ?>
        <script>
            alert('Incorrect Current Password');
            window.location.href = "borderProfile.php";
        </script>
      <?php
   }
?>