<!DOCTYPE html>

<body>
<?php # Script 10.3 - edit_user.php
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit a User';

echo '<h1>Edit a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id_user'])) && (is_numeric($_GET['id_user'])) ) { // From view_users.php
	$id = $_GET['id_user'];
} elseif ( (isset($_POST['id_user'])) && (is_numeric($_POST['id_user'])) ) { // Form submission.
	$id = $_POST['id_user'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	
	exit();
}

require ('mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT id_user FROM users WHERE email='$e' AND id_user != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE users SET first_name='$fn', last_name='$ln', email='$e' WHERE id_user=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The user has been edited.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT first_name, last_name, email FROM users WHERE id_user=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="edit_user.php" method="post">
<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id_user" value="' . $id . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		

?>
<button onclick="window.location.assign('view_users.php')">Return to Admin Page</button>
</body>
</html>