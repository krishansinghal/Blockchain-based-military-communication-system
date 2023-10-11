<!DOCTYPE html>
   <title>Forgot Password</title>
   <head>
     <link rel="stylesheet" type="text/css" href="css/forgotpass.css">
   </head>
   <body>
     <div class="header">
       <h2>Forgot Password</h2>
     </div>
     <div class="forgot">
       <form action="forgotmail.php" method="post">
          <label>Please enter your email</label>
          <input type="email" placeholder="Enter your email" name="email" required> 
          <button type="submit">Submit</button>
       </form>
     </div>  
   </body>
</html>