<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Service Package">
    <title>MYExpert</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">

</head>

<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.


$page_title = 'Service Package';
include ('includes/header_sp.html');

?>
<?php

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a service name:
	if (empty($_POST['s_name'])) {
		$errors[] = 'Please enter your service package name';
	} else {
		$sn = trim($_POST['s_name']);
	}
	
	// Check for a category name:
	if (empty($_POST['category'])) {
		$errors[] = 'Please enter your category';
	} else {
		$c = trim($_POST['category']);
	}

	// Check for description:
	if (empty($_POST['description'])) {
		$errors[] = 'Please enter your description';
	} else {
		$d = trim($_POST['description']);
	}
	
	// Check for a price 
	if (empty($_POST['price'])) {
			$errors[] = 'Please enter your price';
		} else {
			$p = trim($_POST['price']);
		}


	if (empty($errors)) { // If everything's OK. ($fn && $ln && $e)
	
		// Register the user in the database...
		
		require ('../mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO service_package (s_name, category, description, price) VALUES ('$sn', '$c', '$d', '$p')";			
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Your package has been added</p><p><br /></p>';	

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be saved due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.
		include ('footer.html');
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>

<div class="row mt-5" style="padding-top: 175px;">
	<div class="col-md-6" style="">
		<h1>Service Package</h1>
			<form action="package.php" method="post">
				<div class="form-group">
					<h6 class="section-secondary-title">Package Name</h6>
					<input type="text" name="s_name" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['s_name'])) echo $_POST['s_name']; ?>" placeholder="Service package" />
				</div>
				<div class="form-group">
					<h6 class="section-secondary-title">Category </h6>
					<input type="text" name="category" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['category'])) echo $_POST['category']; ?>" placeholder="Car Cleaning/Home Cleaning/ Maintenance/ Appliance Repair/Beauty Treatment"  />
				</div>
				<div class="form-group">
					<h6 class="section-secondary-title">Description  </h6>
					<textarea name="description" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>" placeholder="Details about package"></textarea>
				</div>
				
				<div class="form-group">
					<h6 class="">Price  </h6>
					<input type="text" name="price" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" placeholder="Price"  />
				</div>
			<input type="submit" name="submit" value="Save" />
		</form>
	</div>
</div>


<!--footer-->
<?php include ('includes/footer.html');
?>

