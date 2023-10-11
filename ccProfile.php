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

    $sql = "SELECT * from `ccofficer` WHERE `Email` = '$email'"; 
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $name = $row['FName'].' '.$row['LName'];
    $id = $row['Id'];

?>
<!DOCTYPE html>
     <title>Profile</title>
     <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="css/borderofficer/borderProfile.css">
     </head>
     <body>
      <div id="main">
        <div class="header">
          <h2>User Profile</h2>
        </div>
        <div class="card">
           <img src="images/logo.png" alt="army-logo" class="logo">
           <form>
              <div class="details">
                <label>Officer Id</label><br>
                <input type="number" value="<?php echo ($id) ?>" readonly>
              </div> 
              <div class="details">
                <label>Name</label><br>
                <input type="text" value="<?php echo ($name) ?>" readonly>
              </div>
              <div class="details">
                <label>Email</label><br>
                <input type="email" value="<?php echo ($email) ?>" readonly>
              </div>
              <div class="pass">
                <label>Password</label><br>
                <input type="password" value="<?php echo ($row['Password']) ?>" readonly>
                <button onclick="editPass()" type="button"><img src="images/edit.png" alt="edit"></button>
              </div>
              <div class="details">
                <label>Designation</label><br>
                <input type="text" value="<?php echo ($row['Designation']) ?>" readonly>
              </div>
              <div class="details">
                <label>Rank</label><br>
                <input type="number" value="<?php echo ($row['Rank']) ?>"  max="15" min="1" readonly>
              </div>
           </form>
        </div>
      </div>

        <!-- Edit password modal -->

        <div id="id01" class="modal">

          <form class="modal-content animate" action="ccchangepass.php" method="post">
            <div class="imgcontainer">
              <h2>Change Password</h2>
              <span onclick="document.getElementById('id01').style.display='none';
              document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
            </div>
      
            <div class="container">
              <label><b>Current Password</b></label>
              <input type="password" placeholder="Enter Current Password" name="oldpsw" required><br>
      
              <label><b>New Password</b></label><br>
              <input type="password" placeholder="Enter New Password" name="newpsw" required><br>

              <label><b>Confirm New Password</b></label>
              <input type="password" placeholder="Confirm New Password" name="cnewpsw" required><br>
      
              <button type="submit" id='b1'>Save</button>
            </div>
                  
          </form>
        </div>

        <script>
            function editPass()
            {
                document.getElementById('id01').style.display = 'block';
                document.getElementById('main').style.backgroundColor = 'grey';
            }

        </script>
     </body>
</html>