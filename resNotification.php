<?php
  session_start();
?>
<!DOCTYPE html>
   <title>Launch Weapons</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/response/resNotification.css">
     <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
     <script src="js/contractMethods.js"></script>
     <script src="js/core.js"></script>
     <script src="js/sha256.js"></script>
     <script type="text/javascript" src="js/ContractABI.js"></script>
   </head>
   <body onload="weaponnotif()">
    <div id="main">
      <div class="header">
        <h2>Triggered Weapon Details</h2>
      </div>
      <div class="missiles">
        <img id="wimg" src="images/weapons.jpg" alt="weaponimg">
        <div>
          <h3 id="weaponname"></h3><br>
          <h3 id="weaponnum"></h3>
        </div>
      </div>
    </div>

      <!-- modal for notification of attack -->
      <div id="id01" class="modal">

          <form class="modal-content animate">
            <div class="imgcontainer">
              <h2>Weapons Notification</h2>
              <span id="closeSpan" onclick="document.getElementById('id01').style.display='none';
              document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
            </div>
      
            <div class="container">
                <label><b>Weapon Name</b></label><br>
				        <input type="text" id="weapon" required><br>

                <label><b>Number of Weapons</b></label><br>
				        <input type="number" id="nweapon" required><br>

				        <button type="button" id='b1' onclick="wverify()">Verify</button>
                <button type="button" id='b2' onclick="launch()">Launch Weapons</button>
            </div>      
          </form>
      </div>
   </body>
   <script>
       let resid = <?php echo ($_SESSION['Id'])?>;
       let but2 = document.getElementById('b2');
       
       function weaponnotif()
       {
          but2.disabled = true;
          weaponNotifPopup();   
       }

       function wverify()
       {
          console.log("resid " + resid);
          verifyWeaponNotif(resid, but2);
       }

       function launch()
       {   
          console.log("res " + resid);
          launchWeapon(resid);
       }
   </script>
</html>