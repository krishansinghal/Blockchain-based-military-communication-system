<?php
   session_start();
   $curl = curl_init();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "attack";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }


    $email = $_POST['uname'];  
    $pass = $_POST['psw'];

     //to prevent from mysqli injection  
    $email = stripcslashes($email); 
    $pass = stripcslashes($pass);
    $email = mysqli_real_escape_string($con, $email);
    $pass = mysqli_real_escape_string($con, $pass);
      
    $sql = "SELECT * from `ccofficer` WHERE `Email` = '$email' AND `Password` = '$pass'"; 
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = $row['FName'];
    $id = $row['Id'];
    $count = mysqli_num_rows($result);
          
    if($count == 1){  
        $_SESSION["Email"] = $email;
        $_SESSION["Pass"] = $pass;
        $_SESSION["Name"] = $name;
        $_SESSION["Id"] = $id;
        $update_sql = "update `ccofficer` set `IsLoggedIn` = true where `Email` = '$email'";
        $upd_res = mysqli_query($con, $update_sql);
        header("Location: CcDashboard.php");
            
    }  
    else if($count != 1){  
        $_SESSION["error"] = "Invalid Email or Password";
        header("Location: home.php");
    }

?>