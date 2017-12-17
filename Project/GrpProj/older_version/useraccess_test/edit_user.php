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
        // put your code here
        include 'sql/connect_mysql.php';
        $url = $_SERVER['REQUEST_URI'];
        $username = parse_url($url, PHP_URL_QUERY);
        echo "<p>Edit user: " . $username . "</p>";
        $sql = "SELECT id_user, username, email, password, balance FROM users WHERE username = '" . $username . "'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<form action = "" method ="POST">
        User name: <input type = "text" name = "name" value = ' . $row['username'] . '><br><br>
        Email address: <input type = "text" name = "emailadd" value = ' . $row['email'] . '><br><br>
        Password: <input type = "text" name = "pswd" value = ' . $row['password'] . '><br><br>
        Balance: <input type="text" name="bal" value= ' . $row['balance'] . '><br><br>
        <input type = "submit" value = "Submit">
        </form>';
        }
        if (isset($_POST['name']) && $_POST['name'] !== $username) {
            $sql = "UPDATE users SET username= '" . $_POST['name'] . " 'WHERE username = '" . $username . "'";
            if ($mysqli->query($sql) === TRUE) {
                echo "Username: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        }
        if (isset($_POST['emailadd']) && $_POST['emailadd'] !== $row['email']) {
            $sql = "UPDATE users SET email= '" . $_POST['emailadd'] . " 'WHERE username = '" . $username . "'";
            if ($mysqli->query($sql) === TRUE) {
                echo "Email: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        }
        if (isset($_POST['pswd']) && $_POST['pswd'] !== $row['password']) {

          //setting new password and encrypting after user submits
            $sql = "UPDATE users SET password= '" . $mysqli->real_escape_string(password_hash($_POST['pswd'],PASSWORD_BCRYPT)) . " 'WHERE username = '" . $username . "'";
            if ($mysqli->query($sql) === TRUE) {
                echo "Password: Record has updated successfully";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        }
        if (isset($_POST['bal']) && $_POST['bal'] !== $row['balance']) {

          //setting new password and encrypting after user submits
            $sql = "UPDATE users SET balance= '" . $mysqli->real_escape_string($_POST['bal']) . " 'WHERE username = '" . $username . "'";
            if ($mysqli->query($sql) === TRUE) {
                echo "Balance: Record has updated successfully";
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        }

        echo '<p><a href="view_users.php"> Return </p>';
        ?>



    </body>
</html>
