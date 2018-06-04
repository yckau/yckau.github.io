<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);

	$link = mysqli_connect("Server" , "Username", "Password", "Database");
	if (!$link) {
	    die("Cannot connect: " . mysqli_error ());
	}

	$sql = "SELECT name FROM friends WHERE starred ='Y' ORDER BY name ASC";
	$result = mysqli_query($link, $sql) or die ('Error: '.mysql_error());


	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        	print "<i class='fas fa-user-circle' style='color: grey;'></i> ".$row["name"]. "<br>";
	    }
	} else {
	    print $result;
	}

	mysqli_close($link);
?>