<!DOCTYPE html>
<html>
<head>
	<title>Created Surveys</title>
    <script type="text/javascript" src="cookieFunction.js"></script>
</head>

<body>
	<a href="logout.php"><p align = "right", style="font-size : 30px";>Logout</p></a>
	<h1><center>Created Surveys</center></h1>
	
	<?php
		include "sql/connect_mysql.php";
		include "submit.php";

		if(isset($_COOKIE['username'])){
			$username = $_COOKIE['username'];
		}

		$sql = "SELECT id_user FROM users WHERE first_name = '" . $username . "'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id_user = $row['id_user']; 
		$sql = "SELECT title,id_survey FROM survey_entity WHERE id_user = '".$id_user."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc() ){
				echo "<a href='survey.php?".$row['title']."'>".$row['title']. "</p>";

			}
		}

	?> 
	
</body>
</html>
