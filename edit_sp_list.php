<?php 
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit Service Provider Details';
include ('includes/header_admin.html');
echo '<h1>Edit Service Provider Details</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('footer.html'); 
	exit();
}

require ('../mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Collect error message
	
	// Check for a first name:
	if (empty($_POST['f_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['f_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['l_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = trim($_POST['l_name']);
	}
	
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email.';
	} else {
		$e = trim($_POST['email']);
	}
	
	// Check for address:
	if (empty($_POST['mobilehp'])) {
		$errors[] = 'You forgot to enter your contact number.';
	} else {
		$mh = trim($_POST['mobilehp']);
	}
	
	// Check for city:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$ad = trim($_POST['address']);
	}
	
	// Check for state:
	if (empty($_POST['c_name'])) {
		$errors[] = 'You forgot to enter your company name.';
	} else {
		$cn = trim($_POST['c_name']);
	}
	
	// Check for phone no:
	if (empty($_POST['service'])) {
		$errors[] = 'You forgot to enter your service ';
	} else {
		$s = trim($_POST['service']);
	}
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT sp_id FROM sp_members WHERE email='$e' AND sp_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE sp_members SET f_name='$fn', l_name='$ln', email='$e',mobilehp='$mh' , address='$ad', c_name='$cn' , service='$s'
			WHERE sp_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The details has been edited.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class="error">The details could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
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
$q = "SELECT f_name, l_name, email, mobilehp, address, c_name, service FROM sp_members WHERE sp_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="edit_sp_list.php" method="post">
	<p>First Name: <input type="text" name="f_name" size="15" maxlength="20" value="' . $row[0] . '" /></p>
	<p>Last Name: <input type="text" name="l_name" size="15" maxlength="40" value="' . $row[1] . '" /></p>
	<p>Email: <input type="text" name="email" size="15" maxlength="60" value="' . $row[2] . '" /></p>
	<p>Contact Number: <input type="text" name="mobilehp" size="15" maxlength="60" value="' . $row[3] . '" /></p>
	<p>Address: <input type="text" name="address" size="15" maxlength="60" value="' . $row[4] . '" /></p>
	<p>Company Name: <input type="text" name="c_name" size="15" maxlength="60" value="' . $row[5] . '" /></p>
	<p>Type of Service: <input type="text" name="service" size="15" maxlength="60" value="' . $row[6] . '" /></p>
	<p><input type="submit" name="submit" value="Update" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.html');
?>