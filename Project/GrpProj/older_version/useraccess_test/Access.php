<?php
/* Database connection settings */
include "sql/connect_mysql.php";

session_start();



if ($_SERVER['REQUEST_METHOD']=='POST'){

  if(isset($_POST['login'])){

    require 'login.php';
  }

else if (isset($_POST['register'])){
  require 'getForm.php';
}

}

 ?>


<html>
    <head>
        <title>Log-In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Log-In</h1>
        <div id="login">
        <form class="form" action="Access.php" method="post" enctype="multipart/form-data" autocomplete="off">

<div class="field-wrap">
  <label>
    Email Address<span class="req">*</span>
  </label>
  <input type="email" required autocomplete="off" name="email"/>

  <div class="field-wrap">
    <label>
      Password<span class="req">*</span>
    </label>
    <input type="password" required autocomplete="off" name="password"/>


    <input type="submit" name="login" placeholder="Log-In"/>

    <button type="button"><a href="getForm.php">Register</a></div>

<br></br>
      <button type="button"><a href="AdminAccess.php">Administration</a></div>

        </form>
    </body>
</html>
