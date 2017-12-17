<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Page</title>
        <style>
            table,th,td{
                border: 1px dotted black;
                border-collapse: collapse;
                align: left;
            }
           
            
            th,tr,td{
                padding: 15px;
            }
            
            caption{
                font-size:30px;
            }
            
            
            
            
            </style>
    </head>
    <body>
        <?php
        // put your code here

        include '../sql/connect_mysql.php';
 

        $sql = "SELECT id_user, first_name,last_name, email, password FROM  users";
        $results = $conn->query($sql);

        echo "<table style ='width: 100%'>
            <caption>View the User Accounts!</caption>
               <tr>
               <th>Edit</th>
               <th>Delete</th>
               <th>first_name</th>
			   <th>last_name</th>
               <th>Email</th>
               <th>Password</th>
               </tr>";

        if ($results->num_rows > 0) {
            // output data of each row
            while ($row = $results->fetch_assoc()) {

                echo "<tr align='left'>";
                echo "<td align='center'>" .'<a href="edit_user.php?'.$row['first_name'].'">Edit</a>'. "</td>";
                echo "<td align='center'>" .'<a href="delete_user.php?'.$row['first_name'].'">Delete</a>'. "</td>";
				echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </body>
</html>
