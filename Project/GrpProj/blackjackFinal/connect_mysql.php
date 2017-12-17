<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here


        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "survey";

// Create connection
        $mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        mysqli_set_charset($mysqli, 'utf8');

        ?>
    </body>
</html>
