<?php
        include('./smtp/index.php');
        session_start();
		$host = "localhost";
		$user = "root";
		$password = ''; // my database password. 
		$db_name = "attack";

		$con = mysqli_connect($host, $user, $password, $db_name);
		if (mysqli_connect_errno()) {
		    die("Failed to connect with MySQL: " . mysqli_connect_error());
        }

        $email = $_POST['email'];
        $message = false;
        $success=false;
        $body = " ";
		$sql = "SELECT * FROM `border` where `Email` = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name = $row['FName'];
         	$to = $email;
            $body = "Hello, ".$name."<br />";
            $body .= "Your Login Password is: " .$row['Password']. "<br />";
            $body .= "Please use this credential to login into your account". "<br/>";
            $body .= "Thanks" . "<br /><br /><br />";
            if(sendMail($to, "Login Password", $body))
            {
            	$message = true;
                $success = true;
            }
         	
        
     if($success && $message)
     {
?>

   <script>
        alert('Your login password has been sent on your mail.');
        alert('<?php echo ($message); echo($success);?>')
        window.location.href = "forgotpass.php";
   </script>
<?php
}
else{
    ?>

   <script>
        alert('An error occured');
        alert('<?php echo ($message); echo($success);?>')
        window.location.href = "forgotpass.php";
   </script>
<?php
}
?>