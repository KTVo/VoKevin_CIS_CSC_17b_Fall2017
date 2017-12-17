<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
include "useraccess_test/sql/connect_mysql.php";





$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.html");
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['password'], $user['password']) ) {


        setcookie("email", $email,time()+36000);

        $_SESSION['email'] = $user['email'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

//        echo $_COOKIE['username'];

       header("location: ../blackjack-HIT&STAND/blackjack(hit&stand&box&double&bet&repeatbet).html");
    }
    else  {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: errorpass.html");
    }


}
