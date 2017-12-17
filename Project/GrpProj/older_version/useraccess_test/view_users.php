<html>
    <head>
        <meta charset="UTF-8">
        <title>User Records</title>
        <style>
            table,th,td{
                border: 1px dotted black;
                border-collapse: collapse;
                align: left;
            }


            th,tr,td{
                padding: 5px;
            }

            caption{
                font-size:15px;
            }

            </style>
    </head>
    <body>
        <?php
        // put your code here
        include "sql/connect_mysql.php";

        $sql = "SELECT id_user, username, email, password,balance FROM  users";
        $results = $mysqli->query($sql);

        echo "<table style ='width: 100%'>
            <caption>User Records</caption>
               <tr>
               <th>Edit</th>
               <th>Delete</th>
               <th>Username</th>
               <th>Email</th>
               <th>Password</th>
               <th>Balance</th>
               </tr>";
        if ($results->num_rows > 0) {
            // output data of each row
            while ($row = $results->fetch_assoc()) {
                echo "<tr align='left'>";
                echo "<td align='center'>" .'<a href="edit_user.php?'.$row['username'].'">Edit</a>'. "</td>";
                echo "<td align='center'>" .'<a href="delete_user.php?'.$row['username'].'">Delete</a>'. "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['balance'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>

        <button type="button"><a href="Access.php">Return to Login Page</a></div>
        <button type="button"><a href="logout.php">Log-Out</a></div>

    </body>
</html>
