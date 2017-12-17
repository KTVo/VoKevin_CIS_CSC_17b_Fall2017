<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cart Complete</title>
		<script type="text/javascript" src="cookieFunctions.js"></script>
		<script type="text/javascript" src="cart.js"></script>
    </head>
    
    <body>
        <?php
            $text=$_COOKIE["object"];
            //echo $text."</br>";
            $myObj = json_decode($text);
            echo '<pre>';
            //var_dump($myObj);
            echo '</pre>';
			$text = str_replace("name","<br><br>Item",$text);
			$text = str_replace("count","<br>Quantity",$text);
			$text = str_replace("price","<br>Cost",$text);
			echo ("<h1><center>Reciept</center></h1>");
			$arr1 = str_split($text);

			echo "<center>";
				for ($i = 8; $i < strlen($text); $i++) {
					if($arr1[$i] != "{" && $arr1[$i] != "}" && $arr1[$i] != "[" && $arr1[$i] != "]" && $arr1[$i] != "\"")
						if($arr1[$i] == ":")
							echo ": ";
						else if($arr1[$i] == ",")
							echo "   ";
						else
							echo ($arr1[$i]);
				}
				
			echo "</center>";
			echo ("<br><br>");
			
            
            
        ?>

		
        <button onclick="window.location.assign('storefront.html')">Return to Store</button>
    </body>
</html>
