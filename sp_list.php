<?php 
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

$page_title = 'Service Provider List';
include ('includes/header_admin.html');
echo "<h1 style='padding-top:175px;'>Service Provider List</h1>";

require ('../mysqli_connect.php');
		
// Define the query:
$q = "SELECT f_name, l_name, ic_num, email, mobilehp, address, service, status FROM sp_members WHERE status='Pending'";
$r = @mysqli_query ($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num pending service providers on the list.</p>\n";

	// Table header:
	echo '<table align="center" class="table" cellspacing="5" cellpadding="5" width="103%">
	<thead>
		<th scope="col" align="left">First Name</td>
		<th scope="col" align="left">Last Name</td>
		<th scope="col" align="left">NRIC</td>
		<th scope="col" align="left">Email</td>
		<th scope="col" align="left">Contact Number</td>
		<th scope="col" align="left">Category Service</td>
		<th scope="col" align="left">Status</td>
		<th scope="col" align="left">Action</td>
	</thead>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		?><tr>
			<td align="left"><?php echo $row['f_name'] ?></td>
			<td align="left"><?php echo $row['l_name'] ?></td>
			<td align="left"><?php echo $row['ic_num'] ?></td>
			<td align="left"><?php echo $row['email'] ?></td>
			<td align="left"><?php echo $row['mobilehp'] ?></td>
			<td align="left"><?php echo $row['service'] ?></td>
			<td align="left"><?php echo $row['status'] ?></td>
			<td align="left">
				<form action="sp_list.php" method="POST">
					<input type="hidden" name="mobilehp" value="<?php echo $row['mobilehp'];?>" />
					<input type="submit" name="Approved" value="Approved" />
					<input type="submit" name="Denied" value="Denied" />
				</form>
			</td>
		</tr>
	<?php } ?>
	</table>
		<?php
	
	if(isset($_POST['Approved'])){
		$mobilehp = $_POST['mobilehp'];
		
		$select = "UPDATE sp_members SET status='Approved' WHERE mobilehp='$mobilehp'";
		$r = @mysqli_query ($dbc, $q);
		
		echo '<script type="text/javascript">';
		echo 'alert("Service Provider Approved")';
		echo 'window.location.href = "sp_list.php"';
		echo '</script>';
	}
	
	if(isset($_POST['Denied'])){
		$mobilehp = $_POST['mobilehp'];
		
		$select = "UPDATE sp_members SET status='Denied' WHERE mobilehp='$mobilehp'";
		$r = @mysqli_query ($dbc, $q);
		
		echo '<script type="text/javascript">';
		echo 'alert("Service Provider Denied")';
		echo 'window.location.href = "sp_list.php"';
		echo '</script>';
	}

} else { // If no records were returned.
	echo '<p class="error">There are currently no service provider list.</p>';
}

mysqli_close($dbc); // Close database connection

include ('includes/footer.html');
?>