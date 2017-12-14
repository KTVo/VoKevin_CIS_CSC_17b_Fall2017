<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit a user </title>
    </head>
    <body>
        <?php
        include 'sql/connect_mysql.php';

        $url = $_SERVER['REQUEST_URI'];
        $username = parse_url($url, PHP_URL_QUERY);

        $sql = "SELECT id_user, first_name, last_name, email, password FROM users WHERE first_name = '" . $username . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<form action = "" method ="POST">
        First Name: <input type = "text" name = "name" value = ' . $row['first_name'] . '><br><br>
		Last Name: <input type = "text" name = "nameLast" value = ' . $row['last_name'] . '><br><br>
        Email: <input type = "text" name = "emailadd" value = ' . $row['email'] . '><br><br>
        Password: <input type = "text" name = "pswd" value = ' . $row['password'] . '><br><br>
        <input type = "submit" value = "Submit">
        </form>';
        }

		if (isset($_POST['name']) && $_POST['name'] !== $username) {
            $sql = "UPDATE users SET last_name= '" . $_POST['nameLast'] . " 'WHERE first_name = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Last Name: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
		
        if (isset($_POST['name']) && $_POST['name'] !== $username) {
            $sql = "UPDATE users SET first_name= '" . $_POST['name'] . " 'WHERE first_name = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "First Name: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        if (isset($_POST['emailadd']) && $_POST['emailadd'] !== $row['email']) {
            $sql = "UPDATE users SET email= '" . $_POST['emailadd'] . " 'WHERE first_name = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Email: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }


        if (isset($_POST['pswd']) && $_POST['pswd'] !== $row['password']) {
            $sql = "UPDATE users SET password= '" . $_POST['pswd'] . " 'WHERE first_name = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Password: Record has updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        echo '<p>Go back to userview page!Click <a href="userview.php"> ***here*** </p>';
        ?>



    </body>
</html>