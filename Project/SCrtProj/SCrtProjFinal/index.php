<?php 
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">

	<div id="login">
	<a href = "index_admin.php" />Administrative Login Page</a>
		<center>
          <h1>Login</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">: </span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">: </span>
            </label>
            <input type="password" required autocomplete="off" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 4 characters" autocomplete="new-password" />
          </div>

          <br>
          <button class="button button-block" name="login" />Log In</button>
		  <button type = "button"><a href = "signup_form.php">Register</a>
          
          </form>
		 </center> 
	</div>
                
	</div> <!-- /form -->

 
  

</body>
</html>
