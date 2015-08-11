<h2 class="centered">Login Required</h2>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="user_name" class="floated_left">Username</label>
		<input name="user_name" type="text" id="user_name" class="floated_right" <?php if(isset($_POST['user_name'])) echo "value=" . $_POST['user_name']; ?>>
		<div class="clear"></div>

		<label for="user_password" class="floated_left">Password</label>
		<input name="user_password" type="password" id="user_password" class="floated_right">
		<div class="clear"></div>

		<input type="submit" name="submit" value="Login" class="floated_right">
		<div class="clear"></div>
</form>