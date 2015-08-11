<?php
	session_start();

	include 'includes/functions.php';
	include 'includes/constants.php';
?>


<html>
	<head>
		<title>My Assignment</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
			
			if (is_logged()) {
        		header("location:main.php");
    		} else {
        		if (isset($_POST['submit'])) { //form submitted
        			if(!is_field_blank($_POST['user_name'], $_POST['user_password'])) {
        				?> <div class="login_form_wrap"> <?php
        				include 'includes/show_login.php';
        				show_error(1);
        				?> </div> <?php
        			} elseif(!is_good_login($_POST['user_name'], $_POST['user_password'])) {
        				?> <div class="login_form_wrap"> <?php
        				include 'includes/show_login.php';
        				show_error(2);
        				?> </div> <?php
        			} else {
        				header("location:main.php");
        			}
        		} else {
            		//show login form with button named 'submit'
            		?> <div class="login_form_wrap"> <?php
            		
            		include 'includes/show_login.php';

            		?> </div> <?php

        		}
    		}
		?>
	</body>
</html>