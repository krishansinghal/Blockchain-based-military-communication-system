<?php
  session_start();
?>
<!DOCTYPE html>
     <title>Add Officer</title>
     <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="css/ccofficer/AddOfficer.css">
       <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
        <script src="js/contractMethods.js"></script>
        <script src="js/core.js"></script>
        <script src="js/sha256.js"></script>
        <script type="text/javascript" src="js/ContractABI.js"></script>
     </head>
     <body>
      <div id="main">
        <div class="header">
          <h2>Add Officer</h2>
        </div>
        <div class="card">
           <img src="images/logo.png" alt="army-logo" class="logo">
           <button type="button" onclick="borderModal()">Add Border Officer</button><br>
           <button type="button" onclick="ccModal()">Add CC Officer</button><br>
           <button type="button" onclick="responseModal()">Add Response Team Officer</button><br>
        </div>
      </div>

        <!-- add border officer modal -->

        <div id="id01" class="modal">

          <form class="modal-content animate">
            <div class="imgcontainer">
              <h2>Add Officer</h2>
              <span onclick="document.getElementById('id01').style.display='none';
              document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
            </div>
      
            <div class="container">
              <label><b>Border Officer Id</b></label><br>
              <input type="number" placeholder="Enter Officer Id" id="boffid" required><br>
      
              <label><b>Enter Officer Account Address</b></label><br>
              <input type="text" placeholder="Enter Account Address" id="baddress" required><br>
      
              <button type="button" id='b1' onclick="addBorder()">Add</button>
              <button type="button" id='b4' onclick="updateBorder()">Update</button>
            </div>
                  
          </form>
        </div>

        <!-- add cc officer modal -->

        <div id="id02" class="modal">

            <form class="modal-content animate">
              <div class="imgcontainer">
                <h2>Add Officer</h2>
                <span onclick="document.getElementById('id02').style.display='none';
                document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
              </div>
        
              <div class="container">
                <label><b>CC Officer Id</b></label><br>
                <input type="number" placeholder="Enter Officer Id" id="coffid" required><br>
      
                <label><b>Enter Officer Account Address</b></label><br>
                <input type="text" placeholder="Enter Account Address" id="caddress" required><br>
      
                <button type="button" id='b2' onclick="addCCOff()">Add</button>
                <button type="button" id='b5' onclick="updateCC()">Update</button>
              </div>
                    
            </form>
          </div>

          <!-- add response team officer modal -->

        <div id="id03" class="modal">

            <form class="modal-content animate">
              <div class="imgcontainer">
                <h2>Add Officer</h2>
                <span onclick="document.getElementById('id03').style.display='none';
                document.getElementById('main').style.backgroundColor = 'gainsboro';" class="close" title="Close Modal">&times;</span>
              </div>
        
              <div class="container">
                <label><b> Response Officer Id</b></label><br>
                <input type="number" placeholder="Enter Officer Id" id="resoffid" required><br>
      
                <label><b>Enter Officer Account Address</b></label><br>
                <input type="text" placeholder="Enter Account Address" id="resaddress" required><br>
      
                <button type="button" id='b3' onclick="addResponse()">Add</button>
                <button type="button" id='b6' onclick="updateResponse()">Update</button>
              </div>
                    
            </form>
          </div>

        <script>
            function borderModal()
            {
                document.getElementById('id01').style.display = 'block';
                document.getElementById('main').style.backgroundColor = 'grey';
            }

            function ccModal()
            {
                document.getElementById('id02').style.display = 'block';
                document.getElementById('main').style.backgroundColor = 'grey';
            }

            function responseModal()
            {
                document.getElementById('id03').style.display = 'block';
                document.getElementById('main').style.backgroundColor = 'grey';
            }

            function addBorder()
            {
                addBorderOfficer();
            }
             
            function addCCOff()
            {
                addCCOfficer();
            }
             
            function addResponse()
            {
                addResponseOfficer();
            }

            function updateBorder()
            {
                updateBorderOfficer();
            }
             
            function updateCC()
            {
                updateCCOfficer();
            }
             
            function updateResponse()
            {
                updateResponseOfficer();
            }

        </script>
     </body>
</html>