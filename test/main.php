<?php
	session_start();

	include 'includes/functions.php';
	include 'includes/constants.php';

    if(!is_logged()) {
        header("location:index.php");
    }
?>


<html>
	<head>
		<title>My Assignment</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
			if (!isset($_POST['submit'])) {
                ?> <div class="main_form_wrap"> <?php
                include 'includes/show_main.php';
                ?> </div> <?php
            } else {
                if(!all_fields_valid($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['country'])) {
                    ?> <div class="main_form_wrap"> <?php
                    include 'includes/show_main.php';
                    show_error(3);
                    ?> </div> <?php
                } else {
                    //add to table
                    if(add_record($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['country'])) {
                        send_mail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['country']);
                        unset($_POST);
                        ?> <div class="main_form_wrap"> <?php
                        include 'includes/show_main.php';
                        show_error(4);
                        ?> </div> <?php
                    } else {
                        echo "string";
                    }

                }
            }
			
		?>
	</body>
</html>