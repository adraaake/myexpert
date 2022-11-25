<?php 
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit Service Package Details';
include ('includes/header_sp.html');
echo '<h1>Edit Service Package Details</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require ('../mysqli_connect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Collect error message
	
	// Check for a first name:
	if (empty($_POST['s_name'])) {
		$errors[] = 'You forgot to enter your package name.';
	} else {
		$sn = trim($_POST['s_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['category'])) {
		$errors[] = 'You forgot to enter your category';
	} else {
		$c = trim($_POST['category']);
	}
	
	if (empty($_POST['description'])) {
		$errors[] = 'You forgot to enter your description.';
	} else {
		$d = trim($_POST['description']);
	}
	if (empty($_POST['price'])) {
		$errors[] = 'You forgot to enter your price.';
	} else {
		$p = trim($_POST['price']);
	}
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT s_id FROM service_package WHERE s_name='$sn' AND s_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE service_package SET s_name='$sn', category='$c', description='$d', price='$p'
			WHERE s_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The details has been edited.</p>';	
				
			} else { // If it did not run OK.
				echo '<p class="error">The details could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<p class="error">The package name has already been registered.</p>';
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
$q = "SELECT s_name, category, description, price FROM service_package WHERE s_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="edit_sp.php" method="post">
	<p>Package Name: <input type="text" name="s_name" size="15" maxlength="20" value="' . $row[0] . '" /></p>
	<p>Category: <input type="text" name="category" size="15" maxlength="40" value="' . $row[1] . '" /></p>
	<p>Description: <input type="text" name="description" size="15" maxlength="60" value="' . $row[2] . '" /></p>
	<p>Price: <input type="text" name="price" size="15" maxlength="60" value="' . $row[3] . '" /></p>
	<p><input type="submit" name="submit" value="Update" /></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.html');
?>