<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Results</title>
        <script type="text/javascript" src="cookies.js"></script>

    </head>


    <?php

    include "sql/connect_mysql.php";

    if(isset($_COOKIE['username'])){
		$username = $_COOKIE['username'];
	}



	$sql = "SELECT id_user FROM users WHERE first_name = '" . $username . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id_user = $row['id_user']; 


	$url = urldecode($_SERVER['REQUEST_URI']);
	$title = parse_url($url, PHP_URL_QUERY);


	$sql = "SELECT id_survey FROM survey_entity WHERE title = '" . $title . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id_survey = $row['id_survey']; 

	echo '<h3><p>Title: '.$title.'<br></h3>';

	echo '<p>Results: <br></p>';


	$sql = "SELECT id_question, count(*) FROM result_entity 
	WHERE id_survey = $id_survey GROUP BY id_question";
   
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		$i = 1;
		while($row = $result->fetch_assoc() ){
            
            echo "Question ".$i.": <br> ---------------<br>";
			$x = $row['id_question'];
            $sql = "SELECT answer, COUNT(*) FROM result_entity WHERE id_question= $x GROUP BY answer";
            $result_ans = $conn->query($sql);
            if ($result_ans->num_rows > 0) {
				while($row_ans = $result_ans->fetch_assoc() ){

					echo $row_ans['answer'].": ";

					echo $row_ans['COUNT(*)'] . " <b><u>people chose this answer</b></u><br/>";
				}
			}

			echo "<br>";
			++$i;
	
	} 
}



    ?>



    </head>

<body bgcolor = "orange">

	
</body>
</html>