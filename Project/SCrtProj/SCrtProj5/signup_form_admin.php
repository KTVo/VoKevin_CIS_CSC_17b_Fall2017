<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Administrator</title>

</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login_admin.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register_admin.php';
        
    }
}
?>
<body>
  <div class="form">
      
      
        
		<center>
          <h1>Register</h1>
          
          <form action="index_admin.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">: </span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">: </span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">: </span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
				Password<span class="req">: </span>
            </label>
            <input type="password"required autocomplete="off" name='password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{3,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 3 or more characters"/>
          </div>
          
          <p><button type="submit" name="register" />Register</button> <br>Returning User? <button type = "button"><a href = "index.php">Login</button></p>
        </center>  
    </form>

        
      </div><!-- tab-content -->
      
</div> <!-- /form -->


</body>
</html>
