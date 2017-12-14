<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Account</title>
    </head>
    <body>
        <?php

        include 'sql/connect_mysql.php';
        
        $url = $_SERVER['REQUEST_URI'];

        $username = parse_url($url, PHP_URL_QUERY);


        echo '<p>Would you like to delete: ' . $username . '?</p> ';
        echo '<form action=" " method="post">
              <input type="radio" name="answer" value="yes"> Yes<br>
              <input type="radio" name="answer" value="no"> No<br> 
              <input type="submit" name = "submit" value="submit" />
              </form>';

        $radio_input = "";
        if (isset($_POST['submit']) and ! empty($_POST['submit'])) {
            if (isset($_POST['answer'])) {
                $radio_input = $_POST['answer'];
            }
        }

        if ($radio_input == "yes") {

            $sql = "DELETE FROM users WHERE first_name = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
				echo '<script>
						alert("Successfully deleted.");
					  </script>';
				header("location: userview.php");
            } else {
				echo '<script>
						alert("Error has occured while deleting.");
					  </script>';
					  header("location: userview.php");
            }
            header("location: userview.php");
            
        } 
        
        if($radio_input == 'no'){
            header("location: userview.php");
        }
        
        
        ?>
    </body>
</html>