<?php 
// This page processes the login form submission.
// The script now uses sessions.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require ('includes/login_functions_sp.php');
	require ('../mysqli_connect.php');
		
	// Check the login:
	list ($check, $data) = check_login($dbc, $_REQUEST['username'], $_REQUEST['password']);
	
	if ($check) { // OK!
		
		// Set the session data:
		session_start();
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		
		// Redirect:
		redirect_user('loggedin_sp.php');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for login_page.inc.php:
		$errors = $data;

	}
		
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('login_sp.php');
?>