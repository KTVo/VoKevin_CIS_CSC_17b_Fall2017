<?php
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script type="text/javascript" src="cookieFunctions.js"></script>
  <title>Logged Out</title>
</head>

<body>
	<script>
		var d = new Date();
		//Write the cookie and check it out
        setCookie("object","",-1);
        checkCookie("object");


	</script>
    <div class="form">
          <h1><center>You have Successfully Logged Out.</center></h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
		  <script>
			localStorage.clear();
		  </script>
          <a href="index.php"><button class="button button-block"/>Return to Login</button></a>

    </div>
</body>
</html>
