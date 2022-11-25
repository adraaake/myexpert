
	<!--header-->
    <?php include ('includes/header.html');?>
	<!-- end of header-->

      <div class="container">
        <h1>Login for Service Provider</h1>
  			<form action="login.php" method="post">
  			<?php if (isset($_GET['error'])) { ?>
  				<p class="error"><?php echo $_GET['error']; ?></p>
  			<?php } ?>
          <div class="form-group" id="login-form">
            <h6 class="section-secondary-title">Username: <input type="text" class="form-control" name="username" size="20" maxlength="60" /> </h6>
    				<h6 class="section-secondary-title">Password: <input type="password" class="form-control" name="password" size="20" maxlength="20" /></h6>
    				<input type="submit" class="btn btn-primary" name="submit" value="Login" />
          </div>
  			</form>
      </div>

	<!--footer-->
	<?php include ('includes/footer.html');?>
