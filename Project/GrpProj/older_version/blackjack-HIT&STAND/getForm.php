<?php
session_start();
$_SESSION['message'] = '';
include "sql/connect_mysql.php";

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //checking the two passwords if theyre equal
    if ($_POST['password'] == $_POST['confirmpassword']) {

        //setting post variables
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string(password_hash($_POST['password'],PASSWORD_BCRYPT));
        $balance =(1000*1);



                //set session variables
                $_SESSION['username'] = $username;


                //inserts user data into database
                $sql = "INSERT INTO users (username, email, password,balance) "
                        . "VALUES ('$username', '$email', '$password',$balance)";

                //if the query is successsful, redirect to regsuccess.html page
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: regsuccess.html");
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();
            }

    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>

<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="getForm.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" pattern="[a-zA-Z0-9]{2,15}" title="email should only contain characters and numbers" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />

      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
