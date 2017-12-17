<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		<script type="text/javascript" src="cookieFunctions.js"></script>
        <title>Leaderboard</title>
        <style>
    		body{
			background-image: url("images/bluebackground.jpg");
			color : white;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: black;
		}

		tr:nth-child(odd) {
			background-color: #34495E;
		}
		a.ex1:hover, a.ex1:active {color: #F8C471;}


            </style>
			<script type="text/javascript" src="cookieFunctions.js"></script>
    </head>
    <body>
        <?php
					$x = 0 * 1;
        include 'sql/connect_mysql.php';


        $sql = "SELECT id_user, username, balance FROM  users";
        $results = $mysqli->query($sql);

        echo "<table style ='width: 100%'>
            <h1><center>Leaderboard</center><h1>
               <tr>
               <th><center><a class='ex1' href='leaderboard_username_ascend.php'>Username</a></center></th>
			   <th><center><a class='ex1' href='leaderboard_earning_ascend.php'>Earning ($)</a></center></th>
               </tr>";

			$sorted_username = array();
			$sorted_balance = array();

        if ($results->num_rows > 0) {

            // output data of each row
            while ($row = $results->fetch_assoc()) {

				$sorted_username[$x] = $row['username'];
				$sorted_balance[$x] = $row['balance'];
				$x = $x + 1;
			}

			//sort($sorted_username);



		for ($i = count($sorted_username);  $i >= 0 ; $i--){
			for ($x = 0 ; $x < count($sorted_username) - 1; $x++){
				if($sorted_balance[$x] > $sorted_balance[$x+1]){
					$tempName = $sorted_username[$x+1];
					$sorted_username[$x+1] = $sorted_username[$x];
					$sorted_username[$x] = $tempName;

					$tempBalance = $sorted_balance[$x+1] ;
					$sorted_balance[$x+1]  = $sorted_balance[$x];
					$sorted_balance[$x] = $tempBalance;



			}
		}
	}





			for($a = 0; $a < count($sorted_username); $a++){


                echo "<tr align='left'>";
				echo "<td>" . $sorted_username[$a] . "</td>";
				echo "<td>" . $sorted_balance[$a] . "</td>";

                echo "</tr>";
			}

        } else {
            echo "0 results";
        }

        ?>
    </body>
</html>
