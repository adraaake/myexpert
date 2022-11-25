<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Booking">
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
<div class="container" style="margin-top:20px; margin-bottom: 60px;">


<div class="row">
    <div class="form-group col-5">
        <label for="">City</label>
        <select class="form-control" name="city" id="city">
            <option value="none">-- Select City --</option>
            <?php foreach ($cities as $city) : ?>
            <option value="<?= $city ?>"> <?= $city ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group col-5">
        <label for="">Who's Required</label>
        <select class="form-control" name="service" id="service">
        <option value="Car Cleaning">Car Cleaning</option>
        <option value="Home Cleaning">Home Cleaning</option>
        <option value="Maintenance">Maintenance</option>
		<option value="Appliance Repair">Appliance Repair</option>
		<option value="Beauty Treatment">Beauty Treatment</option>
        </select>
    </div>

<div class="form-group col-2">
            <label for="">Action</label>
            <button id="search" class="form-control btn btn-success" type="button">Search</button>
        </div>
    </div>

    <div class="table-responsive">
        <table id="providers" class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan='5'>Select city and profession..</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!--footer-->
<?php include ('includes/footer.html');
?>
