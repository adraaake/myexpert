<?php 
// This script retrieves all the records from the users table.
// This new version links to edit and delete pages.

$page_title = 'View the Package';
include ('includes/header_sp.html');
echo '<h1>Service Package List</h1>';

require ('../mysqli_connect.php');
		
// Define the query:
$q = "SELECT s_name, category, description, price, s_id FROM service_package";	
$r = @mysqli_query ($dbc, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num service package.</p>\n";

	// Table header:
	echo '<table align="center" cellspacing="5" cellpadding="5" width="103%">
	<tr>
		<td align="left"><b>Package Name</b></td>
		<td align="left"><b>Category</b></td>
		<td align="left"><b>Description</b></td>
		<td align="left"><b>Price</b></td>
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
	</tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align="left">' . $row['s_name'] . '</td>
			<td align="left">' . $row['category'] . '</td>
			<td align="left">' . $row['description'] . '</td>
			<td align="left">' . $row['price'] . '</td>
			<td align="left"><a href="edit_sp.php?id=' . $row['s_id'] . '">Edit</a></td>
			<td align="left"><a href="delete_sp.php?id=' . $row['s_id'] . '">Delete</a></td>
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