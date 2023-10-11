<?php
    session_start();
?>
<!DOCTYPE html>
   <title>CC Officer Dashboard</title>
   <head>
      <link rel="stylesheet" type="text/css" href="css/ccofficer/CcDashboard.css">
   </head>
   <body>
      <header class="header">
         <div class="menu" onmouseenter="change()" onmouseleave="unchange()">
            <div class="ham"></div>
            <div class="ham"></div>
            <div class="ham"></div>
            <nav id="mySidenav" class="sidenav">
               <div class="welcome"> 
                  <h4>Welcome<br><?php echo ($_SESSION["Name"]) ?></h4>
               </div>
               <div>
                  <a href="ccProfile.php" target="main">Profile</a>
                  <a href="AddOfficer.php" target="main">Add Officer</a>
                  <a href="ccweapons.php" target="main">Weapons</a>
                  <a href="ccViewPastData.php" target="main">View Data</a>
                  <a href="home.php">Logout</a>
               </div>
            </nav>
         </div>
         <div class="logo">Welcome CC Officer</div>  
      </header>
      <iframe class="dashcontent" id="maincont" name="main" 
       allowfullscreen
      ></iframe>

      <script>
         function change()
         {
            document.getElementById("maincont").style.marginLeft = '15%';
            document.getElementById("maincont").style.width = '85%';
            document.body.style.backgroundColor = 'rgba(0,0,0,0.7)';
         }

         function unchange()
         {
            document.getElementById("maincont").style.marginLeft = '0%';
            document.getElementById("maincont").style.width = '100%';
            document.body.style.backgroundColor = 'white';
         }
      </script>

   </body>

</html>