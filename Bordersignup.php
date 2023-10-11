<!DOCTYPE html>
   <title>Border Officer Signup</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/signup.css">
   </head>
   <body>
      <div class="header">
        <h2>Sign Up</h2>
      </div>
      <div class="card">
         <form action="bsignup.php" method="post">
            <div class="details">
              <label>First Name</label><br>
              <input type="text" name="fname" placeholder="Enter First Name">
            </div>
            <div class="details">
                <label>Last Name</label><br>
                <input type="text" name="lname" placeholder="Enter Last Name">
              </div>
            <div class="details">
              <label>Email</label><br>
              <input type="email" name="email" placeholder="Enter Email">
            </div>
            <div class="details">
              <label>Password</label><br>
              <input type="password" name="pass" placeholder="Enter Password">
            </div>
            <div class="details">
              <label>Designation</label><br>
              <input type="text" name="desig" placeholder="Enter Designation">
            </div>
            <div class="details">
              <label>Rank</label><br>
              <input type="number" name="rank" placeholder="Enter Rank"  max="15" min="1">
            </div>
            <div class="buttonsign">
                <button type="submit">Signup</button>
                <button type="reset">Reset</button>
            </div>
         </form>
      </div>
   </body>
</html>