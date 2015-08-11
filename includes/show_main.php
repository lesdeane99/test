<h2 class="centered">Please Fill Up This Form</h2>
<form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="name" class="floated_left">Your Name</label>
		<input name="name" type="text" id="name" size="39" class="floated_right" <?php if(isset($_POST['name'])) echo "value=" . $_POST['name']; ?>>
		<div class="clear"></div>

		<label for="email" class="floated_left">Email</label>
		<input name="email" type="email" id="email" size="39" class="floated_right" <?php if(isset($_POST['email'])) echo "value=" . $_POST['email']; ?>>
		<div class="clear"></div>

		<label for="phone" class="floated_left">Phone No.</label>
		<input name="phone" type="text" id="phone" size="39" class="floated_right" <?php if(isset($_POST['phone'])) echo "value=" . $_POST['phone']; ?>>
		<div class="clear"></div>

		<label for="country" class="floated_left">Country</label>
		<?php include "includes/country_dropdown.php"; ?>
		<div class="clear"></div>

		<input type="submit" name="submit" value="Submit" class="floated_right">
		<div class="clear"></div>
</form>
<p class="floated_right"><a href="logout.php">Logout</a></p>
<div class="clear"></div>

<p class="floated_right"><a href="view.php">View Records</a></p>
<div class="clear"></div>