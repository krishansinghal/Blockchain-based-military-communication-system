<?php
   session_start();
?>
<!DOCTYPE html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
	<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> 
    <script src="js/contractMethods.js"></script>
    <script src="js/core.js"></script>
    <script src="js/sha256.js"></script>
    <script type="text/javascript" src="js/ContractABI.js"></script>
</head>
<body onload="connect()">
   <div id='main'>
    <div class="main-content">
        <h1 class="colorc"> Please Select Your User Role </h1><br>
        <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-more">Border Officer Login</button>
        <button onclick="document.getElementById('id02').style.display='block'" class="btn btn-more">CC Officer Login</button>
        <button onclick="document.getElementById('id03').style.display='block'" class="btn btn-more">Response Team Login</button>
    </div>

     <!--for the Border officer-->
	<div id="id01" class="modal">

		<form class="modal-content animate" action="borderlogin.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="images/soldier.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>Border Officer Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="uname" required><br>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required><br>

				<button type="submit" id='b1'>Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="links">
				<span class="signup"><a href="Bordersignup.php">Don't have an account</a></span>
                <!-- <span class="psw">Forgot <a href="forgotpass.php" onclick="sendBFile()">password?</a></span> -->
			</div>
            
		</form>
	</div>

    <!--for the CC officer-->
    <div id="id02" class="modal">

		<form class="modal-content animate" action="cclogin.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="images/soldier.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>CC officer Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit" id='b2'>Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>
            <div class="links">
				<span class="signup"><a href="ccsignup.php">Don't have an account</a></span>
                <!-- <span class="psw">Forgot <a href="forgotpass.php" onclick="sendCFile()">password?</a></span> -->
			</div>
		</form>
	</div>


    <!--for the Response Team-->
	<div id="id03" class="modal">

		<form class="modal-content animate" action="responselogin.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="images/soldier.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label><b>Response Team Officer Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit" id = 'b3'>Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>
            <div class="links">
				<span class="signup"><a href="respsignup.php">Don't have an account</a></span>
                <!-- <span class="psw">Forgot <a href="forgotpass.php" onclick="sendRFile()">password?</a></span> -->
			</div>

			  
		</form>
	</div>
	<?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
            ?>

            <script>
                alert("Invalid Email or Password");
            </script>

            <?php
                }
            ?>
  </div>

    
	<script>
		function connect()
		{
			initializeContract();
		}
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

        var button1 = document.getElementById('b1');
		var loader = document.getElementById('load');
		var maindiv = document.getElementById('main');
		window.onclick = function(event)
		{
            if(event.target == button1)
			{
               loader.style.display = 'block';
			   maindiv.style['background-color'] = 'rgba(0, 0, 0, 0.4);';
			}
		}

		function sendBFile()
		{
			$_SESSION['File'] = 'border';
		}
	</script>
    <script>
		var modal = document.getElementById('id02');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

		function sendCFile()
		{
			$_SESSION['File'] = 'ccofficer';
		}
	</script>
    <script>
		var modal = document.getElementById('id03');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

		function sendRFile()
		{
			$_SESSION['File'] = 'response';
		}
	</script>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>
