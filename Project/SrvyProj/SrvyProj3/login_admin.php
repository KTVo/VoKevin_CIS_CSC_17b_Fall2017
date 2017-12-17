<?php
$mysqli = new mysqli("localhost", "root", "", "srvy");
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM admins WHERE email='$email'");

if ( $result->num_rows == 0 ){
    $_SESSION['message'] = "Email does NOT exist!";
    header("location: error.php");
}
else { 
    $admin = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $admin['password']) ) {
        
        $_SESSION['email'] = $admin['email'];
        $_SESSION['first_name'] = $admin['first_name'];
        $_SESSION['last_name'] = $admin['last_name'];
        $_SESSION['active'] = $admin['active'];
        
        $_SESSION['logged_in'] = true;

        header("location: userview.php");
    }
    else {
        $_SESSION['message'] = "Error: Incorrect Password!";
        header("location: error.php");
    }
}

