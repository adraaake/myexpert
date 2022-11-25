<?php 
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

$page_title = 'Service Provider List';
include ('includes/header_admin.html');
echo "<h1 style='padding-top:175px;'>Service Provider List</h1>";

require ('../mysqli_connect.php');
		
// Define the query:
$q = "SELECT f_name, l_name, ic_num, email, mobilehp, address, service, sp_id FROM sp_members WHERE status='Approved'";
$r = @mysqli_query ($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num service providers on the list.</p>\n";

	// Table header:
	echo '<table align="center" class="table" cellspacing="5" cellpadding="5" width="103%">
	<thead>
		<th scope="col" align="left">First Name</td>
		<th scope="col" align="left">Last Name</td>
		<th scope="col" align="left">NRIC</td>
		<th scope="col" align="left">Email</td>
		<th scope="col" align="left">Contact Number</td>
		<th scope="col" align="left">Category Service</td>
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
	</thead>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left">' . $row['f_name'] . '</td>
			<td align="left">' . $row['l_name'] . '</td>
			<td align="left">' . $row['ic_num'] . '</td>
			<td align="left">' . $row['email'] . '</td>
			<td align="left">' . $row['mobilehp'] . '</td>
			<td align="left">' . $row['service'] . '</td>
			<td align="left"><a href="edit_sp_list.php?id=' . $row['sp_id'] . '">Edit</a></td>
			<td align="left"><a href="delete_sp_list.php?id=' . $row['sp_id'] . '">Delete</a></td>
		</tr>
';
	}

	echo '</table>';
	mysqli_free_result ($r); // Free memory associated with $r	

} else { // If no records were returned.
	echo '<p class="error">There are currently no service package.</p>';
}
mysqli_close($dbc); // Close database connection

include ('includes/footer.html');
?>