<?php
/* Admin login process, checks if admin exists and password is correct */
$mysqli = new mysqli("localhost", "root", "", "accounts");
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM admins WHERE email='$email'");

if ( $result->num_rows == 0 ){ // Admin doesn't exist
    $_SESSION['message'] = "Admin with that email doesn't exist!";
    header("location: error.php");
}
else { // Admin exists
    $admin = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $admin['password']) ) {
        
        $_SESSION['email'] = $admin['email'];
        $_SESSION['first_name'] = $admin['first_name'];
        $_SESSION['last_name'] = $admin['last_name'];
        $_SESSION['active'] = $admin['active'];
        
        // This is how we'll know the admin is logged in
        $_SESSION['logged_in'] = true;

        header("location: admin_page.html");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

