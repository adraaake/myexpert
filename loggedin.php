<?php 
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['admin_id'])) {

	// Need the functions:
	require ('includes/login_functions_admin.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('includes/header_admin.html');
?>


<div class="container" style="padding-top: 175px;">
	<h1>Logged In!</h1>
	<p>You are now logged in, <?php echo "{$_SESSION['username']}!</p>";?>
</div>
<?php
include ('includes/footer.html');
?>

