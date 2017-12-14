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
        // put your code here

        include '../sql/connect_mysql.php';
        
        $url = $_SERVER['REQUEST_URI'];

        $username = parse_url($url, PHP_URL_QUERY);


        echo '<p>Do you want to continue to delete ' . $username . '?</p> ';
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
                echo "Username: ".$username." ----Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
                
            }
            echo '<p>Go back to userview page!Click <a href="userview.php"> ***here*** </p>';
            
        } 
        
        if($radio_input == 'no'){
            echo "No record is deleted!";
            echo '<p>Go back to userview page!Click <a href="userveiw_survey.php"> ***here*** </p>';
        }
        
        
        ?>
    </body>
</html>