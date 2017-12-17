<!DOCTYPE html>
<html>
<head>

<?php

include "sql/connect_mysql.php";


if(isset($_COOKIE['username'])){
	$username = $_COOKIE['username'];


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


echo "Title: " . $title.'<br>';


$row = array();
$row_ans = "";
$sql = "SELECT question, id_question FROM question_entity WHERE id_survey = '" . $id_survey . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc() ){
	echo "<div class='questions' style = 'border: dotted 1px grey'>";
	echo '<form method="POST">';
	echo "<p>Q: ". $row['question']."</p>";

		$sql_ans= "SELECT answer FROM answer_entity WHERE id_question = '" . $row['id_question'] . "'";
		$result_ans = $conn->query($sql_ans);
		if ($result_ans->num_rows > 0) {
			while($row_ans = $result_ans->fetch_assoc() ){
				echo '<p><input type ="radio" name="' .$row['id_question'] .'" value="' .$row_ans['answer'].'">'.$row_ans['answer']."</p>";
			}
    
    		$x = $row['id_question'];
    		$y = $row_ans['answer'];

			if( isset($_POST[$x])){
				$sql = "INSERT INTO result_entity (id_question, answer, id_survey) VALUES ('$x', '$_POST[$x]', '$id_survey')"; 
    			if ($conn->query($sql) === TRUE) {
    				}else{
      				echo 'Error:' . $sql . '<br/>' . $conn->error;
    			} 

			}

		}

    echo '<form>';
    echo '</div>';
		}
	}
}



echo "<button type='submit'>Submit Survey</button><br>";
echo "<a href='result.php?".$title."'>Proceed to Results</p>";


?> 

</head>

<body bgcolor = "orange">


</body>
</html>