<?php
  session_start();
?>
<!DOCTYPE html>
   <title>Weapons</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/borderofficer/bweapons.css">
     <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
     <script src="js/contractMethods.js"></script>
     <script src="js/core.js"></script>
     <script src="js/sha256.js"></script>
     <script type="text/javascript" src="js/ContractABI.js"></script>
   </head>
   <body onload="notif()">
    <div id="main">
      <div class="header">
        <h2>Please select the weapons</h2>
      </div>
      <div class="missiles">
        <form>
            <table class="details">
                <tr>
                    <th></th>  
                    <th>Weapon Image</th>
                    <th>Weapon Name</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td><input id='w1' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/zsu.jpg"></td>
                    <td><span id="wname1">ZSU-23-4M Shilka</span></td>
                    <td><input type="number" id="nw1" min=1></td>
                </tr>
                <tr>
                    <td><input id='w2' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/zu23.jpg"></td>
                    <td><span id="wname2">ZU-23-2</span></td>
                    <td><input type="number" id="nw2" min=1></td>
                </tr>
                <tr>
                    <td><input id='w3' type="checkbox" name ="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/9M119.jpg"></td>
                    <td><span id="wname3">9M119 Svir(AT-11 Sniper)</span></td>
                    <td><input type="number" id="nw3" min=1></td>
                </tr>
                <tr>
                    <td><input id='w4' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/dhruvastra.jpg"></td>
                    <td><span id="wname4">DhruvAstra</span></td>
                    <td><input type="number" id="nw4" min=1></td>
                </tr>
                <tr>
                    <td><input id='w5' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/shaurya.jpg"></td>
                    <td><span id="wname5">Shaurya</span></td>
                    <td><input type="number" id="nw5" min=1></td>
                </tr>
                <tr>
                    <td><input id='w6' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/pralay.jpg"></td>
                    <td><span id="wname6">Pralay</span></td>
                    <td><input type="number" id="nw6" min=1></td>
                </tr>
                <tr>
                    <td><input id='w7' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/prithvi2.jpg"></td>
                    <td><span id="wname7">Prithvi-II</span></td>
                    <td><input type="number" id="nw7" min=1></td>
                </tr>
                <tr>
                    <td><input id='w8' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/agni1.jpg"></td>
                    <td><span id="wname8">Agni-I</span></td>
                    <td><input type="number" id="nw8" min=1></td>
                </tr>
                <tr>
                    <td><input id='w9' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/agni2.jpeg"></td>
                    <td><span id="wname9">Agni-II</span></td>
                    <td><input type="number" id="nw9" min=1></td>
                </tr>
                <tr>
                    <td><input id='w10' type="checkbox" name="weapon" onclick="selectOnlyThis(this)"></td>
                    <td><img src="images/agni3.jpg"></td>
                    <td><span id="wname10">Agni-III</span></td>
                    <td><input type="number" id="nw10" min=1></td>
                </tr>
            </table>
            <button type="button" onclick="trigger()">Trigger Weapon</button>
         </form>
      </div>
    </div>

      <!-- modal for notification of attack -->
      <div id="id01" class="modal">

          <form class="modal-content animate">
            <div class="imgcontainer">
              <h2>Attack Notification</h2>
              <span id="closeSpan" onclick="document.getElementById('id01').style.display='none';
              document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
            </div>
      
            <div class="container">
                <label><b>Attack Country</b></label><br>
				<input type="text" id="country" required><br>

				<label><b>Weapon Name</b></label><br>
				<input type="text" id="weapon" required><br>

                <label><b>Number of Weapons</b></label><br>
				<input type="number" id="nweapon" required><br>

                <label><b>Velocity of Weapon</b></label><br>
				<input type="number" id="velocity" required><br>

				<button type="button" id='b1' onclick="verify()">Verify</button>
            </div>      
          </form>
      </div>
   </body>
   <script>
       let cid = <?php echo ($_SESSION['Id'])?>;
       let wid;
       function selectOnlyThis(id)
       {
          var myweapon = document.getElementsByName("weapon");
          Array.prototype.forEach.call(myweapon, function(el)
          {
              el.checked = false;
          });
          id.checked = true;
          wid=id;
       }

       function notif()
       {
          attackNotifPopup();   
       }

       function verify()
       {
          console.log("id " + cid);
          verifyAttackNotif(cid);
       }

       function trigger()
       {
          
          console.log("cc " + cid);
          console.log(wid.id);
          triggerWeaponData(cid, wid.id);
       }
   </script>
</html>