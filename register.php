<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Service Provider Registration">
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


$page_title = 'Register with Us as Professionals!';
include ('includes/header.html');

?>
<?php
$cities = ["Ahmednagar", "Akola", "Akot", "Amalner", "Ambejogai", "Amravati", "Anjangaon"];
?>
<?php

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['f_name'])) {
		$errors[] = 'Please enter your first name';
	} else {
		$fn = trim($_POST['f_name']);
	}

	// Check for a last name:
	if (empty($_POST['l_name'])) {
		$errors[] = 'Please enter your last name';
	} else {
		$ln = trim($_POST['l_name']);
	}

	// Check for username:
	if (empty($_POST['username'])) {
		$errors[] = 'Please enter your username';
	} else {
		$un = trim($_POST['username']);
	}

	// Check for a password
	if (empty($_POST['password'])) {
			$errors[] = 'Please enter your password';
		} else {
			$pw = trim($_POST['password']);
		}

	// Check ic_num:
	if (empty($_POST['ic_num'])) {
		$errors[] = 'Please enter your NRIC';
	} else {
		$ic = trim($_POST['ic_num']);
	}

	// Check email:
	if (empty($_POST['email'])) {
		$errors[] = 'Please enter your email';
	} else {
		$e = trim($_POST['email']);
	}

	// Check phoneno:
	if (empty($_POST['mobilehp'])) {
		$errors[] = 'Please enter your phone number';
	} else {
		$mh = trim($_POST['mobilehp']);
	}

	// Check address:
	if (empty($_POST['address'])) {
		$errors[] = 'Please enter your address';
	} else {
		$ad = trim($_POST['address']);
	}

	// Check city:
	if (empty($_POST['city'])) {
		$errors[] = 'Please choose your city';
	} else {
		$city = trim($_POST['city']);
	}

	// Check for company name:
	if (empty($_POST['c_name'])) {
		$errors[] = 'Please enter your company name';
	} else {
		$cn = trim($_POST['c_name']);
	}

	// Check for Type of Service:
	if (empty($_POST['service'])) {
		$errors[] = 'Please enter your type of service';
	} else {
		$s = trim($_POST['service']);
	}

	// Check for past work experience:
	if (empty($_POST['w_exp'])) {
		$errors[] = 'Please enter your past work experience';
	} else {
		$exp = trim($_POST['w_exp']);
	}

	if (empty($_POST['prof_image'])) {
		$errors[] = 'Please upload your profile picture';
	} else {
		$pi = trim($_POST['prof_image']);
	}

	if (empty($errors)) { // If everything's OK. ($fn && $ln && $e)

		// Register the user in the database...

		require ('../mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO sp_members (f_name, l_name, username, password, ic_num, email, mobilehp, address, city, c_name, service, w_exp, status,prof_image) VALUES ('$fn', '$ln', '$un', '$pw', '$ic', '$e','$mh','$ad','$city','$cn', '$s', '$exp', 'Pending', '$pi')";
		
		if(move_uploaded_file($tmp_name,"images/$pi"))
	{

		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) 
		{ // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered.</p><p><br /></p>';
		}
		
		}
		else 
		{ // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

		}
	  // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.
		include ('includes/footer.html');
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




<div class="container">
	<div class="row mt-5" id="register-form">
		<div class="col-md-6">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<h1>Registration Form</h1>
				<form action="register.php" method="post">
					<div class="form-group">
						<h6 class="section-secondary-title">Full Name</h6>
						<input type="text" name="f_name" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['f_name'])) echo $_POST['f_name']; ?>" placeholder="First Name" />
						<input type="text" name="l_name" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>"placeholder="Last Name" />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Username </h6>
						<input type="text" name="username" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" placeholder="Username"  />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Password  </h6>
						<input type="password" name="password" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Password"  />
					</div>

					<div class="form-group">
						<h6 class="">NRIC  </h6>
						<input type="text" name="ic_num" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['ic_num'])) echo $_POST['ic_num']; ?>" placeholder="NRIC"  />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Email</h6>
						<input type="email" name="email" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email"  />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Phone Number</h6>
						<input type="text" name="mobilehp" class="form-control" size="15" maxlength="20" value="<?php if (isset($_POST['mobilehp'])) echo $_POST['mobilehp']; ?>"placeholder="Phone Number" />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Address</h6>
						<textarea name="address" class="form-control" size="20" maxlength="100" value="<?php if (isset($_POST['address'])); ?>" placeholder="Address" ></textarea>
					</div>
					<div class="form-group">
					<label for="">City</label>
                    <select class="form-control" name="city" id="city">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city ?>"> <?= $city ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Company Name</h6>
						<input type="text" name="c_name" class="form-control" size="20" maxlength="20" value="<?php if (isset($_POST['c_name'])) echo $_POST['c_name']; ?>" placeholder="Company Name"  />
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Type of Service</h6>
                    <select class="form-control" name="service" id="service">
                        <option value="Car Cleaning">Car Cleaning</option>
                        <option value="Home Cleaning">Home Cleaning</option>
                        <option value="Maintenance">Maintenance</option>
						<option value="Appliance Repair">Appliance Repair</option>
						<option value="Beauty Treatment">Beauty Treatment</option>
                    </select>
					</div>
					<div class="form-group">
						<h6 class="section-secondary-title">Work Experience</h6>
						<input type="text" name="w_exp" class="form-control" size="50" maxlength="100" value="<?php if (isset($_POST['w_exp'])) echo $_POST['w_exp']; ?>" placeholder="Work Experience"  />
					</div>
					<div class="form-group">
                    <h6 class="section-secondary-title">Profile Picture</h6>
                    <input id="prof_image" name="prof_image" type="file" class="form-control-file" placeholder="Select Photo 1"
                        required>
                </div>
				<input type="submit" class="btn btn-primary" name="submit" value="Register" />
			</form>
		</div>
	</div>
</div>


<!--footer-->
<?php include ('includes/footer.html');
?>

