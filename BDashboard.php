<?php
    session_start();
?>
<!DOCTYPE html>
   <title>Border Officer Dashboard</title>
   <head>
      <link rel="stylesheet" type="text/css" href="css/borderofficer/BDashboard.css">
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
                  <a href="borderprofile.php" target="main">Profile</a>
                  <a href="BNotification.php" target="main">Notification</a>
                  <a href="About.html" target="main">About</a>
                  <a href="home.php">Logout</a>
               </div>
            </nav>
         </div>
         <div class="logo">Welcome Border Officer</div>  
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