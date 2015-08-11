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
			$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            // Check connection
            if ($connection->connect_error) {
                die("Error connecting to database!");
            } 

            $sql = "SELECT * FROM records WHERE 1";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='view_form_wrap'>";
                echo "<h2 class='centered'>LIST OF RECORDS</h2>";

                echo "<p class='floated_left' style='margin-right:15px; width:180px'>NAME</p>" . 
                    "<p class='floated_left' style='margin-right:15px; width:180px'>EMAIL</p>" .
                    "<p class='floated_left' style='margin-right:15px; width:180px'>PHONE</p>" .
                    "<p class='floated_left' style='margin-right:15px; width:180px'>COUNTRY</p>";
                echo "<div class='clear'></div>";
                while($row = $result->fetch_assoc()) {
                    

                    

                    
                    echo "<p class='floated_left' style='margin-right:15px; width:180px'>" . $row['name'] . "</p>" .
                    "<p class='floated_left' style='margin-right:15px; width:180px'>" . $row['email'] . "</p>" .
                    "<p class='floated_left' style='margin-right:15px; width:180px'>" . $row['phone'] . "</p>" .
                    "<p class='floated_left' style='margin-right:15px; width:180px'>" . $row['country'] . "</p>";
                    echo "<div class='clear'></div>";
                    

                }

                ?>
                <p class="floated_right"><a href="logout.php">Logout</a></p>
                <div class="clear"></div>
                <?php

                echo "</div>";
            }
            $connection->close();
			
		?>
	</body>
</html>