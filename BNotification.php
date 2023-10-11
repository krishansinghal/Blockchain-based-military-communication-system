<?php
   session_start();
?>
<!DOCTYPE html>
   <title>Notification</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/borderofficer/BNotification.css">
     <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
     <script src="js/contractMethods.js"></script>
     <script src="js/core.js"></script>
     <script src="js/sha256.js"></script>
     <script type="text/javascript" src="js/ContractABI.js"></script>
   </head>
   <body>
      <div class="header">
        <h2>Notification</h2>
      </div>
      <div class="card">
         <h6 id="bid"><?php echo ($_SESSION["Id"]) ?></h6>
         <form>
            <div class="details">
              <label>Attack Country</label><br>
              <input type="text" id="country" placeholder="Enter Attack Country" required>
            </div>
            <div class="details">
                <label>Weapon Name</label><br>
                <input type="text" id="weapon" placeholder="Enter Weapon Name" required>
              </div>
            <div class="details">
              <label>Number of Weapon</label><br>
              <input type="number" id="nweapon" placeholder="Enter Number of Weapons" required>
            </div>
            <div class="details">
              <label>Velocity of Weapon (Km/h)</label><br>
              <input type="number" id="velocity" placeholder="Enter Velocity of Weapon" required>
            </div>
            <div class="details">
              <label>Hash Value</label><br>
              <input type="text" id="hash" placeholder="Hash Value">
            </div>
            <div class="buttonsign">
                <button type="button" onclick="genhash()">Generate Hash</button>
                <button type="button" onclick="inputData()" id="send">Send</button>
            </div>
         </form>
      </div>
      <script type="text/javascript">
        
         const genhash = () =>
         {
            let hash = generateNHash();
            document.getElementById("hash").value = hash;
         }

         function inputData()
         {
            let id = document.getElementById("bid").innerHTML;
            let hash = document.getElementById("hash").value;
            if(hash)
            {
              inputNotification(id, hash);
            }
            else
            {
              alert('Please Generate Hash!');
            }
         }
         
      </script>
   </body>
</html>