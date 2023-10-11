<?php
   $host = "localhost";  
   $user = "root";  
   $password = '';  
   $db_name = "attack";  
     
   $con = mysqli_connect($host, $user, $password, $db_name);  
   if(mysqli_connect_errno()) {  
       die("Failed to connect with MySQL: ". mysqli_connect_error());  
   }

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['pass'];
   $desig = $_POST['desig'];
   $rank = $_POST['rank'];

    //to prevent from mysqli injection
   $fname =  stripcslashes($fname);
   $lname = stripcslashes($lname);
   $email = stripcslashes($email); 
   $password = stripcslashes($password);
   $desig = stripcslashes($desig);
   $rank = stripcslashes($rank);
   $fname = mysqli_real_escape_string($con, $fname);
   $lname = mysqli_real_escape_string($con, $lname);
   $email = mysqli_real_escape_string($con, $email);
   $password = mysqli_real_escape_string($con, $password);
   $desig = mysqli_real_escape_string($con, $desig);
   $rank = mysqli_real_escape_string($con, $rank);

   $numsql = "SELECT * from `ccofficer`"; 
    $res = mysqli_query($con, $numsql);
    $count = mysqli_num_rows($res);
    $id = $count - 1;
     
   $sql = "INSERT into `ccofficer` (`Id`, `FName`, `LName`, `Email`, `Password`, `Designation`, `Rank`) values ('$id', '$fname', '$lname', '$email', '$password', '$desig', '$rank')"; 
   $result = mysqli_query($con, $sql);
         
   if($result){  
       ?>
         <script>
            alert('Sign up successful!');
            window.location.href = 'home.php';
         </script>
       <?php
       
           
   }  
   else{  
       ?>
         <script>
            alert("Error Signing Up");
            window.location.href = 'home.php';
         </script>
       <?php
   }


?>