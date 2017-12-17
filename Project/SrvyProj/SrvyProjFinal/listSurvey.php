<!DOCTYPE html>
<html>
<head>
	<title>Created Surveys</title>
    <script type="text/javascript" src="cookieFunction.js"></script>


<?php

include "sql/connect_mysql.php";

include "submit.php";

$sql = "SELECT id_user FROM users WHERE first_name = '" . $username . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$id_user = $row['id_user']; 



$sql = "SELECT title,id_survey FROM survey_entity WHERE id_user = '".$id_user."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Surveys Created: <br>";
	while($row = $result->fetch_assoc() ){
	echo "<a href='survey.php?".$row['title']."'>".$row['title']. "</p>";

	}
}

?> 

</head>
<body bgcolor= "orange">

	
</body>
</html>
