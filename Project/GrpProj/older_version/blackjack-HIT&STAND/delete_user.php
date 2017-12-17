

<?php
include "sql/connect_mysql.php";
$page_title = 'Delete a User';

// Create connection

        $url = $_SERVER['REQUEST_URI'];
				$username = parse_url($url, PHP_URL_QUERY);


 				$sql1 = "DELETE FROM users WHERE username = '" . $username . "'";


if ($mysqli->query($sql1) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $mysqli->error;
}

$mysqli->close();
        echo '<p><a href="view_users.php"> Return </p>';
?>
