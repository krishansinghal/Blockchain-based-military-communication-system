<?php
  session_start();
?>
<!DOCTYPE html>
   <title>Data Store</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/ccofficer/viewPastData.css">
     <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
     <script src="js/contractMethods.js"></script>
     <script src="js/core.js"></script>
     <script src="js/sha256.js"></script>
     <script type="text/javascript" src="js/ContractABI.js"></script>
   </head>
   <body>
        <div id="main">
            <div class="missiles">
                    <table class="details">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Attack Data</th>
                                <th>Weapon Data</th>
                            </tr>
                        </thead>
                        <tbody id='tableBody'> 
                        </tbody>
                    </table>
                    <button type='button' onclick='viewSingleData()'>View Current Data</button>
                    <button type='button' onclick='viewAllData()'>View All Data</button>
            </div>
        </div>
    </body>
    <script type='text/javascript'>
        let cid = <?php echo ($_SESSION['Id'])?>;
        function viewSingleData()
        {
            viewCurrntData(cid);
        }
        function viewAllData()
        {
            viewAll(cid);
            // viewWData(cid);
        }
    </script>
</html>
