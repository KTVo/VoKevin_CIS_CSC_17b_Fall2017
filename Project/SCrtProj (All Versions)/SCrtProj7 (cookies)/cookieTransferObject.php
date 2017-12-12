<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read Cookie from Javascript and Translate into PHP</title>
    </head>
    <script type="text/javascript" src="cookieFunctions.js"></script>
    <body>
        <?php
            echo "Gotta Read the cookie </br>";
            $text=$_COOKIE["object"];
            echo $text."</br>";
            $myObj = json_decode($text);
            echo '<pre>';
            var_dump($myObj);
            echo '</pre>';


            
            
        ?>
        <button onclick="window.location.assign('cookieJS.html')">Goto cookieJS.html</button>
    </body>
</html>
