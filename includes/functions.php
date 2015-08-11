<?php
	function is_logged() {
		if(!isset($_SESSION['user_id']) ) {
			return 0;
		} else {
			return $_SESSION['user_id'];
		}
	}

	function is_field_blank($name, $pw) {
		if($name == "" || $pw == "") {
			return 0;
		}
		return 1;
	}

	function is_good_login($name, $pw) {
		$user_name = stripslashes(trim($name));
		$user_password = stripslashes(trim($pw));

		//connect to mysql server
		$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		//check if there was an error encountered
		if ($connection->connect_errno) {
			echo "There was an error while connecting to the server!";
			exit();
		}

		$query_result = $connection->query("SELECT * FROM users_table WHERE user_name = '{$user_name}' AND user_password = '{$user_password}' LIMIT 1");

		if($query_result->num_rows == 1) {
			$_SESSION['user_id'] = 1;
			return($query_result);
		} else {
			return 0;
		}
	}

	function show_error($code) {
		if($code == 1) {
			?> <p class="centered red_text">Username and/or password is blank!</p> <?php
			return 1;
		}

		if($code == 2) {
			?> <p class="centered red_text">Username and/or password is invalid!</p> <?php
			return 1;
		}

		if($code == 3) {
			?> <p class="centered red_text">Some fields are blank. All fields are required!</p> <?php
			return 1;
		}

		if($code == 4) {
			?> <p class="centered red_text">Record added!</p> <?php
			return 1;
		}
	}

	function all_fields_valid($name, $email, $phone, $country) {
		if($name == "" || $email == "" || $phone == "" || $country == "") {
			return 0;
		}
		return 1;
	}

	function add_record($name, $email, $phone, $country) {
		$record_name = stripslashes(trim($name));
		$record_email = stripslashes(trim($email));
		$record_phone = stripslashes(trim($phone));
		$record_country = stripslashes(trim($country));

		//connect to mysql server
		$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

		//check if there was an error encountered
		if ($connection->connect_errno) {
			echo "There was an error while connecting to the server!";
			exit();
		}

		$sql = "INSERT INTO records (name, email, phone, country)
		VALUES ('{$record_name}', '{$record_email}', '{$record_phone}', '{$record_country}')";

		if ($connection->query($sql) === TRUE) {
		    
		    return 1;
		} else {
		    return 0;
		}

		$connection->close();

		//$query_result = $connection->query("INSERT INTO records (name, email, phone, country) VALUES ('{$record_name}', '{$record_email}', '{$record_phone}', '{$record_country}')");

		//return 1;
	}

	function send_mail($name, $email, $phone, $country) {
		$message = "Name: {$name}</br>Email: {$email}</br>Phone: {$phone}</br>Country: {$country}";

		// Send
		//mail('lesdeane99@yahoo.com', 'New Record', $message);
	}

?>